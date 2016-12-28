<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Question;
use LaravelLocalization;


class FaqController extends Controller
{
    public function index(Request $request)
    {	
    	$questions     = null;
    	$response	   = null;
        $inputstring   = null;

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
                        $q->orWhere('question_'.LaravelLocalization::getCurrentLocale(), 'like', '%'.$keyword.'%')
                          ->orWhere('answer_'.LaravelLocalization::getCurrentLocale(), 'like', '%'.$keyword.'%');
                    }
                })->paginate(3);

                // https://github.com/laravel/framework/issues/858
                foreach (Input::except('page') as $input => $value)
                {
                    $questions->appends($input, $value);
                }
            }
            else
            {
                $response = 'Dit is geen goede zoekopdracht. Probeer nog een keer.';
            }
    	}

    	return view('public.faq', [
			'questions'      => $questions,
			'response'       => $response, 
            'inputstring'    => $inputstring
		]);
    }
}
