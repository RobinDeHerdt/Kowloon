<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class SearchController extends Controller
{
    public function index()
    {	
    	$categories = Category::all();

    	return view('public.search', ['categories' => $categories]);
    }
}
