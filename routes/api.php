<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ComputerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'Api'], function () {
    Route::get('users', 'UserController@index');
    Route::post('users', 'UserController@store');
    Route::put('users/{id}', 'UserController@update');
    Route::delete('users/{id}', 'UserController@destroy');


    Route::get('tags', 'TagController@index');
    Route::post('tags', 'TagController@store');
    Route::put('tags/{id}', 'TagController@update');
    Route::delete('tags/{id}', 'TagController@destroy');
});
Route::group(['namespace' => 'Api'], function () {
    Route::get('rooms', 'RoomController@index');
    Route::post('rooms', 'RoomController@store');
    Route::put('rooms/{id}', 'RoomController@update');
    Route::delete('rooms/{id}', 'RoomController@destroy');
});
Route::group(['namespace' => 'Api'], function () {
    Route::get('computers', 'ComputerController@index');
    Route::post('computers', 'ComputerController@store');
});
Route::prefix('v1')->namespace('Api')->group(function () {
    // Login
    Route::post('/login','AuthController@postLogin');
    // Register
    Route::post('/register','AuthController@postRegister');
    // Protected with APIToken Middleware
    Route::middleware('APIToken')->group(function () {
      // Logout
      Route::post('/logout','AuthController@postLogout');
    });
});

