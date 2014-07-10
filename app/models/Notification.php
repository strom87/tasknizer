<?php

class Notification extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notifications';

    /**
     * The guarded array black-list mass-assignable columns
     *
     * @var array
     */
    protected $guarded = array('id');

}