<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use LaravelLocalization;

class SearchController extends Controller
{
    public function index(Request $request)
    {	
    	$results 	= null;
    	$response	= null;

        if($request->query('minprice') && $request->query('maxprice'))
        {
            $minprice   = $request->query('minprice');
            $maxprice   = $request->query('maxprice');
        }
        else
        {
            $minprice   = Product::all()->sortBy('price')->first()->price;
            $maxprice   = Product::all()->sortByDesc('price')->first()->price;
        }        

    	if($request->query('query'))
    	{
    		$inputstring = strip_tags($request->query('query'));

            // Check of input niet alleen whitespace is/niet leeg is zonder tags
            if (!empty($inputstring) && !ctype_space($inputstring))
            {
        		// Split op meer dan 1 whitespace + negeer spaties voor of na inputstring
                $keywords = preg_split('/\s+/', $inputstring, -1, PREG_SPLIT_NO_EMPTY);

                if($request->categories) 
                {
                    $results = Product::whereIn('category_id',$request->categories)->whereBetween('price',[$minprice,$maxprice])->where(function($q) use ($keywords)
                    {
                        foreach ($keywords as $key => $keyword) 
                        {
                            $q->orWhere('name_'.LaravelLocalization::getCurrentLocale(), 'like', '%'.$keyword.'%')
                              ->orWhere('description_'.LaravelLocalization::getCurrentLocale(), 'like', '%'.$keyword.'%')
                              ->orWhere('technical_description_'.LaravelLocalization::getCurrentLocale(), 'like', '%'.$keyword.'%');
                        }
                    })->paginate(3);
                }
                else
                {
                    $minprice       = $request->query('minprice');
                    $maxprice       = $request->query('maxprice');

                    $results = Product::whereBetween('price',[$minprice,$maxprice])->where(function($q) use ($keywords)
                    {
                        foreach ($keywords as $key => $keyword) 
                        {
                            $q->orWhere('name_'.LaravelLocalization::getCurrentLocale(), 'like', '%'.$keyword.'%')
                              ->orWhere('description_'.LaravelLocalization::getCurrentLocale(), 'like', '%'.$keyword.'%')
                              ->orWhere('technical_description_'.LaravelLocalization::getCurrentLocale(), 'like', '%'.$keyword.'%');
                        }
                    })->paginate(3);
                }
                
                // https://github.com/laravel/framework/issues/858
                foreach (Input::except('page') as $input => $value)
                {
                    $results->appends($input, $value);
                }

        		if($results->total())
        		{
        			$response = 'Er werden ' . $results->total() . ' resultaten gevonden voor "' . $inputstring . '":'; 
        		}
        		else
        		{
        			$response = 'Er werden geen resultaten gevonden voor "' . $inputstring . '"'; 
        		}
            }
            else
            {
                $response = 'Dit is geen goede zoekopdracht. Probeer nog een keer.';
            }
    	}

    	$categories = Category::all();
        $selectedCategories = [];

        if($request->categories)
        {
           $selectedCategories = $request->categories; 
        } 
        else
        {
            foreach ($categories as $key => $category) {
                array_push($selectedCategories, $category->id);
            } 
        }

    	return view('public.search', [
			'results'               => $results,
			'response' 		        => $response,
			'categories' 	        => $categories,
            'selectedCategories'    => $selectedCategories,
            'minprice'              => $minprice,
            'maxprice'              => $maxprice,
		]);
    }
}
