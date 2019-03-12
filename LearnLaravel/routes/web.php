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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'twitter|facebook|google|github');
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'twitter|facebook|google|github');


Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/home', 'HomeController@Index')->name('adminHome');
    Route::get('/users', 'UsersController@Index')->name('adminUsers');
    Route::get('/users/{id}/{action}', 'UsersController@User');
});