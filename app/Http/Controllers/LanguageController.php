<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

class LanguageController extends Controller
{
    public function index() 
    {
    	return view('chooselanguage');
    }
}
