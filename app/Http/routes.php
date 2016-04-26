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
    // Pages related routes
    Route::get('/', 'PagesController@home');
    Route::get('/about', 'PagesController@about');

    // Cities related routes
    Route::get('/cities', 'CitiesController@index');

    // User related routes
    Route::get('/users/create', 'UsersController@create');
    Route::post('/users/save', 'UsersController@save');
    Route::get('/users/login', 'UsersController@login');
    Route::post('/users/login', 'UsersController@dologin');
    Route::get('/users/logout', 'UsersController@logout');

    Route::group(['middleware' => 'auth'], function(){
        Route::get('/users/home', 'UsersController@home');
        Route::get('/users/discover', 'UsersController@discover');
        Route::get('/users/profile/{id}', 'UsersController@profile');
    });
    
    Route::group(['middleware' => 'admin'], function(){
        Route::get('/admin/home', 'AdminController@home');

        Route::get('/cities/create', 'CitiesController@create');
        Route::post('/cities/save', 'CitiesController@save');
        Route::get('/cities/modify/{id}', 'CitiesController@modify');
        Route::post('/cities/update', 'CitiesController@update');
        Route::get('/cities/delete/{id}', 'CitiesController@delete');

        Route::get('/hobbies/create', 'HobbiesController@create');
        Route::post('/hobbies/save', 'HobbiesController@save');
        Route::get('/hobbies/modify/{id}', 'HobbiesController@modify');
        Route::post('/hobbies/update', 'HobbiesController@update');
        Route::get('/hobbies/delete/{id}', 'HobbiesController@delete');
    });
});
