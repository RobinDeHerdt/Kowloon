<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class SearchController extends Controller
{
    public function index(Request $request)
    {	
    	$results 	= null;
    	$response	= null;

    	if($request->query('query'))
    	{
    		$inputstring = strip_tags($request->query('query'));

            // Check of input niet alleen whitespace is/niet leeg is zonder tags
            if (!empty($inputstring) && !ctype_space($inputstring))
            {
        		// Split op meer dan 1 whitespace + negeer spaties voor of na inputstring
                $keywords = preg_split('/\s+/', $inputstring, -1, PREG_SPLIT_NO_EMPTY);

        		$results = Product::where(function($q) use ($keywords)
                {
                    foreach ($keywords as $key => $keyword) 
                    {
                        $q->orWhere('name', 'like', '%'.$keyword.'%')
                          ->orWhere('description', 'like', '%'.$keyword.'%')
                          ->orWhere('technical_description', 'like', '%'.$keyword.'%');
                    }
                })->get();

        		if($results->count())
        		{
        			$response = 'Er werden ' . $results->count() . ' resultaten gevonden voor "' . $inputstring . '":'; 
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

    	return view('public.search', [
			'results'        => $results,
			'response' 		 => $response,
			'categories' 	 => $categories
		]);
    }
}
