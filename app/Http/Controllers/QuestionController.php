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
    		$keywords = explode(' ',$inputstring);

    		foreach ($keywords as $key => $keyword) {
    			$query = Question::where('title', 'like', '%'.$keyword.'%')->orWhere('body', 'like', '%'.$keyword.'%');
    		}

    		$questions = $query->get();

    		if($questions->count())
    		{
    			$response = 'Er werden ' . $questions->count() . ' resultaten gevonden voor "' . $inputstring . '":'; 
    		}
    		else
    		{
    			$response = 'Er werden geen resultaten gevonden voor "' . $inputstring . '"'; 
    		}
    	}

    	return view('public.faq', [
			'questions' => $questions,
			'response' => $response
		]);
    }
}
