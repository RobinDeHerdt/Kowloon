<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Carouselimage;
use App\Category;
use App\Product;
use App\Tag;

class CategoryController extends Controller
{
    public function index($id, Request $request)
    {
        $selectedTags   = [];
        $resultsPerPage = 4;
        $minimumprice   = 0;
        $maximumprice   = 0;

        $carouselimages = Carouselimage::all();
        $category       = Category::find($id);
        $tags           = Tag::all();

        $query          = Product::where('category_id', $id);

        if($category)
        {
            if($request->collections)
            {
                $selectedTags = $request->collections;

                foreach ($selectedTags as $key => $tag_id) 
                {
                    $query->whereHas('tags', function($q) use ($tag_id){
                        $q->where('tag_id', $tag_id);
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
                $minimumprice       = $request->query('minimumprice');
                $maximumprice       = $request->query('maximumprice');

                $products           = $query->whereBetween('price',[$minimumprice,$maximumprice])->orderBy($sortBy, $sortOrder)->paginate($resultsPerPage);
            }
            else
            {   
                $allproducts            = $query->get();
                
                if($allproducts->count())
                {
                    $minimumpriceditem      = $allproducts->sortBy('price')->first();
                    $maximumpriceditem      = $allproducts->sortByDesc('price')->first();

                    $minimumprice           = $minimumpriceditem->price;
                    $maximumprice           = $maximumpriceditem->price;
                }
            
                $products               = $query->orderBy($sortBy, $sortOrder)->paginate($resultsPerPage);
            }   

            // https://github.com/laravel/framework/issues/858
            foreach (Input::except('page') as $input => $value)
            {
                $products->appends($input, $value);
            }

            

            return view('public.productoverview', [
                'tags'                  => $tags,
                'category'              => $category,
                'products'              => $products,
                'selectedTags'          => $selectedTags,
                'carouselimages'        => $carouselimages,
                'minimumprice'          => $minimumprice,
                'maximumprice'          => $maximumprice,
            ]);
        }
        else
        {
            abort(404);
        }
    }
}
