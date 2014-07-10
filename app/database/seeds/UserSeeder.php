<?php

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'email'=>'kalle@kalle.se',
            'name'=>'kalle',
            'password'=>'asdasd',
            'token'=>str_random(50),
            'accepted_rules'=>true,
            'is_activated'=>true,
            'remember_token'=>str_random(100)
        ]);

        for ($i=0; $i<49; $i++) {
            User::create([
                'email'=>"janne{$i}@janne{$i}.se",
                'name'=>"janne{$i}",
                'password'=>'asdasd',
                'token'=>str_random(50),
                'accepted_rules'=>true,
                'is_activated'=>true,
                'remember_token'=>str_random(100)
            ]);
        }
    }

}