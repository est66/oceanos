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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//AUTHENTIFIACTION REQUISE
Route::get('profile', function () {
    //ICI LE CODE ADMIN
    echo "// Only authenticated users may enter...";
$users = DB::table('users')->get();
return $users->toJson();
//foreach ($users as $user) {
//    echo $user;
//}
    Route::get('/logout', function () {
        Auth::logout();
        //Session::flush();
        return 'Déconnecté !';
    });
})->middleware('auth');


//ICI LE RESTE      

Route::get('/', function () {
    return 'welcome';
});
Route::get('/logout', function () {
        return 'Non connecté';
    });