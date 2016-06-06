<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

// Authentication routes...
Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('/', 'HomeController@index');

/** GRUPO DE ROTAS ADMIN **/
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::get('/', ['as' => 'dashboard.index', 'uses' => 'Admin\AdminController@index']);
    Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'Admin\AdminController@index']);

    Route::get('perfil', ['as' => 'perfil.index', 'uses' => 'Admin\PerfilController@index']);

    /** ROTAS POTS **/
    Route::get('posts', ['as' => 'posts.index', 'uses' => 'Admin\PostsController@index']);
    Route::get('posts/create', ['as' => 'posts.create', 'uses' => 'Admin\PostsController@create']);
    Route::get('posts/edit/{id}', ['as' => 'posts.edit', 'uses' => 'Admin\PostsController@edit']);
    Route::get('posts/delete/{id}', ['as' => 'posts.delete', 'uses' => 'Admin\PostsController@delete']);
    Route::post('posts/store', ['as' => 'posts.store', 'uses' => 'Admin\PostsController@store']);
    Route::post('posts/update/{id}', ['as' => 'posts.update', 'uses' => 'Admin\PostsController@update']);
    Route::get('posts/search/', ['as' => 'posts.search', 'uses' => 'Admin\PostsController@search']);

    /** ROTAS CATEGORIAS **/
    Route::get('categorias', ['as' => 'categorias.index', 'uses' => 'Admin\CategoriasController@index']);
    Route::get('categorias/create', ['as' => 'categorias.create', 'uses' => 'Admin\CategoriasController@create']);
    Route::get('categorias/edit/{id}', ['as' => 'categorias.edit', 'uses' => 'Admin\CategoriasController@edit']);
    Route::get('categorias/delete/{id}', ['as' => 'categorias.delete', 'uses' => 'Admin\CategoriasController@delete']);
    Route::post('categorias/store', ['as' => 'categorias.store', 'uses' => 'Admin\CategoriasController@store']);
    Route::post('categorias/update/{id}', ['as' => 'categorias.update', 'uses' => 'Admin\CategoriasController@update']);
    Route::get('categorias/search/', ['as' => 'categorias.search', 'uses' => 'Admin\CategoriasController@search']);

    /** ROTAS SITES **/
    Route::get('sites', ['as' => 'sites.index', 'uses' => 'Admin\SitesController@index']);
    Route::get('sites/create', ['as' => 'sites.create', 'uses' => 'Admin\SitesController@create']);
    Route::get('sites/edit/{id}', ['as' => 'sites.edit', 'uses' => 'Admin\SitesController@edit']);
    Route::get('sites/delete/{id}', ['as' => 'sites.delete', 'uses' => 'Admin\SitesController@delete']);
    Route::post('sites/store', ['as' => 'sites.store', 'uses' => 'Admin\SitesController@store']);
    Route::post('sites/update/{id}', ['as' => 'sites.update', 'uses' => 'Admin\SitesController@update']);
    Route::get('sites/search/', ['as' => 'sites.search', 'uses' => 'Admin\SitesController@search']);

    /** ROTAS USERS **/
    Route::get('users', ['as' => 'users.index', 'uses' => 'Admin\UsersController@index']);
    Route::get('users/create', ['as' => 'users.create', 'uses' => 'Admin\UsersController@create']);
    Route::get('users/edit/{id}', ['as' => 'users.edit', 'uses' => 'Admin\UsersController@edit']);
    Route::get('users/delete/{id}', ['as' => 'users.delete', 'uses' => 'Admin\UsersController@delete']);
    Route::post('users/store', ['as' => 'users.store', 'uses' => 'Admin\UsersController@store']);
    Route::post('users/update/{id}', ['as' => 'users.update', 'uses' => 'Admin\UsersController@update']);
    Route::get('users/search/', ['as' => 'users.search', 'uses' => 'Admin\UsersController@search']);

    /** ROTAS Roles **/
    Route::get('roles', ['as' => 'roles.index', 'uses' => 'Admin\RolesController@index']);
    Route::get('roles/create', ['as' => 'roles.create', 'uses' => 'Admin\RolesController@create']);
    Route::get('roles/edit/{id}', ['as' => 'roles.edit', 'uses' => 'Admin\RolesController@edit']);
    Route::get('roles/delete/{id}', ['as' => 'roles.delete', 'uses' => 'Admin\RolesController@delete']);
    Route::post('roles/store', ['as' => 'roles.store', 'uses' => 'Admin\RolesController@store']);
    Route::post('roles/update/{id}', ['as' => 'roles.update', 'uses' => 'Admin\RolesController@update']);
    Route::get('roles/search/', ['as' => 'roles.search', 'uses' => 'Admin\RolesController@search']);
    Route::get('roles/manager/', ['middleware' => ['role:admin'], 'as' => 'roles.manager', 'uses' => 'Admin\RolesController@manager']);
    Route::post('roles/ajax-store/', ['as' => 'roles.ajaxStore', 'uses' => 'Admin\RolesController@ajaxStore']);

    /** ROTAS Permission **/
    Route::get('permissions', ['as' => 'permissions.index', 'uses' => 'Admin\PermissionController@index']);
    Route::get('permissions/create', ['as' => 'permissions.create', 'uses' => 'Admin\PermissionController@create']);
    Route::get('permissions/edit/{id}', ['as' => 'permissions.edit', 'uses' => 'Admin\PermissionController@edit']);
    Route::get('permissions/delete/{id}', ['as' => 'permissions.delete', 'uses' => 'Admin\PermissionController@delete']);
    Route::post('permissions/store', ['as' => 'permissions.store', 'uses' => 'Admin\PermissionController@store']);
    Route::post('permissions/update/{id}', ['as' => 'permissions.update', 'uses' => 'Admin\PermissionController@update']);
    Route::get('permissions/search/', ['as' => 'permissions.search', 'uses' => 'Admin\PermissionController@search']);

    Route::get('menus', ['as' => 'menus.index', 'uses' => 'Admin\MenusController@index']);
});
