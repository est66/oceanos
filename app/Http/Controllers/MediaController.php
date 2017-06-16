<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Media;
use App\Information;

class MediaController extends Controller {

//REND L'ENSEMBLE DES MEDIAS
    public function index() {
        return Media::all()->where('archive', false);
    }

//ENREGISTRE UN NOUVEAU MEDIA ET LE TRIE SELON SON EXTENSION
    public function store(Request $request) {
        //PREND EN VARAIBLE LE NOM DE DOMAINE POUR FORMER L'URL DU MEDIA
        $nomDeDomain = Information::find(6)->texte;
        //REGLES DE VALIDATION       
        if ($request->hasFile('media')) {
            //PREND DES INFORMATIONS DU MEDIA
            $fileName = $request->media->hashName();
            $clientFileName = $request->media->getClientOriginalName();
            $fileOne = pathinfo($clientFileName, PATHINFO_FILENAME);

            //DEFINITION DU TYPE DE FICHIER SELON L'EXTENSION
            $ext = strtolower($request->file('media')->extension());
            $url = null;
            $type = null;
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif") {
                $type = "image";
                $request->file('media')->storeAs('public/images', $fileOne . '-' . $fileName);
                $url = $nomDeDomain . '/storage/images/' . $fileOne . '-' . $fileName;
            } elseif ($ext == "mov" || $ext == "mp4" || $ext == "webm") {
                $type = "video";
                $request->file('media')->storeAs('public/videos', $fileOne . '-' . $fileName);
                $url = $nomDeDomain . '/storage/videos/' . $fileOne . $fileName;
            } elseif ($ext == "pdf") {
                $type = "document";
                $request->file('media')->storeAs('public/documents', $fileOne . $fileName);
                $url = $nomDeDomain . '/storage/documents/' . $fileOne . '-' . $fileName;
            } else {
                return "format de fichier invalide !";
            }
            //SAUVEGARDE DU MEDIA
            $para = $request->offsetUnset('media');
            $para['url'] = $url;
            $para['type'] = $type;
            $media = new Media($para);
            $media->save();
            return response()->json($media, Response::HTTP_CREATED);
        }
        return"fichier manquant";
    }

//REND UN MEDIA PARTICULIER SELON SON ID
    public function show($id) {
        return Media::find($id);
    }

// MODIFIE LES ATTRIBUTS DE MEDIA ET SUPPRIME LE FICHIER--> pour remplacer l'image on utilise la fonction uploadImage
    public function update(Request $request, $id) {
        $para = $request->all();
        Media::find($id)->update($para);
        return response()->json('OK', Response::HTTP_OK);
    }

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

    public function uploadImage(Request $request) {
        //PREND EN VARAIBLE LE NOM DE DOMAINE POUR FORMER L'URL DU MEDIA
        $nomDeDomain = Information::find(6)->texte;
        //REGLES DE VALIDATION       
        if ($request->hasFile('media')) {
            //PREND DES INFORMATIONS DU MEDIA
            $fileName = $request->media->hashName();
            $clientFileName = $request->media->getClientOriginalName();
            $fileOne = pathinfo($clientFileName, PATHINFO_FILENAME);

            //DEFINITION DU TYPE DE FICHIER SELON L'EXTENSION
            $ext = strtolower($request->file('media')->extension());
            $url = null;
            if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif") {
                $request->file('media')->storeAs('public/images', $fileOne . '-' . $fileName);
                $url = $nomDeDomain . '/storage/images/' . $fileOne . '-' . $fileName;
            } else {
                return "format de fichier invalide !";
            }
            //SUPPRIME L'ANCIEN MEDIA (fonction non implementée -> on conserve tous les médias dans la base de donnée)
//            $fileToDelette = Media::find($id)->first()->url;
//            File::delete($fileToDelette);
            return $url;
        }
        return"fichier manquant";
    }

}
