<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTrackersTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE task_trackers (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,name TEXT(5000),user_id INT(10),created_at DATETIME,updated_at DATETIME,deleted_at DATETIME,PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);

        DB::table('task_trackers')->insert([
            'id' => 1,
            'name' => 'Ошибка',
        ]);

        DB::table('task_trackers')->insert([
            'id' => 2,
            'name' => 'Новый функционал',
        ]);

        DB::table('task_trackers')->insert([
            'id' => 3,
            'name' => 'Анализ',
        ]);

    }

    public function down()
    {
        $sql = "DROP TABLE task_trackers";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
