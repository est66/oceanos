<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Edition;
use App\Equipe;
use App\Personne;



/*
 * Les équipes regroupent un ensemble de personne

 */
class EquipeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Equipe::with('media', 'personnes.media')->get()->where('archive', false);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $para = $request->all();
        // Règles de validations   
        // if (!Equipe::isValid($para)) {return response()->json('error', Response::HTTP_BAD_REQUEST);}   
        // création d'un nouvel objet
        // 
        //CREATION DE L'OBJET
        $equipe = new Equipe($para);
        //LIAISON A L'EDITION EN COURS
        $edition_id = Edition::where('actif', true)->first()->id;
        $equipe->edition_id = $edition_id;
        //SAUVEGARDE
        $equipe->save();
        return response()->json($equipe->id, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Equipe::find($id)->load('personnes');
        ;
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
        Equipe::find($id)->update($para);
        return response()->json('OK', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $equipe = Equipe::find($id);
        $equipe->archive = 1;
        $equipe->update();
        return response()->json('OK', Response::HTTP_OK);
    }

    /*
     * Donne toutes les equipes de l'edition
     */

    public function equipesEdition($nomEdition) {
        return Edition::where('nom', '=', $nomEdition)->first()->equipes->first()->with('media', 'personnes.media')->get();
    }

    //--------------------------------------------------------------------------
    //PERSONNES PAR EDITION
    public function personnesParEquipe($nomEdition, $nomEquipe) {

        $personnes = Edition::where('nom', '=', $nomEdition)->first()->equipes->first()->with('media', 'personnes.media')->where('nom', '=', $nomEquipe)->get();
        //->where('nom', '=', $nomEquipe);
        //first()->with('media','personnes.media')->where('nom', '=', $nomEquipe)->get();

        return $personnes;
    }

    //--------------------------------------------------------------------------
    //ATTACHE UNE PERSONNE A UNE EQUIPE
    public function ajouterPersonne(Request $request) {
        $equipeId = $request->equipe_id;
        $personneId = $request->personne_id;

        $equipe = Equipe::find($equipeId);

        $equipe->personnes()->attach($personneId);

        return response()->json($equipe->id, Response::HTTP_CREATED);
    }

    //DETACHE UNE PERSONNE A UNE EQUIPE
    public function enleverPersonne(Request $request) {
        $equipeId = $request->equipe_id;
        $personneId = $request->personne_id;

        $equipe = Equipe::find($equipeId);

        $equipe->personnes()->detach($personneId);

        return "$equipe->id";
    }

    //--------------------------------------------------------------------------
}
