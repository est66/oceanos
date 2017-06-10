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
//ALBUMS
    Route::resource('albums', 'AlbumController');
//ARTICLES
    Route::resource('articles', 'ArticleController');
//BUDGETS
    Route::resource('budgets', 'BudgetController');
//COUTS
    Route::resource('couts', 'CoutController');
//DEVISES
    Route::resource('devises', 'DeviseController');
//EDITIONS
    Route::resource('editions', 'EditionController');
//EQUIPES
    Route::resource('equipes', 'EquipeController');
//INFORMATIONS
    Route::resource('informations', 'InformationController');
//MEDIAS
    Route::resource('medias', 'MediaController');
//PARAMETRES
    Route::resource('parametres', 'ParametreController');
//PERSONNES
    Route::resource('personnes', 'PersonneController');
//PRESSES
    Route::resource('presses', 'PresseController');
//RESEAUX
    Route::resource('reseaux', 'ResSocialController');
//SPONSORS
    Route::resource('sponsors', 'SponsorController');
});
//-->
//SANS DROITS ADMINS--
//-->
////EDITIONS--
//Route::get('/editions', 'EditionController@index');
////A METTRE DANS AUTH
//Route::post('/editions/store', 'EditionController@store');
////-->
////
////EDITIONS--
//Route::get('/{edition}/', 'EditionController@index');
////A METTRE DANS AUTH
//Route::post('/editions/store', 'EditionController@store');
////-->



Route::get('/articles', function ($edition) {
    
});
Route::get('/editions/id', function () {

    //USERS
});

// ALBUMS
Route::resource('albums', 'AlbumController');
// ARTICLES
Route::resource('articles', 'ArticleController');
// BUDGETS
Route::resource('budgets', 'BudgetController');
// COUTS
Route::resource('couts', 'CoutController');
// DEVISES
Route::resource('devises', 'DeviseController');
//EDITIONS
Route::resource('editions', 'EditionController');
//EQUIPES
Route::resource('equipes', 'EquipeController');
//INFORMATIONS
Route::resource('informations', 'InformationController');
//MEDIAS
Route::resource('medias', 'MediaController');
//PARAMETRES
Route::resource('parametres', 'ParametreController');
//PERSONNES
Route::resource('personnes', 'PersonneController');
//PRESSES
Route::resource('presses', 'PresseController');
//RESEAUX
Route::resource('reseaux', 'ResSocialController');
//SPONSORS
Route::resource('sponsors', 'SponsorController');

//AUTRES FONCTIONS
//ARTICLES PAR EDITION
Route::get('editions/{nomEdition}/articles/', 'EditionController@articlesParEdition');
//EQUIPES PAR EDITION
Route::get('editions/{nomEdition}/equipes/', 'EditionController@equipesParEdition');
//PERSONNES DES EQUIPES PAR EDITION
Route::get('editions/{nomEdition}/equipes/{nomEquipe}', 'EditionController@personnesParEquipe');