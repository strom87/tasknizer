<?php namespace validator;

class Rules {

    private static $user = [
        'email'=>'required|email|unique:users,email',
        'name'=>'required|min:1|max:30|unique:users,name',
        'password'=>'required|min:6|max:50|confirmed',
        'accepted_rules'=>'accepted'
    ];

    private static $task = [
        'created_by_user_id'=>'required|integer|exists:users,id',
        'assigned_to_user_id'=>'required|integer|exists:users,id',
        'name'=>'required|min:1|max:50',
        'content'=>'required|min:1'
    ];

    private static $group = [
        'name'=>'required|min:1|max:30'
    ];

    public static function get($type)
    {
        switch ($type)
        {
            case 'user':
                return self::$user;
            case 'task':
                return self::$task;
            case 'group':
                return self::$group;
            default:
                return null;
        }
    }
}