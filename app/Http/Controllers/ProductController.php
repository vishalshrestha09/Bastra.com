<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
        {
            $info['product'] = Product::all();
            $info['title'] = 'Product';
            $info['route'] = 'products.';
            return view('products.index',$info);
        }
    
       
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info['product'] = Product::all();
        $info['title'] = 'Product';
        $info['route'] = 'products.';
        $info['product_categories'] = ProductCategory::all();
        return view('products.create', $info);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|integer|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'product_category_id' => 'required|exists:product_categories,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->product_category_id = $request->input('product_category_id');
        $product->save();

        // dd($request->file('img'));
        if($request->img){
            $product
            ->addMediaFromRequest('img')
            ->toMediaCollection();
        }

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $info['item'] = Product::findOrFail($id);
        $info['title'] = 'Product';
        $info['route'] = 'products.';
        $info['product_categories'] = ProductCategory::all();
        return view('products.edit', $info);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
