<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('users', 'userscontroller@index');
Route::get('users/resetpassword/{token}', 'userscontroller@getResetpassword');

//Route::get('users/login', 'userscontroller@getlogin');
//Route::resource('users/signin', 'userscontroller@postsignin');
//Route::resource('users/dashboard', 'userscontroller@getdashboard');
//Route::resource('users/logout', 'userscontroller@getlogout');

//Route::resource('users', 'userscontroller', array('except' => array('login', 'signin', 'logout', 'dashboard')));
//Route::get('authen','userscontroller@authenticateAction');
//Route::get('dashboard','userscontroller@getdashboard');

Route::controller('users', 'UsersController');
//Route::controller('password', 'RemindersController');

//Route::controller('users', 'UsersController',array('only'=>array('login')));
//Route::resource('users', 'Userscontroller', array('only' => array('edit','show','create', 'store', 'update', 'destroy')));

