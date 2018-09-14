<?php

use Illuminate\Http\Request;

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

Route::get('users', 'UserController@index');
// Route::get('users/{id}', 'UserController@show');
// Route::post('users', 'UserController@store');
// Route::put('users/{id}', 'UserController@update');
// Route::delete('users/{id}', 'UserController@delete');

Route::post('register', 'UserController@register')->name("register");
Route::post('login', 'UserController@login')->name("login");

Route::post('batchCreate', 'BatchController@batchCreate');
Route::get('batchRead/{user_id}', 'BatchController@batchRead');
Route::post('batchUpdate', 'BatchController@batchUpdate');
Route::post('batchDelete', 'BatchController@batchDelete');
