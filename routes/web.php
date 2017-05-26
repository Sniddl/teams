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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// API
// @example /user/john/roles
// Get all the roles from the user john.
Route::group(['prefix'=> '{type}'], function () {
  Route::group(['prefix'=> '{value}'], function () {
    Route::get('roles', 'APIController@roles');
    Route::get('users', 'APIController@users');
    Route::get('teams', 'APIController@teams');
  });
});
