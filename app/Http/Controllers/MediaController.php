<?php

namespace App\Http\Controllers;

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
        if ($request->hasFile('media')) {
//            $request->file('media');
//            //$request->media->store('public');
//            return $request->media->extension();
            $url = null;
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
            $media->type = $description;
            $media->url = $url;

            Media::find($id)->update($media);
            return response()->json('OK', Response::HTTP_OK);
        }

        return"fichier manquant";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Media::find($id)->update(['archive' => true]);
        return response()->json('OK', Response::HTTP_OK);
    }

    //ROUTES POUR TOUS LES MEDIAS SELON LE TYPE ET L'ID DE L'OBJET CONCERNE
    public function media($type, $id) {
        $media_id = $type . '_id';
        return Media::all()->where($media_id, '=', $id);
    }

}
