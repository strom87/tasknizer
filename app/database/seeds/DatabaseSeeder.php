<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserSeeder');
		$this->call('GroupSeeder');
		$this->call('UserGroupSeeder');
		$this->call('TaskSeeder');
	}

}
