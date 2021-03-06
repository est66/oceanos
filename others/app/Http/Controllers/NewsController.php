<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\News;
use App\Role;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user()->news;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $para = $request->only(['body', 'title']);
        if (!News::isValid($para)) {
            return response()->json('error', Response::HTTP_BAD_REQUEST);
        }
        // création de la news
        $news = new News($para);
        Auth::user()->news()->save($news);
        return  response()->json($news, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Check news id
        if (!News::isValid(['id' => $id])) {
            return response()->json('error', Response::HTTP_NOT_FOUND);
        }
        // Check ownership        
        if (Auth::user()->news()->find($id) == null) {
            return response()->json('error', Response::HTTP_FORBIDDEN);
        }
        // Check ACL ?
        return News::find($id);
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
        $para = $request->only(['body', 'title']);                      
        if (!News::isValid($para)) {
            return response()->json('error', Response::HTTP_BAD_REQUEST);
        }
        // Check news id
        if (!News::isValid(['id' => $id])) {
            return response()->json('error', Response::HTTP_NOT_FOUND);
        }
        // Check ownership        
        if (Auth::user()->news()->find($id) == null) {
            return response()->json('error', Response::HTTP_FORBIDDEN);
        }
        // Check ACL
        if (!Auth::user()->hasRole(Role::UPDATE, 'news')) {
            return response()->json('error', Response::HTTP_FORBIDDEN);
        }
        // Update
        News::find($id)->update($para);
        return response()->json('OK', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check news id
        if (!News::isValid(['id' => $id])) {
            return response()->json('error', Response::HTTP_NOT_FOUND);
        }
        // Check ownership        
        if (Auth::user()->news()->find($id) == null) {
            return response()->json('error', Response::HTTP_FORBIDDEN);
        }
        Auth::user()->news()->find($id)->delete();
        return response()->json('OK', Response::HTTP_OK);
    }
    
}
