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


/**
* 會員路由
*/
#Auth::routes();


/**
* 後台路由
*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', 'Admin\AdminController@loginForm');
    Route::get('/logout', 'Admin\AdminController@logout');
    Route::post('/login', 'Admin\AdminController@login');

    Route::group(['middleware' => 'auth.admin'], function() {
        Route::get('/', 'Admin\AdminController@index');

        Route::get('/{classes}/{method}', function($classes,$method){
            return App::make('App\Http\Controllers\Admin\\'.ucwords($classes).'Controller')->callAction($method,[]);
        });

        Route::get('/{classes}/{method}/{params}', function($classes,$method,$params){
            return App::make('App\Http\Controllers\Admin\\'.ucwords($classes).'Controller')->callAction($method,explode('/',$params));
        });
    });
});


/**
* 前台路由
*/
Route::group(['middleware' => 'domain'], function() {
    #Route::get('/', 'DomainController@index');
    #Route::get('/{method}', 'DomainController@method');
});


/**
* 無指定 404
*/
Route::get('/', function () {
    return view('errors.404');
});