<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Album;
use App\Edition;


class AlbumController extends Controller {

//DONNE LES ALBUMS NON ARCHIVES
    public function index() {
        return Album::all()->where('archive', false)->load('medias');
    }

//STOCK UN NOUVEAU ALBUM
    public function store(Request $request) {
        $para = $request->all();
        // Règles de validations   
        // if (!Album::isValid($para)) {return response()->json('error', Response::HTTP_BAD_REQUEST);}   
        // création d'un nouvel objet
        //CREATION DE L'OBJET
        $album = new Album($para);
        //LIAISON A L'EDITION EN COURS
        $edition_id = Edition::where('actif', true)->first()->id;
        $album->edition_id = $edition_id;
        //SAUVEGARDE
        $album->save();
        return response()->json($album->id, Response::HTTP_CREATED);
    }

    public function show($id) {
        return Album::find($id)->load('medias');
    }

//UPDATE DE L'ALBUM
    public function update(Request $request, $id) {
        $para = $request->all();
        Album::find($id)->update($para);
        return response()->json('OK', Response::HTTP_OK);
    }

//ARCHIVE UN ALBUM
    public function destroy($id) {
        $album = Album::find($id);
        $album->archive = 1;
        $album->update();
        return response()->json('OK', Response::HTTP_OK);
    }

    //ALBUMS PAR EDITION
    public function albumsEdition($nomEdition) {
        $personnes = Edition::where('nom', '=', $nomEdition)->first()->albums->load('medias');
        return $personnes;
    }

}
