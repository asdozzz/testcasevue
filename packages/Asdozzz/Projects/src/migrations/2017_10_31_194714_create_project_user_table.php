<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUserTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE project_user (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,project_id INT(10),user_id INT(10),PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE project_user";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
