<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskUserRoleTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE task_user_role (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,task_id INT(10),role_id INT(10),user_id INT(10),PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE task_user_role";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
