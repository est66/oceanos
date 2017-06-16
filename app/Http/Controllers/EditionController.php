<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//A RAJOUTER
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Edition;
use App\Equipe;

/*
 * Cette classe permet de lier tout les éléments du site qui sont lier a une 
 * Edition. 
 * L'Edition se déroule chaque année et contient donc des médias, 
 * des articles, des équipes, des personnes, des sponsors set des albums

 */

class EditionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Edition::where('archive', false)->orderBy('date', 'desc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $para = $request->all();
        // Règles de validations //  VALIDATION  
//        if (!Edition::isValid($para)) {return response()->json('error', Response::HTTP_BAD_REQUEST);}   
        // création d'un nouvel objet
        $edition = new Edition($para);
        $edition->save();
        return response()->json($edition->id, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Edition::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $para = $request->all();
        Edition::find($id)->update($para);
        return response()->json('OK', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $edition = Edition::find($id);
        $edition->archive = 1;
        $edition->update();
        return response()->json('OK', Response::HTTP_OK);
    }

    //FONCTIONS SUPPLEMENTAIRES-------------------------------------------------
    //ARTICLES PAR EDITION
    public function articlesParEdition($nomEdition) {
        $edition = Edition::where('nom', '=', $nomEdition)->get()->first();
        return $edition->articles->where('archive', true);
    }

    //TEAM PAR EDITION
    public function equipesEdition($nomEdition) {
        $edition = Edition::where('nom', '=', $nomEdition)->get()->first();
        return $edition->equipes->where('archive', false);
    }

//CHARGE L'EDITION VOULU
    public function chargerEdition($nomEdition) {
        //return Edition::all()->first()->with('equipes.media','equipes.personnes.media','articles.media','articles.presse.media','sponsors.media','albums.medias')->where('nom', $nomEdition)->get();  
        return Edition::with('equipes.media', 'equipes.personnes.media', 'articles.media', 'articles.presse.media', 'sponsors.media', 'albums.medias')->where('nom', $nomEdition)->first();
    }

//PERMET DE CHARGER TOUTS LES ELEMENTS DE LA PAGE D'ACCUEIL
    public function chargerAcceuil() {

//          return Edition::where('actif', '=', true)->first();
        //return Edition::all()->first()->with('equipes.media','equipes.personnes.media','articles.media','articles.presse.media','sponsors.media','albums.medias')->where('nom', $nomEdition)->get();  
        return Edition::where('actif', '=', true)->with('equipes.personnes.media', 'articles.media', 'articles.presse.media', 'sponsors.media')->where('actif', '=', true)->first();
    }

//CHARGE L'ENSEMBLE DES ELLEMENTS DE L'EDITION EN COURS
    public function chargerEquipeEditionEnCours() {

        return Edition::with('equipes.media', 'equipes.personnes.media', 'sponsors.media', 'albums.medias')->where('actif', true)->first();
    }

//CHARGE L'ENSEMBLE DES ELLEMENTS DES EDITIOSN PRECEDENTES
    public function editionPrecedente() {
        return Edition::where('actif', '=', false)->with('equipes.media', 'equipes.personnes.media', 'sponsors.media', 'albums.medias')->where('actif', '=', false)->get();
    }

//PERMET D'ACTIVER UNE EDITION ET DESACTIVER TOUTES LES AUTRES
    public function activerEdition($id) {

        $exist = $editions = Edition::find($id);
        if ($exist != null) {

            $editions = Edition::all();

            foreach ($editions as $edition) {
                $edition->actif = false;
                $edition->update();
            }
            $edition2 = Edition::find($id);
            $edition2->actif = true;
            $edition2->update();
            return "edition activée !";
        }
    }

}
