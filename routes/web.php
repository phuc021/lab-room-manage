<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group wincache_refresh_if_changed()
| contains the "web" middleware group. Now create something great!
|	
*/

Route::get('/', function () {
    return view('home');
});

Route::get('register','UserController@getRegister')->name('register');

Route::post('register','UserController@postRegister');

Route::get('login', 'UserController@getLogin')->name('login');

Route::post('login', 'UserController@postLogin');

Route::get('logout', 'UserController@getLogout')->name('logout');

Route::resource('users', 'UserRestfulController');