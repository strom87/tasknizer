<?php namespace authentication;

use User, Auth, Hash;

class Authentication implements IAuthentication {

    /**
     * Login the user if all the input data is correct and the user exists in the database
     *
     * @param $email_or_name
     * @param $password
     * @param $remember_me
     * @return bool
     */
    public function login($email_or_name, $password, $remember_me)
    {
        $email = $this->getEmailFromName($email_or_name);

        if (!$this->userExists($email))
        {
            return $this->getErrorType(1);
        }

        if (!$this->userIsActivated($email))
        {
            return $this->getErrorType(2);
        }

        if (Auth::attempt(['email'=>$email, 'password'=>$password], $remember_me))
        {
            $this->rehashPasswordIfNeeded($email, $password);

            return ['pass'=>true];
        }

        return $this->getErrorType(1);
    }

    /**
     * If the value is equal to the username, return the email, else return the value as the email address.
     *
     * @param $value
     * @return mixed
     */
    public function getEmailFromName($value)
    {
        if (User::where('name', $value)->count() > 0)
        {
            return User::where('name', $value)->pluck('email');
        }

        return $value;
    }

    /**
     * Checks if the user exists
     *
     * @param $email
     * @return bool
     */
    public function userExists($email)
    {
        return User::where('email', $email)->count() > 0;
    }

    /**
     * Checks if the user is activated
     *
     * @param $email
     * @return bool
     */
    public function userIsActivated($email)
    {
        return User::where('email', $email)->pluck('is_activated');
    }

    /**
     * Rehashes the users password if needed
     *
     * @param $email
     * @param $password
     */
    public function rehashPasswordIfNeeded($email, $password)
    {
        $user = User::where('email', $email);

        if (Hash::needsRehash($user->pluck('password')))
        {
            $user->update(['password'=>Hash::make($password)]);
        }
    }

    /**
     * Makes the different error types
     *
     * @param $type
     * @return array
     */
    public function getErrorType($type)
    {
        switch ($type)
        {
            case 1:
                return ['pass'=>false, 'message'=>['type'=>1, 'error'=>'email_or_password_wrong']];
            case 2:
                return ['pass'=>false, 'message'=>['type'=>2, 'error'=>'not_activated']];
            default:
                return ['pass'=>false, 'message'=>['type'=>0, 'error'=>'unknown_error']];
        }
    }

}