<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskChangesTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE task_changes (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,user_id INT(10),task_id INT(10),comment TEXT NULL,created_at DATETIME,PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE task_changes";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
