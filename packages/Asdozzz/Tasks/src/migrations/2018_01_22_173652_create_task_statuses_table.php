<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskStatusesTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE task_statuses (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,name TEXT(5000),user_id INT(10),created_at DATETIME,updated_at DATETIME,deleted_at DATETIME,PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);

        DB::table('task_statuses')->insert([
            'id' => 1,
            'name' => 'Новая',
        ]);

        DB::table('task_statuses')->insert([
            'id' => 2,
            'name' => 'В работе',
        ]);

        DB::table('task_statuses')->insert([
            'id' => 3,
            'name' => 'Решена',
        ]);

        DB::table('task_statuses')->insert([
            'id' => 4,
            'name' => 'Закрыта',
        ]);
    }

    public function down()
    {
        $sql = "DROP TABLE task_statuses";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
