<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskChangesParamsTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE task_changes_params (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,change_id INT(10),param_code TEXT(5000),param_name TEXT(5000),old_value TEXT(5000),new_value TEXT(5000),old_value_text TEXT(5000),new_value_text TEXT(5000),PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE task_changes_params";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
