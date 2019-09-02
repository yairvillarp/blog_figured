<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Categories;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with("Category")->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.articles.index', ["articles"=>$articles]);
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $req)
    {
        $article = new Article();
        $article->title = $req->title;
        $article->intro = $req->intro;
        $article->slug = $req->slug ? $req->slug : str_slug($req->title, '-');
        $article->tags = explode(',', $req->tags);
        $article->categories_id = $req->category;
        $article->body = $req->body;

        if($req->hasFile('img')){
            $article->img = $this->UploadImg($req);
        }

        $article->save();
        return redirect()->route('Articles Edit', ['id'=> $article->_id]);
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Categories::get();
        return view('admin.articles.edit', ['article'=>$article, 'categories'=>$categories]);
    }

    public function update(Request $req, $id)
    {
        $article = Article::find($id);
        $article->title = $req->title;
        $article->intro = $req->intro;
        $article->slug = $req->slug ? $req->slug : str_slug($req->title, '-');
        $article->tags = explode(',', $req->tags);
        $article->categories_id = $req->category;
        $article->body = $req->body;

        if($req->hasFile('img')){
            $article->img = $this->UploadImg($req);
        }
        
        $article->save();
        return redirect()->route('Articles');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('Articles');
    }

    public function UploadImg($req){
        $req->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$req->img->getClientOriginalExtension();
        $req->img->move(public_path('images'), $imageName);
        return $imageName;
    }
}
