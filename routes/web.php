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
  if(Auth::check()){
    return redirect()->route('home');
  }else {
    return view('welcome');
  }

});

Auth::routes();






Route::group(['prefix'=> 'team'], function () {
  Route::post('create', 'TeamController@create');
  Route::get('settings', 'SettingsController@team');
  Route::group(['prefix'=> 'edit'], function () {
    Route::get('home', 'EditController@home');
  });
  Route::get('{name}', 'TeamController@page');
});

Route::group(['prefix'=> 'me'], function () {
  Route::get('dashboard', 'HomeController@index')->name('home');
  Route::get('settings', 'SettingsController@user');
  Route::post('logout', function() {
    Auth::logout();
    return back();
  });
});





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
