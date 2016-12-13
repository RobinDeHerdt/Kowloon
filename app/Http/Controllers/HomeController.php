<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotitem;
use App\Category;
use App\Carouselimage;

use Session;

class HomeController extends Controller
{
    public function index()
    {
    	$hotitems		= Hotitem::all();
    	$categories 	= Category::all();
    	$carouselimages = Carouselimage::all();

        return view('public.home', [
        	'hotitems' 			=> $hotitems,
        	'categories' 		=> $categories,
         	'carouselimages' 	=> $carouselimages
         ]);
    }

    public function update(Request $request)
    {
        //  DONT FORGET TO CLEAN THIS SHIT UP
        $hotitem1 = Hotitem::find(1);
        $hotitem2 = Hotitem::find(2);
        $hotitem3 = Hotitem::find(3);
        $hotitem4 = Hotitem::find(4);

        $hotitem1->product_id = $request->hotitem1;
        $hotitem2->product_id = $request->hotitem2;
        $hotitem3->product_id = $request->hotitem3;
        $hotitem4->product_id = $request->hotitem4;

        $hotitem1->save();
        $hotitem2->save();
        $hotitem3->save();
        $hotitem4->save();

        Session::flash('hotitems_update_status', 'Hot items succesvol bijgewerkt!');

        return back();
    }
}
