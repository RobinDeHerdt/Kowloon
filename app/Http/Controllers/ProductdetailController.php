<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Question;
use App\Product;

class ProductdetailController extends Controller
{
    public function index($category_id, $product_id)
    {
    	$product           = Product::find($product_id);
    	$relatedProducts   = Product::where('category_id', $category_id)->where('id', '!=', $product_id)->take(4)->get();
    	$questions         = Product::find($product_id)->questions()->get();
        $productimages     = Product::find($product_id)->productimages->take(3); 

    	return view('public.productdetail', [
    		'product' 			    => $product,
    		'questions' 		    => $questions,
            'relatedProducts'       => $relatedProducts,
            'productimages'         => $productimages
    	]);
    }
}
