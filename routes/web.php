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
    Route::get('/hello', function () {
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
    });
    Route::get('/editions', function () {
        //ICI LE CODE ADMIN
        echo "// Only authenticated users may enter...";
        $editions = DB::table('editions')->get();
        return $editions->toJson();
    });
    Route::get('/editions', function () {
        //ICI LE CODE ADMIN

        $editions = DB::table('editions')->get();

        foreach ($editions as $edition) {
            echo $edition->date;
        }
    });
});




Route::get('/editions', function () {
    //ICI LE CODE ADMIN

    $editions = DB::table('editions')->get();
    return App\Edition::all();
});


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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');


Route::get('/logout', function () {
    return 'Non connecté';
});
