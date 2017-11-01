<?php
namespace Asdozzz\Projects;

use Illuminate\Support\ServiceProvider;

class ProjectsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }
}