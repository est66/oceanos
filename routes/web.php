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
//FONCTION ADMIN
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');


//AVEC DROIT ADMIN--
Route::group(['middleware' => 'auth'], function () {  

    
});
//-->


//EDITIONS--
Route::get('/editions', 'EditionController@index');
//A METTRE DANS AUTH
Route::post('/editions/store', 'EditionController@store');
//-->



//EDITIONS--
Route::get('/equipes', 'EquipeController@index');
Route::get('/personnes', 'PersonneController@index');
Route::get('/ep', 'EquipePersonneController@index');


Route::get('storage/images/sponsors/{filename}', function ($filename) {
    //ICI LE CODE ADMIN    
    redirect('storage/images/sponsors/'.$filename);   
//    $localhost = $_SERVER['SERVER_NAME'];
//    $localhost = "localhost/PROJET_INTEGRATION/OCENOS_COMMUN/oceanos/public/storage";
//    
//    $url =  "http://".$localhost."/images/sponsors/hes-so.png";   
//http://somedomain.com/storage/image.jpg
});

Route::get('/editions/id', function () {

    //USERS
});

