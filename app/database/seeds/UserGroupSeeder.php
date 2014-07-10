<?php

class UserGroupSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_group')->delete();

        $user = User::find(1);

        for ($i=1; $i<=20; $i++) {
            $user->groups()->attach($i);
        }

        $groupCount = 1;

        for ($i=2; $i<=50; $i++) {

            $user = User::find($i);
            $user->groups()->attach($groupCount);

            if(++$groupCount > 20)
            {
                $groupCount = 1;
            }
        }
    }

}