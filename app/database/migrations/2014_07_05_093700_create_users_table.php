<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('email', 100);
            $table->string('password', 60);
            $table->boolean('accepted_rules');
            $table->boolean('is_activated');
            $table->string('token', 50);
            $table->string('remember_token', 100);
            $table->timestamp('last_login_at');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{ 
		Schema::drop('users');
	}

}
