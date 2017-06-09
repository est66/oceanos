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

//Route::get('/', function () {
//    return 'welcome';
//});
//
//Route::resource('projects.tasks', 'PhotoController', ['only' => ['index', 'show', 'store']]);
//
//Route::get('/login', 'AuthController@login');
//Route::post('/auth/check', 'AuthController@check');
//
//Route::group(['middleware' => 'MyAuth'], function () {
//    Route::get('/auth/logout', 'AuthController@logout');
//    Route::get('/secure1', function () {
//        return "I'm logged";
//    });
//
//    Route::resource('news', 'NewsController', ['except' => ['create', 'edit']]);
//
//    Route::group(['middleware' => 'Root'], function () {
//        Route::get('/admin', function () {
//            return "I'm root !";
//        });
//    });
//
//});


/*
  // Affichage d'une photo

  Route::get('/gallerie/{idGallerie}/photo/{idPhoto}', 'PhotoController@show');
  Route::post('/gallerie/{idGallerie}/addPhoto', 'GallerieController@addPhoto');

  Route::post('/photo', 'PhotoController@add');
  Route::get('/photo/{id}', 'PhotoController@show');

  Route::controller('/news', 'NewsController');




 */





Route::get('storage/images/sponsors/{filename}', function ($filename) {
    //ICI LE CODE ADMIN    
    redirect('storage/images/sponsors/'.$filename);   
//    $localhost = $_SERVER['SERVER_NAME'];
//    $localhost = "localhost/PROJET_INTEGRATION/OCENOS_COMMUN/oceanos/public/storage";
//    
//    $url =  "http://".$localhost."/images/sponsors/hes-so.png";   
//http://somedomain.com/storage/image.jpg
});


Route::get('/', function () {
    return 'welcome';
});

Route::get('profile', function () {
    echo "// Only authenticated users may enter...";
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', function () {Auth::logout();});
