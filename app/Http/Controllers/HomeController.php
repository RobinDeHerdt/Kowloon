<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Carouselimage;

class HomeController extends Controller
{
    public function index()
    {
    	$categories 	= Category::all();
    	$carouselimages = Carouselimage::all();

        return view('home', [
        	"categories" 		=> $categories,
         	"carouselimages" 	=> $carouselimages
         ]);
    }
}
