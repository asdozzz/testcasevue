<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskRolesTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE task_roles (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                    name TEXT(5000),
                    slug TEXT(5000),
                    description TEXT(5000),
                    created_at DATETIME,
                    updated_at DATETIME,
                    PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);

        DB::table('task_roles')->insert([
            'id' => 1,
            'name' => 'Author',
            'slug' => 'author',
        ]);

        DB::table('task_roles')->insert([
            'id' => 2,
            'name' => 'executor',
            'slug' => 'executor',
        ]);

        DB::table('task_roles')->insert([
            'id' => 3,
            'name' => 'QA',
            'slug' => 'QA',
        ]);

        DB::table('task_roles')->insert([
            'id' => 4,
            'name' => 'observer',
            'slug' => 'observer',
        ]);
    }

    public function down()
    {
        $sql = "DROP TABLE task_roles";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
