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

Route::get('register','Auth\AuthController@getRegister')->name('register');

Route::post('register','Auth\AuthController@postRegister');

Route::get('login', 'Auth\AuthController@getLogin')->name('login');

Route::post('login', 'Auth\AuthController@postLogin');


Route::get('logout', 'Auth\AuthController@getLogout')->name('logout');

Route::resource('users', 'UserController');	

Route::resource('tags','TagsController');

Route::resource('rooms', 'RoomController');

Route::resource('devices', 'DeviceController');

Route::resource('computers','ComputerController');

Route::resource('typedevices','TypeDevicesController');

Route::get('ajax', function(){
	return view('users.ajax');
});

Route::get('search/{name}', 'UserController@search');
Route::get('search', 'SearchController@getSearch');
Route::post('search/name', 'SearchController@getSearchAjax')->name('search');

