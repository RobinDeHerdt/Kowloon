<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Question;
use App\Product;

class ProductController extends Controller
{
    public function index($category_id, $product_id)
    {
    	$product 			= Product::find($product_id);
    	$relatedProducts 	= Product::where('category_id', $category_id)->where('id', '!=', $product_id)->take(4)->get();
    	$questions			= Question::where('product_id', $product_id)->get();;

    	return view('productdetail', [
    		'product' 			=> $product,
    		'relatedProducts' 	=> $relatedProducts,
    		'questions' 		=> $questions
    	]);
    }
}
