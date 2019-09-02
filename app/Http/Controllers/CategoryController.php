<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Categories;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Categories::get();
        return response()->json(["data"=>array_chunk($categories->toArray(), 2)]);
    }
}
