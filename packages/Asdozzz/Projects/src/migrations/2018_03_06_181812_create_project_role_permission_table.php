<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectRolePermissionTable extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE project_role_permission (id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,role_id INT(10),permission_id INT(10),PRIMARY KEY (`id`)) COLLATE='utf8_general_ci' ENGINE=InnoDB";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);

        foreach (range(1,3) as $i)
        {
            foreach (range(1, 6) as $index)
            {
                DB::table('project_role_permission')->insert([
                    'role_id'       => $i,
                    'permission_id' => $index,
                ]);
            }
        }
    }

    public function down()
    {
        $sql = "DROP TABLE project_role_permission";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
