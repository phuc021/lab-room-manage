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

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Route Auth
|--------------------------------------------------------------------------
*/
Route::get('register','Auth\AuthController@getRegister')->name('register');
Route::post('register','Auth\AuthController@postRegister');
Route::get('login', 'Auth\AuthController@getLogin')->name('login');
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', 'Auth\AuthController@getLogout')->name('logout');

Route::middleware(['guest', 'locale'])->group(function () {
	/*
	|--------------------------------------------------------------------------
	| Change Language
	|--------------------------------------------------------------------------
	*/
	Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('change-language');

	/*
	|--------------------------------------------------------------------------
	| Routes User
	|--------------------------------------------------------------------------
	*/
	Route::get('users', 'UserController@index');
	Route::get('users/create', 'UserController@create')->middleware('can:user.create');
	Route::post('users', 'UserController@store');
	Route::get('users/{id}/edit', 'UserController@edit')->middleware('can:user.update');
	Route::put('users/{id}', 'UserController@update');
	Route::get('users/{id}', 'UserController@show');
	Route::delete('users/{id}','UserController@destroy')->middleware('can:user.delete');
	Route::get('users/search/{key}', 'UserController@search'); 

	/*
	|--------------------------------------------------------------------------
	| Routes Tag
	|--------------------------------------------------------------------------
	*/
	Route::resource('tags','TagsController');

	/*
	|--------------------------------------------------------------------------
	| Routes Room
	|--------------------------------------------------------------------------
	*/
	Route::resource('rooms', 'RoomController');

	/*
	|--------------------------------------------------------------------------
	| Routes Device
	|--------------------------------------------------------------------------
	*/

	Route::get('devices', 'DeviceController@index');
	Route::get('devices/create', 'DeviceController@create')->middleware('can:devices.create');
	Route::post('devices', 'DeviceController@store');
	Route::get('devices/{id}/edit', 'DeviceController@edit')->middleware('can:devices.update');
	Route::put('devices/{id}', 'DeviceController@update');
	Route::get('devices/{id}', 'DeviceController@show');
	Route::delete('devices/{id}','DeviceController@destroy')->middleware('can:devices.delete');
	Route::get('devices/search/{key}', 'DeviceController@search'); 

	/*
	|--------------------------------------------------------------------------
	| Routes Computer
	|--------------------------------------------------------------------------
	*/
	Route::resource('computers','ComputerController');

	/*
	|--------------------------------------------------------------------------
	| Routes Type Device
	|--------------------------------------------------------------------------
	*/
	Route::resource('typedevices','TypeDevicesController');
	
	/*
	|--------------------------------------------------------------------------
	| Routes Task
	|--------------------------------------------------------------------------
	*/
	Route::resource('tasks','TaskController');
	
});


// Route::get('ajax', function(){
// 	return view('users.ajax');
// });

// Route::get('search/{name}', 'UserController@search');
// Route::get('search', 'SearchController@getSearch');
// Route::post('search/name', 'SearchController@getSearchAjax')->name('search');


// Auth::routes();


