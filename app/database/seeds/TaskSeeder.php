<?php

class TaskSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::truncate();

        $groupId = 1;
        for ($i=1; $i<=60; $i++) {
            Task::create([
                'group_id'=>$groupId,
                'user_id'=>0,
                'name'=>"task_{$i}",
                'message'=>'Ett typ av meddelande för att kunna göra denna',
                'is_completed'=>false
            ]);

            if (++$groupId > 20) {
                $groupId = 1;
            }
        }

        $groupId = 1;
        for ($i=61; $i<=120; $i++) {
            Task::create([
                'group_id'=>$groupId,
                'user_id'=>1,
                'name'=>"task_{$i}",
                'message'=>'Ett typ av meddelande för att kunna göra denna',
                'is_completed'=>false
            ]);

            if (++$groupId > 20) {
                $groupId = 1;
            }
        }

    }

}