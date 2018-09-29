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

        $permissions = DB::table('project_permissions')->get()->keyBy('slug');
        $roles = DB::table('project_roles')->get()->keyBy('slug');

        $this->setAdminPermissions($permissions, $roles);
        $this->setArchitectPermissions($roles, $permissions);
        $this->setAnalyticPermissions($roles, $permissions);
        $this->setDesignerPermissions($roles, $permissions);
        $this->setDeveloperPermissions($roles, $permissions);
        $this->setQAPermissions($roles, $permissions);
        $this->setCustomerPermissions($roles, $permissions);
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
        DB::table('project_role_permission')->insert($insertData);
    }

    /**
     * @param $permissions
     * @param $roles
     */
    protected function setAdminPermissions($permissions, $roles)
    {
        $this->addPermissionsForRole($roles, $permissions, collect($permissions)->pluck('slug'), 'admin');
    }

    /**
     * @param $roles
     * @param $permissions
     */
    protected function  setArchitectPermissions($roles, $permissions)
    {
        $stack = [
            'projects.read',
            'requirements.listing',
            'requirements.read',
            'testcase.listing',
            'testcase.read',
            'testplan.listing',
            'testplan.read',
        ];

        $this->addPermissionsForRole($roles, $permissions, $stack, 'architect');
    }

    /**
     * @param $roles
     * @param $permissions
     */
    protected function setAnalyticPermissions($roles, $permissions)
    {
        $stack = [
            'projects.read',
            'requirements.listing',
            'requirements.create',
            'requirements.read',
            'requirements.update',
            'requirements.delete',
            'testcase.listing',
            'testcase.read',
            'testplan.listing',
            'testplan.read',
        ];

        $this->addPermissionsForRole($roles, $permissions, $stack, 'analytic');
    }

    /**
     * @param $roles
     * @param $permissions
     */
    protected function setDesignerPermissions($roles, $permissions)
    {
        $stack = [
            'projects.read',
            'requirements.listing',
            'requirements.read',
            'testcase.listing',
            'testcase.read',
            'testplan.listing',
            'testplan.read',
        ];

        $this->addPermissionsForRole($roles, $permissions, $stack, 'designer');
    }

    /**
     * @param $roles
     * @param $permissions
     */
    protected function setDeveloperPermissions($roles, $permissions)
    {
        $stack = [
            'projects.read',
            'requirements.listing',
            'requirements.read',
            'testcase.listing',
            'testcase.read',
            'testplan.listing',
            'testplan.read',
        ];

        $this->addPermissionsForRole($roles, $permissions, $stack, 'developer');
    }

    /**
     * @param $roles
     * @param $permissions
     */
    protected function setQAPermissions($roles, $permissions)
    {
        $stack = [
            'projects.read',
            'requirements.listing',
            'requirements.read',
            'testcase.listing',
            'testcase.create',
            'testcase.read',
            'testcase.update',
            'testcase.delete',
            'testplan.listing',
            'testplan.create',
            'testplan.read',
            'testplan.update',
            'testplan.delete',
        ];

        $this->addPermissionsForRole($roles, $permissions, $stack, 'QA');
    }

    /**
     * @param $roles
     * @param $permissions
     */
    protected function setCustomerPermissions($roles, $permissions)
    {
        DB::table('project_role_permission')->insert([
            [
                'role_id'       => $roles['customer']->id,
                'permission_id' => $permissions['projects.read']->id
            ],
            [
                'role_id'       => $roles['customer']->id,
                'permission_id' => $permissions['requirements.listing']->id
            ],
            [
                'role_id'       => $roles['customer']->id,
                'permission_id' => $permissions['requirements.read']->id
            ]
        ]);
    }

    public function down()
    {
        $sql = "DROP TABLE project_role_permission";
        $pdo = DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
