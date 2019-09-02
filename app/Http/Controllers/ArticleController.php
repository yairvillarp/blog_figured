<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Article;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles

        $articles = Article::with("Category")->orderBy('created_at', 'desc')->paginate(5);

        // Return collection of articles as a resource
        return ArticleResource::collection($articles);
    }

    public function perCategory($id)
    {
        // Get articles

        $articles = Article::with("Category")->where('categories_id', $id)->orderBy('created_at', 'desc')->paginate(5);

        // Return collection of articles as a resource
        return ArticleResource::collection($articles);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Get article
        $article = Article::where('slug', $slug)->first();

        // Return full single article as a json
        return response()->json(["data"=>$article]);
    }

    public function addComment(Request $req, $id)
    {
        // Get article
        $article = Article::findOrFail($id);
        // Append new comment
        //print_r($article->comments);die;
        $article->push('comments', $req->input());

        if($article->save()){
            // Return full single article as json
            return response()->json(["data"=>$article]); 
        }
    }
}
