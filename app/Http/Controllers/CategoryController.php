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
        $carouselimages = Carouselimage::all();
        $category       = Category::find($id);
        $tags           = Tag::all();

        $query          = Product::where('category_id', $id);
        
        foreach ($tags as $key => $tag) 
        {
            if($request->query(strtolower(str_replace(' ','_',$tag->name)))) 
            {
                $query->whereHas('tags', function($q) use ($tag){
                    $q->where('name', $tag->name);
                });
            }
        }

        switch ($request->query('sort'))
        {
            case 'price_asc': 
                    $sortBy     = 'price';
                    $sortOrder  = 'asc';
                break;
            case 'price_desc':
                    $sortBy     = 'price';
                    $sortOrder  = 'desc';
                break;
            case 'oldest':
                    $sortBy     = 'created_at';
                    $sortOrder  = 'asc';
                break;
            case 'latest':
                    $sortBy     = 'created_at';
                    $sortOrder  = 'desc';
                break;
            // Pas dit aan naar evt. hot items
            default: 
                    $sortBy     = 'created_at';
                    $sortOrder  = 'desc';
        }

        if ($request->query('minimumprice') && $request->query('maximumprice'))
        {
            $minprice       = $request->query('minimumprice');
            $maxprice       = $request->query('maximumprice');

            $products = $query->whereBetween('price',[$minprice,$maxprice])->orderBy($sortBy, $sortOrder)->get();
        }
        else
        {   
            $products = $query->orderBy($sortBy, $sortOrder)->get();
        }   

        $minimumPricedProduct  = $products->sortBy('price')->first();
        $maximumPricedProduct  = $products->sortByDesc('price')->first();

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
