<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PassportSeeder::class);
        //$this->call(UserRolesSeeder::class);
        //$this->call(UsersTableSeeder::class);
        //$this->call(ProjectsSeeder::class);
        //$this->call(TasksSeeder::class);
    }
}
