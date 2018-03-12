<?php
/**
 * Created by PhpStorm.
 * User: asd
 * Date: 14.12.2017
 * Time: 23:20
 */
namespace Asdozzz\Users;

use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }
}