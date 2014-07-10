<?php

use sitemodels\TaskDetail;

class ApiController extends BaseController {

	public function getUserTasks()
	{
		return User::find(Auth::user()->id)->tasks;
	}

	public function getTask($id)
	{
		$task = new TaskDetail($id);

		return Response::json($task);
	}

}
