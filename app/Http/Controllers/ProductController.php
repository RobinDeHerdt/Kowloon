<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use App\Productimage;
use App\Dimension;
use App\Category;
use App\Product;
use App\Hotitem;
use App\Color;
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
        $this->validate($request, [
            'name_nl'                       => 'required',
            'name_fr'                       => 'required',
            'price'                         => 'required|numeric',
            'description_nl'                => 'required',
            'technical_description_nl'      => 'required',
            'description_fr'                => 'required',
            'technical_description_fr'      => 'required',
            'category'                      => 'required',
            'image'                         => 'required',
            'imagedescription_nl'           => 'required',
            'imagedescription_fr'           => 'required',
        ]);

        $count = count($request->image);

        $product = new Product();
        $product->name_nl                   = $request->name_nl;
        $product->name_fr                   = $request->name_fr;
        $product->description_nl            = $request->description_nl;
        $product->description_fr            = $request->description_fr;
        $product->technical_description_nl  = $request->technical_description_nl;
        $product->technical_description_fr  = $request->technical_description_fr;
        $product->price                     = $request->price;
        $product->category_id               = $request->category;

        $product->save();

        for ($i = 0; $i < $count; $i++) { 
            $productimage                   = new Productimage(); 
            $path                           = $request->image[$i]->store('img/products', 'upload'); 
            $productimage->image_url        = basename($path);
            $productimage->description_nl   = $request->imagedescription_nl[$i];
            $productimage->description_fr   = $request->imagedescription_fr[$i];
            $productimage->product()->associate($product);
            $productimage->save();
        }

        for ($i = 0; $i < count($request->colors); $i++) { 
            $color          = new Color();
            $color->hex     = $request->colors[$i];
            $color->product()->associate($product);
            $color->save();
        }

        for ($i = 0; $i < count($request->dimensions); $i++) { 
            $dimension          = new Dimension();
            $dimension->body    = $request->dimensions[$i];
            $dimension->product()->associate($product);
            $dimension->save();
        }

        if($request->tags)
        {
            foreach ($request->tags as $key => $tag) 
            {
                $product->tags()->attach($tag);
            }
        }

        Session::flash('product_create_status', 'Product created successfully');

        return redirect()->action('ProductController@index');
    }

    public function edit($id) 
    {
        $tags           = Tag::all();
        $product        = Product::find($id);
        $categories     = Category::take(5)->get();
        $colors         = Color::where('product_id', $id)->get();
        $dimensions     = Dimension::where('product_id', $id)->get();

        return view('admin.editproduct', [
            'product'       => $product,
            'colors'        => $colors,
            'tags'          => $tags,
            'dimensions'    => $dimensions,
            'categories'    => $categories
        ]);
    }

    public function update(Request $request, $id) 
    {
        $this->validate($request, [
            'name_nl'                       => 'required',
            'name_fr'                       => 'required',
            'price'                         => 'required|numeric',
            'description_nl'                => 'required',
            'technical_description_nl'      => 'required',
            'description_fr'                => 'required',
            'technical_description_fr'      => 'required',
            'category'                      => 'required',
        ]);

        $count = count($request->image);

        $product = Product::find($id);
        $product->name_nl                   = $request->name_nl;
        $product->name_fr                   = $request->name_fr;
        $product->description_nl            = $request->description_nl;
        $product->description_fr            = $request->description_fr;
        $product->technical_description_nl  = $request->technical_description_nl;
        $product->technical_description_fr  = $request->technical_description_fr;
        $product->price                     = $request->price;
        $product->category_id               = $request->category;

        $product->save();

        $productimages = Productimage::where('product_id', $id);
        if($request->uploadedimages)
        {
            $productimages->whereNotIn('id', $request->uploadedimages)->delete();
        }
        else
        {
            // Als request->uploadedimages niet meegegeven wordt, verwijder alle images
            // Check of er images geupload worden 
            if($request->image)
            {
                foreach ($productimages->get() as $key => $img) {
                    $img->delete();
                }  
            }
            else
            {
                Session::flash('product_update_error', 'Can\'t do that! There has to be at least one image per product!');

                return back();
            }
        }
        
        for ($i = 0; $i < $count; $i++) { 
            $productimage = new Productimage(); 
            $path = $request->image[$i]->store('img/products', 'upload'); 
            $productimage->image_url        = basename($path);
            $productimage->description_nl   = $request->imagedescription_nl[$i];
            $productimage->description_fr   = $request->imagedescription_fr[$i];
            $productimage->product()->associate($product);
            $productimage->save();
        }

        $oldcolors = Color::where('product_id', $id)->get();

        foreach ($oldcolors as $key => $oldcolor) {
            $oldcolor->delete();
        }

        for ($i = 0; $i < count($request->colors); $i++) { 
            $color  = new Color();
            $color->hex = $request->colors[$i];
            $color->product()->associate($product);
            $color->save();
        }

        $oldimensions = Dimension::where('product_id', $id)->get();

        foreach ($oldimensions as $key => $oldimension) {
            $oldimension->delete();
        }

        for ($i = 0; $i < count($request->dimensions); $i++) { 
            $dimension          = new Dimension();
            $dimension->body    = $request->dimensions[$i];
            $dimension->product()->associate($product);
            $dimension->save();
        }

        if($request->tags)
        {
            $product->tags()->sync($request->tags);
        }
        else
        {
            $product->tags()->detach();
        }

        Session::flash('product_update_status', 'Product updated successfully');

        return redirect()->action('ProductController@index');
    }

    public function destroy($id)
    {
        $product    = Product::find($id);
        $hotitems   = Hotitem::where('product_id', $id)->get();

        if($hotitems->count())
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
                    Session::flash('product_delete_failed', 'You can not delete all products. Without products there are no hot items to display on the front page.');

                    return back();
                }  
            } 
        }

        $colors         = Color::where('product_id', $id)->get();

        if($colors->count())
        {
            foreach ($colors as $key => $color) {
                $color->delete();
            }
        }

         $dimensions    = Dimension::where('product_id', $id)->get();

        if($dimensions->count())
        {
            foreach ($dimensions as $key => $dimension) {
                $dimension->delete();
            }
        }

        foreach ($product->questions as $key => $question) {
            if($question->products()->count() === 1)
            {
                $question->delete();
            }
        }

        $product->questions()->detach();
        $product->tags()->detach();
        
        foreach ($product->productimages as $key => $image) {
            $image->delete();
        }

        $product->delete();
        Session::flash('product_delete_status', 'Product deleted successfully');

        return back();
    }
}