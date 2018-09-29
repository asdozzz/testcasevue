<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectRolesTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE project_roles (
              id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
              project_id INT(10) DEFAULT NULL,
              name TEXT(5000),
              slug TEXT(5000),
              description TEXT(5000),
              level INT(10),
              created_at DATETIME,
              updated_at DATETIME,
              PRIMARY KEY (`id`)
        ) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);

        DB::table('project_roles')->insert([
            [
                'name' => 'Администратор',
                'slug' => 'admin',
            ],
            [
                'name' => 'Архитектор',
                'slug' => 'architect',
            ],
            [
                'name' => 'Аналитик',
                'slug' => 'analytic',
            ],
            [
                'name' => 'Дизайнер',
                'slug' => 'designer',
            ],
            [
                'name' => 'Разработчик',
                'slug' => 'developer',
            ],
            [
                'name' => 'Тестировщик',
                'slug' => 'QA',
            ],
            [
                'name' => 'Заказчик',
                'slug' => 'customer',
            ]
        ]);
    }

    public function down()
    {
        $sql = "DROP TABLE project_roles";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
