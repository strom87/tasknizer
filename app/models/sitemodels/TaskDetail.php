<?php namespace sitemodels;

use Task;

class TaskDetail {

	public $task;
	public $group;
	public $users;
	public $assignedUser;

	public function __construct($taskId)
	{
		$task = Task::find($taskId);
		
		$this->addTask($task);
		$this->addGroup($task->group);
		$this->addUsers($task->group->users);
		$this->addAssignedUser($task->group->users, $task->user_id);
	}

	private function addTask($task)
	{
		$this->task = (object) [
			'id'=>$task->id,
			'name'=>$task->name,
			'message'=>$task->message,
			'isCompleted'=>$task->is_completed
		];
	}

	private function addGroup($group)
	{
		$this->group = (object) [
			'id'=>$group->id,
			'name'=>$group->name
		];
	}

	private function addUsers($users)
	{
		$this->users = [];
		$this->users[] = $this->getNotAssignedUser();

		foreach ($users as $user)
		{
			$this->users[] = (object) [
				'id'=>$user->id,
				'name'=>$user->name
			];
		}
	}

	private function addAssignedUser($users, $taskAssignedToId)
	{
		foreach ($users as $user)
		{
			if ($user->id == $taskAssignedToId)
			{
				$this->assignedUser = (object) [
					'id'=>$user->id,
					'name'=>$user->name
				];
			}
			
		}

		if (!isset($this->assignedUser))
		{
			$this->assignedUser = $this->getNotAssignedUser();
		}
	}

	private function getNotAssignedUser()
	{
		return [
			'id'=>0,
			'name'=>'Inte tilldelad'
		];
	}

}