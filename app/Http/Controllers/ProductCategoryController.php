<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info['productCategories'] = ProductCategory::all();
        $info['title'] = 'Product Category';
        $info['route'] = 'productscategories.';
        return view('productscategories.index', $info);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info['productCategories'] = ProductCategory::all();
        $info['title'] = 'Product Category';
        $info['route'] = 'productscategories.';
        return view('productscategories.create', $info);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $productCategory = new ProductCategory;
        $productCategory->name = $request->input('name');
        $productCategory->save();

        return redirect()->route('productscategories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        return view('productscategories.show', compact('productCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productCategory = ProductCategory::findOrFail($id);
        return view('productscategories.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $productCategory->name = $request->input('name');
        $productCategory->save();

        return redirect()->route('productscategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */

        public function destroy($id)
{
    $productCategory = ProductCategory::find($id); 

    if (!$productCategory) {
        return redirect()->route('productscategories.index')->with('error', 'Product category not found');
    }

    $productCategory->delete(); // Delete the product 

    return redirect()->route('productscategories.index')->with('success', 'Product category deleted successfully');
}
}
