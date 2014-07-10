<?php namespace factory;

use Task;
use validator\Rules;
use validator\ValidatorMod;

class TaskFactory extends ValidatorMod implements IFactory {

    public function make(array $attributes)
    {
        $this->validate($attributes, Rules::get('task'));

        if ($this->failed()) return false;

        Task::create([
            'group_id'=>$attributes['group_id'],
            'assigned_to_user_id'=>$attributes['assigned_to_user'],
            'name'=>$attributes['name'],
            'content'=>$attributes['message'],
            'is_completed'=>false
        ]);

        return true;
    }

}