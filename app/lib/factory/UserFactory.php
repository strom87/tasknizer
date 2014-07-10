<?php namespace factory;

use User;
use validator\Rules;
use validator\ValidatorMod;

class UserFactory extends ValidatorMod implements IFactory {

    public function make(array $attributes)
    {
        $this->validate($attributes, Rules::get('user'));

        if ($this->failed()) return false;

        User::create([
            'email'=>$attributes['email'],
            'name'=>$attributes['name'],
            'password'=>$attributes['password'],
            'accepted_rule'=>$attributes['accepted_rules'],
            'token'=>str_random(50)
        ]);

        return true;
    }

}