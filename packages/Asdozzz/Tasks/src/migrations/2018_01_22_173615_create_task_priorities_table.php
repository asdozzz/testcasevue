<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskPrioritiesTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE task_priorities (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,name TEXT(5000),priority INT(10),user_id INT(10),created_at DATETIME,updated_at DATETIME,deleted_at DATETIME,PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);

        DB::table('task_priorities')->insert([
            'id' => 1,
            'name' => 'Cамый низкий',
            'priority' => 100
        ]);

        DB::table('task_priorities')->insert([
            'id' => 2,
            'name' => 'Низкий',
            'priority' => 200
        ]);

        DB::table('task_priorities')->insert([
            'id' => 3,
            'name' => 'Средний',
            'priority' => 300
        ]);

        DB::table('task_priorities')->insert([
            'id' => 4,
            'name' => 'Высокий',
            'priority' => 400
        ]);

        DB::table('task_priorities')->insert([
            'id' => 5,
            'name' => 'Самый высокий',
            'priority' => 500
        ]);
    }

    public function down()
    {
        $sql = "DROP TABLE task_priorities";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
