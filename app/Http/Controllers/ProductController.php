<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carouselimage;
use App\Product;

class ProductController extends Controller
{
    public function index($id)
    {
    	$products 		= Product::where('category_id', $id)->get();
    	$carouselimages = Carouselimage::all();

    	return view('productoverview', [
    		'products' => $products,
    		'carouselimages' => $carouselimages
    	]);
    }
}
