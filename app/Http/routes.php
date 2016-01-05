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
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

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

});
