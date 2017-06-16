<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Sponsor;
use App\Edition;
/*
 * Classe qui reprend l’ensemble des sponsors de l'édition

 */
class SponsorController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Sponsor::all()->where('archive', false)->load('media');
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
        // if (!Sponsor::isValid($para)) {return response()->json('error', Response::HTTP_BAD_REQUEST);}   
        // création d'un nouvel objet
        $sponsor = new Sponsor($para);
        $sponsor->save();
        return response()->json($sponsor, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Sponsor::find($id)->load('media');
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
        Sponsor::find($id)->update($para);
        return response()->json('OK', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $sponsor = Sponsor::find($id);
        $sponsor->archive = 1;
        $sponsor->update();
        return response()->json('OK', Response::HTTP_OK);
    }

    //------------------------------------------------------------------------------
    /*
     * Donne tous les articles de l'edition
     */

    public function sponsorsEdition($nomEdition) {
        return Edition::where('nom', '=', $nomEdition)->first()->sponsors->where('archive', false)->load('media');
    }

    //--------------------------------------------------------------------------
    //ATTACHE UN SPONSOT A UNE EDITION
    public function ajouterEdition(Request $request) {
        $editionId = $request->edition_id;
        $sponsorId = $request->sponsor_id;

        $edition = Edition::find($editionId);

        $edition->sponsors()->attach($sponsorId);

        return "$edition->id";
    }

    //DETACHE UN SPONSOT D'UNE EDITION
    public function enleverEdition(Request $request) {
        $editionId = $request->edition_id;
        $sponsorId = $request->sponsor_id;

        $edition = Edition::find($editionId);

        $edition->sponsors()->detach($sponsorId);

        return "$edition->id";
    }

    //--------------------------------------------------------------------------
}
