<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    //
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::orderBy('code')->get();
        $category = Category::query()->get();
        return view('product.index', compact('products','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        {
            $category = Category::orderBy('name')->get();
            return view('product.create',compact('category') );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
    		'code' => 'required|unique:product',
            'name' => 'required',
            'category_id' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
    	]);

        $imageName = time().'.'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $imageName);

        Product::create([
    		'code' => $request->code,
    		'name' => $request->name,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'price' => $request->price,
            'image' => './images/'.$imageName,
    	]);

        return redirect('/product');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::find($id);
        $category = Category::all();
        return view('product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
    		'code' => 'required',
            'name' => 'required',
            'category_id' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
    	]);

        $product = Product::find($id);

        if($request->file('image'))
        {
        $imageName = time().'.'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $imageName);
        $product->image = './images/'.$imageName;
        }
 

        $product->code = $request->code;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->update();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return redirect('/');
    }
}
