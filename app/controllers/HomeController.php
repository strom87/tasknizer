<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		return View::make('layouts.site');
	}

}
