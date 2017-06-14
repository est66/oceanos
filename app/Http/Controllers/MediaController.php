<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Media;

class MediaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Media::all()->where('archive', false);
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
        // if (!Media::isValid($para)) {return response()->json('error', Response::HTTP_BAD_REQUEST);}   
        // création d'un nouvel objet
        if ($request->hasFile('media')) {
//            $request->file('media');
//            //$request->media->store('public');
//            return $request->media->extension();

            $url = null;
            $media_id = null;
            $personne_id = null;
            $article_id = null;
            $sponsor_id = null;
            $album_id = null;
            $information_id = null;
            $presse_id = null;

            $media_id = $request->equipe_id;
            $personne_id = $request->personne_id;
            $article_id = $request->article_id;
            $sponsor_id = $request->sponsor_id;
            $album_id = $request->album_id;
            $information_id = $request->information_id;
            $presse_id = $request->presse_id;



            $media = new Media();
            $titre = $request->titre;
            $description = $request->description;
            //DEFINITION DU TYPE DE FICHIER SELON L'EXTENSION
            $ext = strtolower($request->file('media')->extension());
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "jpg") {
                $type = "image";
                $url = $request->file('media')->store('public/images');
            } elseif ($ext == "mov" || $ext == "mp4" || $ext == "webm") {
                $type = "video";
                $url = $request->file('media')->store('public/videos');
            } elseif ($ext == "pdf") {
                $type = "document";
                $url = $request->file('media')->store('public/documents');
            } else {
                return "format de fichier invalide !";
            }
            $media->titre = $titre;
            $media->type = $type;
            $media->description = $description;
            $media->url = $url;
            $media->save();
            return $media;
        }
        return"fichier manquant";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Media::find($id)->load('medias');
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
        $media = Media::find($id);
        // Règles de validations   
        // if (!Media::isValid($para)) {return response()->json('error', Response::HTTP_BAD_REQUEST);}   
        // création d'un nouvel objet
        if ($request->hasFile('media')) {


            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "jpg") {
                $type = "image";
                $url = $request->file('media')->store('public/images');
                $media->url = $url;
                $media->type = $type;
            } elseif ($ext == "mov" || $ext == "mp4" || $ext == "webm") {
                $type = "video";
                $url = $request->file('media')->store('public/videos');
                $media->url = $url;
                $media->type = $type;
            } elseif ($ext == "pdf") {
                $type = "document";
                $media->url = $url;
                $media->type = $type;
                $url = $request->file('media')->store('public/documents');
            } else {
                return "format de fichier invalide !";
            }
        }
        $media->equipe_id = $request->equipe_id;
        $media->personne_id = $request->personne_id;
        $media->article_id = $request->article_id;
        $media->sponsor_id = $request->sponsor_id;
        $media->album_id = $request->album_id;
        $media->information_id = $request->information_id;
        $media->presse_id = $request->presse_id;
        $media->titre = $request->titre;
        $media->description = $request->description;
        $media->update();
        return $media;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $media = Media::find($id);
        $media->archive = 1;
        $media->update();
        return response()->json('OK', Response::HTTP_OK);
    }

    //ROUTES POUR TOUS LES MEDIAS SELON LE TYPE ET L'ID DE L'OBJET CONCERNE
    public function media($type, $id) {
        $media_id = $type . '_id';
        return Media::all()->where($media_id, '=', $id);
    }

}
