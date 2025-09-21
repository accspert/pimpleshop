<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the shopping cart.
     */
    public function index()
    {
        // Retrieve the cart from the session. If it doesn't exist, use an empty array.
        $cart = session()->get('cart', []);
        
        // Pass the cart data to the cart view.
        return view('cart.index', compact('cart'));
    }

    /**
     * Add a product to the shopping cart.
     */
    public function add(Request $request)
    {
        // Find the product by its ID. If not found, redirect back.
        $product = Product::findOrFail($request->product_id);
        
        // Get the current cart from the session.
        $cart = session()->get('cart', []);
        
        $quantity = $request->quantity ?? 1;

        // Check if the product is already in the cart.
        if (isset($cart[$product->id])) {
            // If it exists, increment the quantity.
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            // If it doesn't exist, add it to the cart.
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "description" => $product->description
            ];
        }

        // Store the updated cart back in the session.
        session()->put('cart', $cart);

        // Redirect with a success message.
        return redirect()->back()->with('success', 'Produkt in den Warenkorb gelegt!');
    }

    /**
     * Remove a product from the shopping cart.
     */
    public function remove(Request $request)
    {
        // Check if the product ID exists in the session cart.
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                // Remove the item from the array.
                unset($cart[$request->id]);
                // Store the updated cart back in the session.
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Produkt wurde entfernt!');
        }
        return redirect()->back();
    }
}