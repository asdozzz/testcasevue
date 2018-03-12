<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectRolesTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE project_roles (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,name TEXT(5000),slug TEXT(5000),description TEXT(5000),level INT(10),created_at DATETIME,updated_at DATETIME,PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);

        DB::table('project_roles')->insert([
            'id' => 1,
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        DB::table('project_roles')->insert([
            'id' => 2,
            'name' => 'developer',
            'slug' => 'developer',
        ]);

        DB::table('project_roles')->insert([
            'id' => 3,
            'name' => 'QA',
            'slug' => 'QA',
        ]);
    }

    public function down()
    {
        $sql = "DROP TABLE project_roles";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
