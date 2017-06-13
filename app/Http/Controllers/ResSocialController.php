<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResSocial;

class ResSocialController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //return ResSocial::all()->where('archive', false)->load('media')->load('presse');        
        return ResSocial::all();
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
        // if (!ResSocial::isValid($para)) {return response()->json('error', Response::HTTP_BAD_REQUEST);}   
        // création d'un nouvel objet
        $reseau = new ResSocial($para);
        $reseau->save();
        return response()->json($reseau, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return ResSocial::find($id)->where();
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
        ResSocial::find($id)->update($para);
        return response()->json('OK', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        ResSocial::find($id)->update(['archive' => true]);
        return response()->json('OK', Response::HTTP_OK);
    }

}
