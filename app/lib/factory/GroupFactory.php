<?php namespace factory;

use User;
use validator\Rules;
use validator\ValidatorMod;

class GroupFactory extends ValidatorMod implements IFactory {

    public function make(array $attributes, User $user)
    {
        $this->validate($attributes, Rules::get('group'));

        if ($this->failed()) return false;

        $group = Group::create([
        	'created_by_user_id'=>$user->id,
            'name'=>$attributes['name']
        ]);

        $user->groups()->attach($group->id);

        return true;
    }

}