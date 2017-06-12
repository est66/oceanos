<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edition;
use App\Equipe;
use App\Personne;

class EquipeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Equipe::all()->first()->with('media', 'personnes.media')->get()->where('archive', false);
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
        $equipe = new Equipe($para);
        $equipe->save();
        return response()->json($equipe, Response::HTTP_CREATED);
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
        Equipe::find($id)->update(['archive' => true]);
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

}
