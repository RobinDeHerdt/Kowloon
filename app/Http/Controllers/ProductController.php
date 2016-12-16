<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Hotitem;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(5);

        return view('admin.products', [
        	'products' => $products
        ]);
    }

    public function show($id)
    {
    	$product = Product::find($id);

        return view('admin.product', [
        	'product' => $product
        ]);
    }

    public function create()
    {
        return view('admin.createproduct');
    }

    public function destroy($id)
    {
        $product    = Product::find($id);
        $hotitems   = Hotitem::where('product_id', $id)->get();

        if(count($hotitems))
        {
            foreach ($hotitems as $key => $hotitem) {
                $firstProduct           = Product::where('id','!=', $id)->first();
                if($firstProduct)
                {
                    $hotitem->product_id    = $firstProduct->id;
                    $hotitem->save();
                }
                else
                {
                    dd('Mag niet');
                }  
            } 
        }

        $product->tags()->detach();

        foreach ($product->productimages as $key => $image) {
            $image->delete();
        }

        foreach ($product->questions as $key => $question) {
            $question->delete();
        }

        $product->delete();

        return back();
    }
}
