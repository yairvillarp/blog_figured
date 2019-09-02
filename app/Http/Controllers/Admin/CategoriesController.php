<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::orderBy('created_at', 'desc')->paginate(5);

        return view('admin.categories.index', ["categories"=>$categories]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $req)
    {
        $category = new Categories();
        $category->title = $req->title;

        $category->save();
        return redirect()->route('Categories Edit', ['id'=> $category->_id]);
    }

    public function edit($id)
    {
        $category = Categories::find($id);
        return view('admin.categories.edit', ['category'=>$category]);
    }

    public function update(Request $req, $id)
    {
        $category = Categories::find($id);
        $category->title = $req->title;

        $category->save();
        return redirect()->route('Categories');
    }

    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return redirect()->route('Categories');
    }
}
