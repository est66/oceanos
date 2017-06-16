<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Parametre;
/*
 * Les paramètres du site concerne l’attribution de feuille de style ou code javascript  
 * qui permettent de modifier les fonctionnalités du site

 */
class ParametreController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //return Parametre::all()->where('archive', false)->load('media')->load('presse');        
        return Parametre::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $resquest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $para = $request->all();
        // Règles de validations   
        // if (!Parametre::isValid($para)) {return response()->json('error', Response::HTTP_BAD_REQUEST);}   
        // création d'un nouvel objet
        $parametre = new Parametre($para);
        $parametre->save();
        return response()->json($parametre, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Parametre::find($id)->where();
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
        Parametre::find($id)->update($para);
        return response()->json('OK', Response::HTTP_OK);
    }

    public function destroy($id) {
//N'EST JAMAIS SUPPRIME !!!
    }

}
