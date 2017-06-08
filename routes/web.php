<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */



Route::group(['middleware' => 'auth'], function () {
    Route::get('/hello', function ()    {
        return 'hello';
    });

    Route::get('user/profile', function () {
        // Uses Auth Middleware
    });
    
    Route::get('/users', function () {
    //ICI LE CODE ADMIN
    echo "// Only authenticated users may enter...";
    $users = DB::table('users')->get();
    return $users->toJson();
});});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');


Route::get('/logout', function () {
    return 'Non connecté';
});
