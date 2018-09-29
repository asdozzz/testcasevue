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

        $permissions = DB::table('task_permissions')->get()->keyBy('slug');
        $roles = DB::table('task_roles')->get()->keyBy('slug');

        $this->setAuthorPermissions($permissions, $roles);
        $this->setObserverPermissions($roles, $permissions);
        $this->setAnalyticPermissions($roles, $permissions);
        $this->setExecutorPermissions($roles, $permissions);
        $this->setQAPermissions($roles, $permissions);
        $this->setCustomerPermissions($roles, $permissions);
    }


    /**
     * @param $permissions
     * @param $roles
     */
    protected function setAuthorPermissions($permissions, $roles)
    {
        $this->addPermissionsForRole($roles, $permissions, collect($permissions)->pluck('slug'), 'author');
    }

    /**
     * @param $roles
     * @param $permissions
     */
    protected function setObserverPermissions($roles, $permissions)
    {
        $this->addPermissionsForRole($roles, $permissions, ['tasks.view'], 'observer');
    }

    /**
     * @param $roles
     * @param $permissions
     */
    protected function setAnalyticPermissions($roles, $permissions)
    {
        $this->addPermissionsForRole($roles, $permissions, collect($permissions)->pluck('slug'), 'analytic');
    }

    /**
     * @param $roles
     * @param $permissions
     */
    protected function setExecutorPermissions($roles, $permissions)
    {
        $stack = [
            'tasks.update',
            'tasks.view',
            'comments.create',
            'comments.update',
            'files.create',
            'files.delete',
        ];

        $this->addPermissionsForRole($roles, $permissions, $stack, 'executor');
    }

    /**
     * @param $roles
     * @param $permissions
     */
    protected function setQAPermissions($roles, $permissions)
    {
        $stack = [
            'tasks.update',
            'tasks.view',
            'comments.create',
            'comments.update',
            'files.create',
            'files.delete',
        ];

        $this->addPermissionsForRole($roles, $permissions, $stack, 'QA');
    }

    /**
     * @param $roles
     * @param $permissions
     */
    protected function setCustomerPermissions($roles, $permissions)
    {
        $stack = [
            'tasks.update',
            'tasks.view',
            'comments.create',
            'comments.update',
            'files.create',
            'files.delete',
        ];

        $this->addPermissionsForRole($roles, $permissions, $stack, 'customer');
    }

    public function down()
    {
        $sql = "DROP TABLE task_role_permission";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }

    /**
     * @param $roles
     * @param $permissions
     * @param $stack
     * @param $slug
     */
    protected function addPermissionsForRole($roles, $permissions, $stack, $slug)
    {
        $insertData = array();
        foreach ($stack as $perm)
        {
            $insertData[] = [
                'role_id'       => $roles[$slug]->id,
                'permission_id' => $permissions[$perm]->id
            ];
        }
        DB::table('task_role_permission')->insert($insertData);
    }
}
