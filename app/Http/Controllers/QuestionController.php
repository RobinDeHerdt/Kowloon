<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function index(Request $request)
    {	
    	$questions 	= null;
    	$response	= null;

    	if($request->query('query'))
    	{
    		$inputstring = strip_tags($request->query('query'));

            // Check of input whitespace is
            if (!ctype_space($inputstring))
            {
        		$keywords = explode(' ',$inputstring);

        		$questions = Question::where(function($q) use ($keywords)
                {
                    foreach ($keywords as $key => $keyword) 
                    {
                        $q->orWhere('body', 'like', '%'.$keyword.'%')->orWhere('title', 'like', '%'.$keyword.'%');
                    }
                })->get();
            
            
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
