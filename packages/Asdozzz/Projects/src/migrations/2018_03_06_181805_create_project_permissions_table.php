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

        $permissions = [
            [
                'name' => 'projects.edit',
                'slug' => 'projects.edit',
            ],
            [
                'name' => 'projects.read',
                'slug' => 'projects.read',
            ],
            [
                'name' => 'requirements.listing',
                'slug' => 'requirements.listing',
            ],
            [
                'name' => 'requirements.create',
                'slug' => 'requirements.create',
            ],
            [
                'name' => 'requirements.read',
                'slug' => 'requirements.read',
            ],
            [
                'name' => 'requirements.update',
                'slug' => 'requirements.update',
            ],
            [
                'name' => 'requirements.delete',
                'slug' => 'requirements.delete',
            ],
            [
                'name' => 'roles.listing',
                'slug' => 'roles.listing',
            ],
            [
                'name' => 'roles.create',
                'slug' => 'roles.create',
            ],
            [
                'name' => 'roles.read',
                'slug' => 'roles.read',
            ],
            [
                'name' => 'roles.update',
                'slug' => 'roles.update',
            ],
            [
                'name' => 'roles.delete',
                'slug' => 'roles.delete',
            ],
            [
                'name' => 'users.listing',
                'slug' => 'users.listing',
            ],
            [
                'name' => 'users.create',
                'slug' => 'users.create',
            ],
            [
                'name' => 'users.read',
                'slug' => 'users.read',
            ],
            [
                'name' => 'users.update',
                'slug' => 'users.update',
            ],
            [
                'name' => 'users.delete',
                'slug' => 'users.delete',
            ],
            [
                'name' => 'testcase.listing',
                'slug' => 'testcase.listing',
            ],
            [
                'name' => 'testcase.create',
                'slug' => 'testcase.create',
            ],
            [
                'name' => 'testcase.read',
                'slug' => 'testcase.read',
            ],
            [
                'name' => 'testcase.update',
                'slug' => 'testcase.update',
            ],
            [
                'name' => 'testcase.delete',
                'slug' => 'testcase.delete',
            ],
            [
                'name' => 'testplan.listing',
                'slug' => 'testplan.listing',
            ],
            [
                'name' => 'testplan.create',
                'slug' => 'testplan.create',
            ],
            [
                'name' => 'testplan.read',
                'slug' => 'testplan.read',
            ],
            [
                'name' => 'testplan.update',
                'slug' => 'testplan.update',
            ],
            [
                'name' => 'testplan.delete',
                'slug' => 'testplan.delete',
            ]
        ];

        DB::table('project_permissions')->insert($permissions);

    }

    public function down()
    {
        $sql = "DROP TABLE project_permissions";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
