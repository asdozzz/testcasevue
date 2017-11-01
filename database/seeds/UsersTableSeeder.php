<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        $ins_data = [
            ['role_id' => $adminRole, 'permission_id' => $adminPanelPermission],
            ['role_id' => $adminRole, 'permission_id' => $createUsersPermission],
            ['role_id' => $adminRole, 'permission_id' => $deleteUsersPermission],
            ['role_id' => $adminRole, 'permission_id' => $readUsersPermission],
            ['role_id' => $adminRole, 'permission_id' => $updateUsersPermission],
            ['role_id' => $adminRole, 'permission_id' => $listingUsersPermission],
        ];

        DB::table('permission_role')->insert($ins_data);

        $moderatorRole = DB::table('roles')->insertGetId([
            'id' => 2,
            'name' => 'Moderator',
            'slug' => 'moderator',
            'description' => 'Custodians of the system.', // optional
        ]);

        $guestRole = DB::table('roles')->insertGetId([
            'id' => 3,
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

        $faker = Faker::create();
        foreach (range(1,55) as $index) {
            $id = DB::table('users')->insertGetId([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt($faker->password),
            ]);

            DB::table('role_user')->insert([
                'user_id' => $id,
                'role_id' => $moderatorRole
            ]);
        }
    }
}
