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
	//Auth
    Route::auth();

    //Tasks route's
    Route::get('/tasks/my', 'TasksController@my');
    Route::get('/', 'TasksController@index');
    Route::resource('tasks', 'TasksController');

    //Profile route's
    Route::resource('profile', 'ProfileController');  
});

Route::group(['middleware' => ['web', 'auth']], function() {
    //Admin route's
    Route::resource('admin/tasks', 'Admin\AdminTasksController');
    Route::resource('admin', 'Admin\AdminController');
    
});
