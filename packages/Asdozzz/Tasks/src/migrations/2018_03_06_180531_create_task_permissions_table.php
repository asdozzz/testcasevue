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

        $insertPermissions = [
            [
                'name' => 'tasks.update',
                'slug' => 'tasks.update',
            ],
            [
                'name' => 'tasks.remove',
                'slug' => 'tasks.remove',
            ],
            [
                'name' => 'tasks.view',
                'slug' => 'tasks.view',
            ],
            [
                'name' => 'comments.create',
                'slug' => 'comments.create',
            ],
            [
                'name' => 'comments.update',
                'slug' => 'comments.update',
            ],
            [
                'name' => 'files.create',
                'slug' => 'files.create',
            ],
            [
                'name' => 'files.delete',
                'slug' => 'files.delete',
            ]
        ];

        DB::table('task_permissions')->insert($insertPermissions);
    }

    public function down()
    {
        $sql = "DROP TABLE task_permissions";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
