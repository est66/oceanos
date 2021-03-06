<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Personne;
use App\Edition;
/*
 * Les personnes sont les membres qui participent à Hydrocontest. 
 * Ils sont tous lier a une équipe de type ingénieur ou autre.

 */
class PersonneController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Personne::all()->where('archive', false)->load('equipes')->load('media');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //RECUPERATION DES DONNEES
        $para = $request->all();
        // REGLES DE VALIDATION  
        // if (!Personne::isValid($para)) {return response()->json('error', Response::HTTP_BAD_REQUEST);}   
        // création d'un nouvel objet
        //CREATION DE L'OBJET
        $personne = new Personne($para);
        //LIAISON A L'EDITION EN COURS
        $edition_id = Edition::where('actif', true)->first()->id;
        $personne->edition_id = $edition_id;
        //SAUVEGARDE
        $personne->save();
        return response()->json($personne->id, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Personne::find($id)->load('media');
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
        Personne::find($id)->update($para);
        return response()->json('OK', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $personne = Personne::find($id);
        $personne->archive = 1;
        $personne->update();
        return response()->json('OK', Response::HTTP_OK);
    }

//------------------------------------------------------------------------------
    /*
     * Donne toutes les personnes de l'edition
     */

    public function personnesEdition($nomEdition) {
        return Edition::where('nom', '=', $nomEdition)->first()->personnes->first()->with('media')->get();
    }

}
