<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Question;


class FaqController extends Controller
{
    public function index(Request $request)
    {	
    	$questions 	= null;
    	$response	= null;

    	if($request->query('query'))
    	{
    		$inputstring = strip_tags($request->query('query'));

            // Check of input niet alleen whitespace is/niet leeg is zonder tags
            if (!empty($inputstring) && !ctype_space($inputstring))
            {
        		// Split op meer dan 1 whitespace + negeer spaties voor of na inputstring
                $keywords = preg_split('/\s+/', $inputstring, -1, PREG_SPLIT_NO_EMPTY);

        		$questions = Question::where(function($q) use ($keywords)
                {
                    foreach ($keywords as $key => $keyword) 
                    {
                        $q->orWhere('answer', 'like', '%'.$keyword.'%')->orWhere('question', 'like', '%'.$keyword.'%');
                    }
                })->paginate(3);

                // https://github.com/laravel/framework/issues/858
                foreach (Input::except('page') as $input => $value)
                {
                    $questions->appends($input, $value);
                }

        		if($questions->count())
        		{
        			$response = 'Er werden ' . $questions->count() . ' resultaten gevonden voor "' . $inputstring . '":'; 
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

    	return view('public.faq', [
			'questions' => $questions,
			'response' => $response
		]);
    }
}
