<?php

class GroupSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::truncate();
        
        Group::create(['created_by_user_id'=>1, 'name'=>'Awesome Group']);
        Group::create(['created_by_user_id'=>1, 'name'=>'Fail People']);

        for ($i=0; $i<18; $i++) { 
            Group::create(['created_by_user_id'=>1, 'name'=>str_random(40)]);
        }
    }

}