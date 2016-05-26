<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\CategoriaRepository',
            'App\Repositories\CategoriaRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\ItensMenuRepository',
            'App\Repositories\ItensMenuRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\MenuRepository',
            'App\Repositories\MenuRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\PaginaRepository',
            'App\Repositories\PaginaRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\PermissionRepository',
            'App\Repositories\PermissionRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\PostRepository',
            'App\Repositories\PostRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\RoleRepository',
            'App\Repositories\RoleRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\SiteRepository',
            'App\Repositories\SiteRepositoryEloquent'
        );
        $this->app->bind(
            'App\Repositories\UserRepository',
            'App\Repositories\UserRepositoryEloquent'
        );
    }
}
