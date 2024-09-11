<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
         $category = Category::latest()->get();

         return view('category.index', compact('category'));
        
    }

    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
    	]);

        $category = Category::create($request->all());

        return redirect('/category');

    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::find($id);

        return view('category.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
    	]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->update();
        
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/category');
    }
}
