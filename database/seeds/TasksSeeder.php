<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Created by PhpStorm.
 * User: asd
 * Date: 01.03.2018
 * Time: 22:12
 */
class TasksSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,55) as $index) {
            $user_id = rand(1, 10);
            $item    = [
                'subject'     => $faker->sentence,
                'description' => $faker->paragraph,
                'project_id'  => rand(1, 10),
                'status'      => 1,
                'tracker'     => 1,
                'priority'    => 1,
                'user_id'     => $user_id,
                'executor'    => $user_id,
            ];

            $id   = DB::table('tasks')->insertGetId($item);

            DB::table('task_user_role')->insert([
                'task_id' => $id,
                'user_id' => 1,
                'role_id' => 1
            ]);
        }
    }
}