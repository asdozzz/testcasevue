<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsTable extends Migration
{
    public function up()
    {
        /*$sql = "CREATE TABLE requirements (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,project_id INT(10),parent_id INT(10),name TEXT(5000),description TEXT(5000),level INT(10) DEFAULT 0,priority INT(10) DEFAULT 0,user_id INT(10),created_at DATETIME,updated_at DATETIME,deleted_at DATETIME,PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);*/
    }

    public function down()
    {
       /* $sql = "DROP TABLE requirements";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);*/
    }
}
