<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Add this line to use the Product model
use App\Models\Cart; // Add this line to use the Cart model

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->user()->id)
            ->with('product.category')
            ->get();

        return view('carts.index', compact('cartItems'));
    }

    
public function create()
{
    $products = Product::all(); 
    return view('carts.create', compact('products'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); 

        // Find the product in the database.
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        
        $existingCartItem = Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $productId)
            ->first();

        if ($existingCartItem) {
            // If the product is already in the cart, update its quantity.
            $existingCartItem->update(['quantity' => $existingCartItem->quantity + $quantity]);
        } else {
            // If the product is not in the cart, add it as a new cart item.
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->route('carts.index')->with('success', 'Product added to cart.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cartItem = Cart::findOrFail($id);

        return view('carts.show', compact('cartItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cartItem = Cart::findOrFail($id);

        return view('carts.edit', compact('cartItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cartItem = Cart::findOrFail($id);

        // Validate the input data (e.g., quantity) if necessary.
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        // Update the quantity of the cart item.
        $cartItem->update(['quantity' => $request->input('quantity')]);

        return redirect()->route('carts.index')->with('success', 'Cart item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('carts.index')->with('success', 'Cart item removed successfully.');
    }
}
