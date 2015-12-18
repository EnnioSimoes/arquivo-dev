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

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::get('/', ['as' => 'dashboard.index', 'uses' => 'Admin\AdminController@index']);
    Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'Admin\AdminController@index']);

    Route::get('posts', ['as' => 'posts.index', 'uses' => 'Admin\PostsController@index']);
    Route::get('posts/create', ['as' => 'posts.create', 'uses' => 'Admin\PostsController@create']);
    Route::post('posts/store', ['as' => 'posts.store', 'uses' => 'Admin\PostsController@store']);
    Route::get('posts/delete/{id}', ['as' => 'posts.delete', 'uses' => 'Admin\PostsController@delete']);

    Route::get('posts/search/', ['as' => 'posts.search', 'uses' => 'Admin\PostsController@search']);

    Route::get('perfil', ['as' => 'perfil.index', 'uses' => 'Admin\PerfilController@index']);
});

// Continuar em http://laravel.com/docs/5.1/authentication
