<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskRolePermissionTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE task_role_permission (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,role_id INT(10),permission_id INT(10),PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);

        foreach (range(1,6) as $index) {
            DB::table('task_role_permission')->insert([
                'role_id' => 1,
                'permission_id' => $index,
            ]);
        }

        foreach (range(1,6) as $index) {
            if ($index == 2) continue;
            DB::table('task_role_permission')->insert([
                'role_id' => 2,
                'permission_id' => $index,
            ]);
        }

        foreach (range(1,6) as $index) {
            if ($index == 2) continue;
            DB::table('task_role_permission')->insert([
                'role_id' => 3,
                'permission_id' => $index,
            ]);
        }

        foreach (range(3,6) as $index) {
            DB::table('task_role_permission')->insert([
                'role_id' => 4,
                'permission_id' => $index,
            ]);
        }
    }

    public function down()
    {
        $sql = "DROP TABLE task_role_permission";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
