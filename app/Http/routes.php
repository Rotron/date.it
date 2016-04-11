<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //

    Route::get('/', 'PagesController@home');

    Route::get('/about', 'PagesController@about');

    Route::get('/leases', 'LeasesController@index');

    Route::get('/users/create', 'UsersController@create');
    Route::post('/users/save', 'UsersController@save');
    Route::get('/users/home', 'UsersController@home');
    Route::get('/users/login', 'UsersController@login');
    Route::post('/users/dologin', 'UsersController@dologin');
    Route::get('/users/logout', 'UsersController@logout');
});
