<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Article;
use App\Edition;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //return Article::all()->where('archive', false)->load('media')->load('presse');        
        return Article::all()->first()->with('media', 'presse.media')->get()->where('archive', false);
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
        // if (!Article::isValid($para)) {return response()->json('error', Response::HTTP_BAD_REQUEST);}   
        // création d'un nouvel objet
        $article = new Article($para);
        $article->save();
        return response()->json($article, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Article::all()->first()->with('media', 'presse.media')->get()->find($id);
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
        Article::find($id)->update($para);
        return response()->json('OK', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $article = Article::find($id);
        $article->archive = 1;
        $article->update();
        return response()->json('OK', Response::HTTP_OK);
    }

    //------------------------------------------------------------------------------
    /*
     * Donne tous les articles de l'edition
     */

    public function articlesEdition($nomEdition) {
        return Edition::where('nom', '=', $nomEdition)->first()->articles->first()->with('media', 'presse.media')->get()->where('archive', false);
    }

}
