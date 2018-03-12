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

        $adminPanelPermission =  DB::table('permissions')->insertGetId([
            'name' => 'Admin panel',
            'slug' => 'admin.panel',
            'description' => '', // optional
        ]);

        $createUsersPermission =  DB::table('permissions')->insertGetId([
            'name' => 'Create users',
            'slug' => 'create.users',
            'description' => '', // optional
        ]);

        $deleteUsersPermission =  DB::table('permissions')->insertGetId([
            'name' => 'Delete users',
            'slug' => 'delete.users',
        ]);

        $readUsersPermission =  DB::table('permissions')->insertGetId([
            'name' => 'read users',
            'slug' => 'read.users',
        ]);

        $updateUsersPermission =  DB::table('permissions')->insertGetId([
            'name' => 'update users',
            'slug' => 'update.users',
        ]);

        $listingUsersPermission =  DB::table('permissions')->insertGetId([
            'name' => 'listing users',
            'slug' => 'listing.users',
        ]);

        $adminRole = DB::table('roles')->insertGetId([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Custodians of the system.', // optional
        ]);

        $clientRole = DB::table('roles')->insertGetId([
            'name' => 'Client',
            'slug' => 'client',
            'description' => '', // optional
        ]);

        $createProjectPermission =  DB::table('permissions')->insertGetId([
            'name' => 'Create projects',
            'slug' => 'create.projects',
            'description' => '', // optional
        ]);

        $ins_data = [
            ['role_id' => $adminRole, 'permission_id' => $adminPanelPermission],
            ['role_id' => $adminRole, 'permission_id' => $createUsersPermission],
            ['role_id' => $adminRole, 'permission_id' => $deleteUsersPermission],
            ['role_id' => $adminRole, 'permission_id' => $readUsersPermission],
            ['role_id' => $adminRole, 'permission_id' => $updateUsersPermission],
            ['role_id' => $adminRole, 'permission_id' => $listingUsersPermission],
            ['role_id' => $adminRole, 'permission_id' => $createProjectPermission],
            ['role_id' => $clientRole, 'permission_id' => $createProjectPermission],
        ];

        DB::table('permission_role')->insert($ins_data);

        $moderatorRole = DB::table('roles')->insertGetId([
            'name' => 'Moderator',
            'slug' => 'moderator',
            'description' => 'Custodians of the system.', // optional
        ]);

        $guestRole = DB::table('roles')->insertGetId([
            'name' => 'Guest',
            'slug' => 'guest',
            'description' => '', // optional
        ]);

        $firstId = DB::table('users')->insertGetId([
            'name' => 'leo',
            'email' => 'leo@gmail.com',
            'password' => bcrypt('asd243815'),
        ]);

        DB::table('role_user')->insertGetId([
            'user_id' => $firstId,
            'role_id' => $adminRole
        ]);
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
}
