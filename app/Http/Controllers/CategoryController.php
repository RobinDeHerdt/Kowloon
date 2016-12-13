<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carouselimage;
use App\Category;
use App\Product;
use App\Tag;

class CategoryController extends Controller
{
    public function index($id, Request $request)
    {
        $sortBy = $request->query('sort');

        switch ($sortBy)
        {
            case 'price_asc': 
                $products = Product::where('category_id', $id)->orderBy('price', 'asc')->get();
                break;
            case 'price_desc':
                $products = Product::where('category_id', $id)->orderBy('price','desc')->get();
                break;
            case 'latest':
                $products = Product::where('category_id', $id)->orderBy('created_at','desc')->get();
                break;
            case 'oldest':
                $products = Product::where('category_id', $id)->orderBy('created_at', 'asc')->get();
                break;
            default: 
                $products = Product::where('category_id', $id)->get();
        }
    	
    	$category 		= Category::find($id);
    	$carouselimages = Carouselimage::all();
    	$tags			= Tag::all();

        $minimumPricedProduct  = Product::where('category_id', $id)->orderBy('price', 'asc')->first();
        $maximumPricedProduct  = Product::where('category_id', $id)->orderBy('price', 'desc')->first();

    	return view('public.productoverview', [
    		'category' 			    => $category,
    		'products' 			    => $products,
    		'carouselimages'	    => $carouselimages,
    		'tags'				    => $tags,
            'minimumPricedProduct'  => $minimumPricedProduct,
            'maximumPricedProduct'  => $maximumPricedProduct,
    	]);
    }
}
