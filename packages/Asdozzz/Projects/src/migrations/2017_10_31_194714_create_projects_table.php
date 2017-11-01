<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE projects (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,title TEXT(5000),description TEXT(5000),user_id INT(10),created_at DATETIME,updated_at DATETIME,deleted_at DATETIME,PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE projects";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
