<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE tasks (
            id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
            project_id INT(10),
            status INT(10),
            user_id INT(10),
            executor INT(10),
            tracker INT(10),
            priority INT(10),
            subject TEXT(5000),
            description TEXT(5000),
            created_at DATETIME,
            updated_at DATETIME,
            deleted_at DATETIME,
            PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE tasks";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
