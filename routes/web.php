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
Route::get('/admin', function() {
    return redirect('/admin/accueil');
});
Route::get('/', function() {
    return redirect('hydrocontest/accueil.html');
});
//FONCTION ADMIN
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::get('admin/{someword}', function() {
//    return view('upload');
//});




//FONCTIONS ET PAGES ACCESIBLES SEULEMENT POUR LES ADMINS
Route::group(['middleware' => 'auth'], function () {

Route::get('admin/edition', function() {
    return File::get(base_path() . '/admin/edition.html');
});


Route::get('admin/accueil', function() {
    return File::get(base_path() . '/admin/accueil.html');
});


Route::get('admin/equipe', function() {
    return File::get(base_path() . '/admin/equipe.html');
});


Route::get('admin/reseaux', function() {
    return File::get(base_path() . '/admin/reseauxSociaux.html');
});

Route::get('admin/espacesponsor', function() {
    return File::get(base_path() . '/admin/espaceSponsor.html');
});

Route::get('admin/espaceetudiant', function() {
    return File::get(base_path() . '/admin/espaceEtudiant.html');
});

Route::get('admin/contact', function() {
    return File::get(base_path() . '/admin/contact.html');
});

Route::get('admin/apparence', function() {
    return File::get(base_path() . '/admin/apparence.html');
});
Route::get('admin/media', function() {
    return File::get(base_path() . '/admin/media.html');
});

Route::get('admin/presse', function() {
    return File::get(base_path() . '/admin/presse.html');
});

Route::get('admin/actualite', function() {
    return File::get(base_path() . '/admin/actualite.html');
});
Route::get('admin/sponsor', function() {
    return File::get(base_path() . '/admin/sponsor.html');
});

 
});



//Route::get('upload', function() {
//    return view('upload');
//});
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
//permet d'uploader une image dans l'esapce de stockage puis redonne un lien
Route::get('upload/image/create', function() {
    return view('upload');
});
Route::post('upload/image', 'MediaController@uploadImage')->name('upload.media');
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
////EQUIPES-EDITION
Route::get('{nomEdition}/equipes', 'EquipeController@equipesEdition');
////PERSONNES-EDITION
Route::get('{nomEdition}/personnes', 'PersonneController@personnesEdition');
//ARTICLES-EDITION
Route::get('{nomEdition}/articles', 'ArticleController@articlesEdition');
//SPONSORS-EDITION
Route::get('{nomEdition}/sponsors', 'SponsorController@sponsorsEdition');
//ALBUMS-EDITION
Route::get('{nomEdition}/albums', 'AlbumController@albumsEdition');
//---------------------------------
//AUTRES - PERSONNES PAR EQUIPES PAR EDITION
Route::get('{nomEdition}/equipe/{nomEquipe}', 'EquipeController@personnesParEquipe');
//---------
//SELON MEDIA ----------------
//ROUTES QUI PERMET DE RETROUVER UN MEDIA SELON SON TYPE ET SON ID --> EX : equipe/media/1
//EQUIPE-MEDIA  
// à faire
Route::get('{type}/media/{id}', 'MediaController@media');
//ALBUM-MEDIAS-ENSEMBLE DES MEDIAS D'UN ALBUMS 
// à faire
//CHARGER EDTION
Route::get('edition/{nomEdition}', 'EditionController@chargerEdition');
// PAGE ACCUEIL
Route::get('accueil', 'EditionController@chargerAcceuil');
// PAGE EQUIPE
Route::get('equipe', 'EditionController@chargerEquipeEditionEnCours');
// PAGE EDITION PRECEDENTE
Route::get('editionprecedente', 'EditionController@editionPrecedente');
//-----------------------
// PAGE ESPACE SPONSOR
// à faire
Route::get('espacesponsor', 'EditionController@espaceSponsor');
// PAGE EQUIPE ETUDIANT
// à faire
Route::get('espaceetudiant', 'EditionController@espaceEtudiant');
// PAGE CONTACT
// à faire
Route::get('contact', 'EditionController@editionPrecedente');
//---------
//
//DESACTIVE TOUTES LES EDTIONS A PART CELLE DONNEE
Route::get('edition/activer/{id}', 'EditionController@activerEdition');
//ARTICLE-PRESSE ----------------
// à faire  
Route::get('presse/media/{id}', 'PresseController@media');
//---------
//EQUIPE PERSONNE---------
//ATTACHE UNE PERSONNE A L EQUIPE SELON equipe_id et personne_id
Route::post('equipes/ajouterpersonne', 'EquipeController@ajouterPersonne');

//DETACHE UNE PERSONNE A L EQUIPE SELON equipe_id et personne_id
Route::post('equipes/enleverpersonne', 'EquipeController@enleverPersonne');

//--------------------
//SPONSOR EDITION--------
//ATACHE UN SPONSOR A UNE EDITION SELON sponsor_id et edition_id
Route::post('sponsors/ajouteredition', 'SponsorController@ajouterEdition');
//DETACHE UN SPONSOR A UNE EDITION SELON equipe_id et personne_id
Route::post('sponsors/enleveredition', 'SponsorController@enleverEdition');
//--------------------
//ATACHE UN SPONSOR A UNE EDITION SELON sponsor_id et edition_id
Route::get('news', 'ArticleController@news');
//DETACHE UN SPONSOR A UNE EDITION SELON equipe_id et personne_id
Route::get('presse', 'ArticleController@presse');

Route::get('presseannee', 'ArticleController@presseParAnnee');


//REDIRECTION SI AUCUNES ROUTES DISPONBLES
//Route::get('{all}', 'HomeController@index')->name('home');

