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


Route::get('/login/{social}', 'Auth\LoginController@socialLogin')->where('social', 'twitter|facebook|google|github');
Route::get('/login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'twitter|facebook|google|github');

Route::group(['middleware' => ['blocked', 'auth']], function () {
    Route::get('blocked', 'BlockedController@index')->name('blocked');
    Route::get('support', 'BlockedController@support')->name('support');
    Route::get('sendMail', 'BlockedController@sendMail')->name('sendMail');
});

Route::group(['middleware' => 'active'], function () {
    Route::get('home', 'HomeController@index')->name('home');

    Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {
        Route::resource('users', 'UserCrudController');
        Route::get('ban/{id}', 'UserCrudController@block')->name('blockUser');
    });

    Route::group(['middleware' => 'verified', 'namespace' => 'Task'], function () {
        Route::resource('tasks', 'TaskController');
        Route::get('owner/{id}', 'OwnerController@owner')->name('owner');
        Route::get('category/{id}', 'CategoryController@tasks')->name('category');
    });
});





