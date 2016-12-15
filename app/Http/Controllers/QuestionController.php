<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function index() 
    {
        return view('admin.questions');
    }

    public function show()
    {
        return view('admin.question');
    }
}
