<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotitem;
use App\Category;
use App\Carouselimage;

class HomeController extends Controller
{
    public function index()
    {
    	$hotitems		= Hotitem::all();
    	$categories 	= Category::all();
    	$carouselimages = Carouselimage::all();

        return view('home', [
        	'hotitems' 			=> $hotitems,
        	'categories' 		=> $categories,
         	'carouselimages' 	=> $carouselimages
         ]);
    }
}
