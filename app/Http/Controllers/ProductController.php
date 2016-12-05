<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carouselimage;
use App\Category;
use App\Product;
use App\Tag;

class ProductController extends Controller
{
    public function index($product_id)
    {
    	$product 		= Product::find($product_id);

    	return view('productdetail', [
    		'product' 			=> $product
    	]);
    }
}
