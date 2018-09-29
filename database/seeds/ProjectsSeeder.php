<?php


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Created by PhpStorm.
 * User: asd
 * Date: 01.03.2018
 * Time: 22:16
 */
class ProjectsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            $item = [
                'title'       => $faker->sentence,
                'description' => $faker->paragraph,
                'user_id'     => 1,
            ];

            $id   = DB::table('projects')->insertGetId($item);

            $roles = DB::table('project_roles')->get()->keyBy('slug');

            DB::table('project_user_role')->insert([
                'project_id' => $id,
                'user_id' => 1,
                'role_id' => $roles['admin']->id
            ]);
        }
    }
}