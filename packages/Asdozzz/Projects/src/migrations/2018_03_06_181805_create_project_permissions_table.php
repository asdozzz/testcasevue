<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPermissionsTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE project_permissions (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,name TEXT(5000),slug TEXT(5000),created_at DATETIME,updated_at DATETIME,PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);

        DB::table('project_permissions')->insert([
            'id' => 1,
            'name' => 'projects.edit',
            'slug' => 'projects.edit',
        ]);

        DB::table('project_permissions')->insert([
            'id' => 2,
            'name' => 'projects.remove',
            'slug' => 'projects.remove',
        ]);

        DB::table('project_permissions')->insert([
            'id' => 3,
            'name' => 'projects.view',
            'slug' => 'projects.view',
        ]);

        DB::table('project_permissions')->insert([
            'id' => 4,
            'name' => 'projects.tasks.create',
            'slug' => 'projects.tasks.create',
        ]);

        DB::table('project_permissions')->insert([
            'id' => 5,
            'name' => 'projects.requirements.create',
            'slug' => 'projects.requirements.create',
        ]);

        DB::table('project_permissions')->insert([
            'id' => 6,
            'name' => 'projects.users',
            'slug' => 'projects.users',
        ]);

    }

    public function down()
    {
        $sql = "DROP TABLE project_permissions";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
