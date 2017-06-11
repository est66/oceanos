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


////AVEC DROIT ADMIN--
//Route::group(['middleware' => 'auth'], function () {
////ALBUMS
//    Route::resource('albums', 'AlbumController');
////ARTICLES
//    Route::resource('articles', 'ArticleController');
////BUDGETS
//    Route::resource('budgets', 'BudgetController');
////COUTS
//    Route::resource('couts', 'CoutController');
////DEVISES
//    Route::resource('devises', 'DeviseController');
////EDITIONS
//    Route::resource('editions', 'EditionController');
////EQUIPES
//    Route::resource('equipes', 'EquipeController');
////INFORMATIONS
//    Route::resource('informations', 'InformationController');
////MEDIAS
//    Route::resource('medias', 'MediaController');
////PARAMETRES
//    Route::resource('parametres', 'ParametreController');
////PERSONNES
//    Route::resource('personnes', 'PersonneController');
////PRESSES
//    Route::resource('presses', 'PresseController');
////RESEAUX
//    Route::resource('reseaux', 'ResSocialController');
////SPONSORS
//    Route::resource('sponsors', 'SponsorController');
//});
////-->



//SANS DROITS ADMINS--

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
//SELON L'EDITION ----------------
//ARTICLES-EDITION
Route::get('edition/{nomEdition}/articles/', 'EditionController@articlesEdition');
//EQUIPES-EDITION
Route::get('edition/{nomEdition}/articles/', 'ArticleController@equipesEdition');
//SPONSORS-EDITION
// à faire
Route::get('edition/{nomEdition}/sponsors/', 'SponsorController@sponsorsEdition');
//ALBUMS-EDITION
// à faire
Route::get('edition/{nomEdition}/albums', 'AlbumController@albumEdition');
//AUTRES - PERSONNES PAR EQUIPES PAR EDITION
Route::get('edition/{nomEdition}/equipes/{nomEquipe}', 'EquipeController@personnesParEquipe');
//---------

//SELON MEDIA ----------------
//ROUTES QUI PERMET DE RETROUVER UN MEDIA SELON SON TYPE ET SON ID --> EX : equipe/media/1
//EQUIPE-MEDIA  
// à faire
Route::get('{type}/media/{id}', 'MediaController@media');
//ALBUM-MEDIAS-ENSEMBLE DES MEDIAS D'UN ALBUMS 
// à faire

//CHARGER EDTION
Route::get('{nomEdition}', 'EditionController@chargerEdition');

//UPLOAD MEDIA
Route::post('media/store', function (Request $request){});
//---------


//ARTICLE-PRESSE ----------------
// à faire
Route::get('presse/media/{id}', 'PresseController@media');
//---------

