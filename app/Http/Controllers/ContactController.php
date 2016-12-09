<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class ContactController extends Controller
{
    public function index()
    {
    	// Moet nog aangepast worden!
    	$questions = Question::all();

    	return view('about', ['questions' => $questions]);
    }
}
