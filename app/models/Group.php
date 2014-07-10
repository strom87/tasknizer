<?php

class Group extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';

    /**
     * The guarded array black-list mass-assignable columns
     *
     * @var array
     */
    protected $guarded = array('id');


    public function users()
    {
        return $this->belongsToMany('User', 'user_group');
    }
}