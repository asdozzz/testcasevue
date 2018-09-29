<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_user', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('permission_id')->unsigned()->index();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        $permissions = DB::table('permissions')->get()->keyBy('slug');
        $roles = DB::table('roles')->get()->keyBy('slug');

        $this->setAdminPermissions($permissions, $roles);
        $this->setArchitectPermissions($roles, $permissions);
        $this->setAnalyticPermissions($roles, $permissions);
        $this->setDesignerPermissions($roles, $permissions);
        $this->setDeveloperPermissions($roles, $permissions);
        $this->setQAPermissions($roles, $permissions);
        $this->setCustomerPermissions($roles, $permissions);

        $firstId = DB::table('users')->insertGetId([
            'name' => 'leo',
            'email' => 'leo@gmail.com',
            'password' => bcrypt('asd243815'),
        ]);

        DB::table('role_user')->insertGetId([
            'user_id' => $firstId,
            'role_id' => $roles['admin']->id
        ]);
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
        DB::table('permission_role')->insert($insertData);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permission_user');
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
    protected function setArchitectPermissions($roles, $permissions)
    {
        $stack= [
            'projects.listing',
            'tasks.listing',
            'tasks.create',
        ];

        $this->addPermissionsForRole($roles, $permissions, $stack, 'architect');
    }

    /**
     * @param $roles
     * @param $permissions
     */
    protected function setAnalyticPermissions($roles, $permissions)
    {
        $stack= [
            'projects.listing',
            'tasks.listing',
            'tasks.create',
        ];

        $this->addPermissionsForRole($roles, $permissions, $stack, 'analytic');
    }

    /**
     * @param $roles
     * @param $permissions
     */
    protected function setDesignerPermissions($roles, $permissions)
    {
        $stack= [
            'projects.listing',
            'tasks.listing',
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
            'projects.listing',
            'tasks.listing',
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
            'projects.listing',
            'tasks.listing',
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
            'projects.listing',
            'tasks.listing',
        ];

        $this->addPermissionsForRole($roles, $permissions, $stack, 'customer');
    }
}
