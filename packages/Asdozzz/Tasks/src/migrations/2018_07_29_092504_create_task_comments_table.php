<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskCommentsTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE task_comments (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,change_id INT(10),text TEXT(5000),PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE IF EXISTS task_comments";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
