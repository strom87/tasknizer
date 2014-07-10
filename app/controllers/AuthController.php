<?php

use authentication\Authentication;

class AuthController extends BaseController {

	protected $authentication;

	public function __construct(Authentication $authentication)
	{
		$this->authentication = $authentication;
	}

	public function getIndex()
	{
		return View::make('auth.index')->with('isAuth', Auth::check());
	}

	public function postSignIn()
	{
		$data = $this->authentication->login(Input::get('email'), Input::get('password'), false);

		if ($data['pass'])
		{
			return Redirect::to('/');
		}

		return Redirect::to('login');
	}

}
