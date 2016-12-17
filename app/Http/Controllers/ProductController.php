<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Productimage;
use App\Category;
use App\Product;
use App\Hotitem;
use App\Tag;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);

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
        // Dont get 'other' category
        $categories = Category::take(5)->get();
        $tags       = Tag::all();

        return view('admin.createproduct', [
            'tags'          => $tags,
            'categories'    => $categories
        ]);
    }

    public function store(Request $request)
    {
        $count = count($request->image);

        $product = new Product();
        $product->name                  = $request->name;
        $product->price                 = $request->price;
        $product->description           = $request->description;
        $product->technical_description = $request->technical_description;
        $product->category_id           = $request->category;

        $product->save();

        for ($i = 0; $i < $count; $i++) { 
            $productimage = new Productimage(); 
            $path = $request->image[$i]->store('img', 'upload'); 
            $productimage->image_url    = basename($path);
            $productimage->description  = $request->imagedescription[$i];
            $productimage->product()->associate($product);
            $productimage->save();
        }

        foreach ($request->tags as $key => $tag) 
        {
            $product->tags()->attach($tag);
        }

        Session::flash('product_create_status', 'Product created successfully');

        return redirect()->action('ProductController@index');
    }

    public function destroy($id)
    {
        $product    = Product::find($id);
        $hotitems   = Hotitem::where('product_id', $id)->get();

        if(count($hotitems))
        {
            foreach ($hotitems as $key => $hotitem) 
            {
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
        $product->questions()->detach();

        foreach ($product->productimages as $key => $image) {
            $image->delete();
        }

        $product->delete();

        return back();
    }
}
