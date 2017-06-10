<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//A RAJOUTER
use Symfony\Component\HttpFoundation\Response;
use App\Edition;

class EditionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Edition::all();
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
        $edition = Edition::where('nom', '=', '2017')->get()->first();
        return $edition->articles;
    }

}
