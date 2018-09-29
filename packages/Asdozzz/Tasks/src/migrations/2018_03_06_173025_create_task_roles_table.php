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
            [
                'name' => 'Автор',
                'slug' => 'author',
            ],
            [
                'name' => 'Наблюдатель',
                'slug' => 'observer',
            ],
            [
                'name' => 'Аналитик',
                'slug' => 'analytic',
            ],
            [
                'name' => 'Исполнитель',
                'slug' => 'executor',
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
        $sql = "DROP TABLE task_roles";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
