<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;

class UploadController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        $nomDeDomain = "Information::find(6)->texte;";

        if ($request->hasFile('media')) {




            $media_id = $request->equipe_id;
            $personne_id = $request->personne_id;
            $article_id = $request->article_id;
            $sponsor_id = $request->sponsor_id;
            $album_id = $request->album_id;
            $information_id = $request->information_id;
            $presse_id = $request->presse_id;

            $fileName = $request->media->getClientOriginalName();

            
            $titre = $request->titre;
            $description = $request->description;
            //DEFINITION DU TYPE DE FICHIER SELON L'EXTENSION
            $ext = strtolower($request->file('media')->extension());
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "jpg"|| $ext == "gif") {
                $type = "image";
                $request->file('media')->storeAs('public/images',$fileName);
                $url = $nomDeDomain . '/storage/images/' . $fileName;
            } elseif ($ext == "mov" || $ext == "mp4" || $ext == "webm") {
                $type = "video";
                $request->file('media')->storeAs('public/videos');
                $url = $nomDeDomain . '/storage/videos/' . $fileName;
            } elseif ($ext == "pdf") {
                $type = "document";
                $request->file('media')->storeAs('public/documents');
                $url = $nomDeDomain . '/storage/documents/' . $fileName;
            } else {
                return "format de fichier invalide !";
            }

            return 'fichié '.$fileName.' uploadé !';
        }
        return"fichier manquant";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
