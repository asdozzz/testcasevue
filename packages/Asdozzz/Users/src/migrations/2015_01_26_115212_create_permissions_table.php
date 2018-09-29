<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('model')->nullable();
            $table->timestamps();
        });

        $insertPermissions = [
            [
                'name' => 'Admin panel',
                'slug' => 'admin.panel',
            ],
            [
                'name' => 'Create users',
                'slug' => 'users.create',
            ],
            [
                'name' => 'Delete users',
                'slug' => 'users.delete',
            ],
            [
                'name' => 'read users',
                'slug' => 'users.read',
            ],
            [
                'name' => 'update users',
                'slug' => 'users.update',
            ],
            [
                'name' => 'listing users',
                'slug' => 'users.listing',
            ],
            [
                'name' => 'listing projects',
                'slug' => 'projects.listing',
            ],
            [
                'name' => 'create projects',
                'slug' => 'projects.create',
            ],
            [
                'name' => 'delete projects',
                'slug' => 'projects.delete',
            ],
            [
                'name' => 'listing tasks',
                'slug' => 'tasks.listing',
            ],
            [
                'name' => 'create tasks',
                'slug' => 'tasks.create',
            ]
        ];
        DB::table('permissions')->insert($insertPermissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissions');
    }
}
