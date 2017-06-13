<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipe;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Equipe::with("personnes")->get();
        //Equipe::find(2)->personnes()->save(new Personne(['']));
        return Equipe::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $para = $request->all();
        $equipe = new Equipe($para);
        $equipe->edition_id=$para["edition_id"];
        $equipe->save();
        return response()->json($equipe->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $para = $request->all();
        $equipe =  Equipe::find($id);
        $equipe->edition_id=$para["edition_id"];
        $equipe->update($para);
        return response()->json($equipe->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipe = Equipe::find($id);
        $name = $equipe->nom;
        $equipe->archive = 1;
        $equipe->update();
        return response()->json("equipe ".$name."  supprimé");
    }
    
    
}
