<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//A RAJOUTER
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use App\Edition;
use App\Equipe;

class EditionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Edition::all()->where('archive', false);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $para = $request->all();
        // Règles de validations //  VALIDATION  if (!Edition::isValid($para)) {return response()->json('error', Response::HTTP_BAD_REQUEST);}   
        // création d'un nouvel objet
        $edition = new Edition($para);
        $edition->save();
        return response()->json($edition, Response::HTTP_CREATED);
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
        $edition->delete();
        return response()->json('OK', Response::HTTP_OK);
    }

    //FONCTIONS SUPPLEMENTAIRES
    //
    //ARTICLES PAR EDITION
    public function articlesParEdition($nomEdition) {
        $edition = Edition::where('nom', '=', $nomEdition)->get()->first();
        return $edition->articles->where('archive', false);
    }

    //TEAM PAR EDITION
    public function equipesParEdition($nomEdition) {
        $edition = Edition::where('nom', '=', $nomEdition)->get()->first();
        return $edition->equipes->where('archive', false);
    }

        //PERSONNES PAR TEAM PAR EDITION
    public function personnesParTeam($nomEdition,$nomEquipe) {
        $edition = Edition::where('nom', '=', $nomEdition)->get()->first()->personnes->where('team', '=', $nomEquipe);    
       return $edition;

    }
    
}
