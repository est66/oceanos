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

Route::get('/', function () {
    return 'welcome';
});

Route::get('/login', 'AuthController@login');
Route::post('/auth/check', 'AuthController@check');

Route::group(['middleware' => 'MyAuth'], function () {
    Route::get('/auth/logout', 'AuthController@logout');
    Route::get('/secure1', function () {
        return "I'm logged";
    });
    
    Route::resource('news', 'NewsController', ['except' => ['create', 'edit']]);
    
    Route::group(['middleware' => 'Root'], function () {
        Route::get('/admin', function () {
            return "I'm root !";
        });
    });
            
});


/*
// Affichage d'une photo

Route::get('/gallerie/{idGallerie}/photo/{idPhoto}', 'PhotoController@show');
Route::post('/gallerie/{idGallerie}/addPhoto', 'GallerieController@addPhoto');
        
Route::post('/photo', 'PhotoController@add');
Route::get('/photo/{id}', 'PhotoController@show');
 
Route::controller('/news', 'NewsController');
        



*/