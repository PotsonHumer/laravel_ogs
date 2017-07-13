<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');


/**
* 會員路由
*/
Auth::routes();

/**
* 後台路由
*/
Route::group(['prefix' => 'admin'], function() {
	Route::get('/login', 'AdminController@loginForm');
	Route::get('/logout', 'AdminController@logout');

	Route::post('/login', 'AdminController@login');

	Route::group(['middleware' => 'auth.admin'], function() {
		Route::get('/', 'AdminController@index');
	});
});