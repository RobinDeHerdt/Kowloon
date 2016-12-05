<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carouselimage;
use App\Category;
use App\Product;
use App\Tag;

class CategoryController extends Controller
{
    public function index($id)
    {
    	$products 		= Product::where('category_id', $id)->get();
    	$category 		= Category::find($id);
    	$carouselimages = Carouselimage::all();
    	$tags			= Tag::all();

    	return view('productoverview', [
    		'category' 			=> $category,
    		'products' 			=> $products,
    		'carouselimages'	=> $carouselimages,
    		'tags'				=> $tags
    	]);
    }
}
