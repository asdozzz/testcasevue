<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskPermissionsTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE task_permissions (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,name TEXT(5000),slug TEXT(5000),created_at DATETIME,updated_at DATETIME,PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);

        DB::table('task_permissions')->insert([
            'id' => 1,
            'name' => 'tasks.edit',
            'slug' => 'tasks.edit',
        ]);

        DB::table('task_permissions')->insert([
            'id' => 2,
            'name' => 'tasks.remove',
            'slug' => 'tasks.remove',
        ]);

        DB::table('task_permissions')->insert([
            'id' => 3,
            'name' => 'tasks.view',
            'slug' => 'tasks.view',
        ]);

        DB::table('task_permissions')->insert([
            'id' => 4,
            'name' => 'tasks.comments.add',
            'slug' => 'tasks.comments.add',
        ]);

        DB::table('task_permissions')->insert([
            'id' => 5,
            'name' => 'tasks.comments.edit',
            'slug' => 'tasks.comments.edit',
        ]);

        DB::table('task_permissions')->insert([
            'id' => 6,
            'name' => 'tasks.files.add',
            'slug' => 'tasks.files.add',
        ]);
    }

    public function down()
    {
        $sql = "DROP TABLE task_permissions";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
