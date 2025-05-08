<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
{
    $product = Product::find($id);

    if ($product) {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,  // ensure correct spelling
                'storage' => $product->storage,
                'ram' => $product->ram,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Added to cart successfully!');
    }

    abort(404, 'Product not found!');
}




    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return response()->json(['message' => 'Item removed from cart']);
    }

    public function remove($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false]);
}

public function showCart(Request $request)
    {
        $cart = session('cart', []); // Get the cart from the session

        // Check if sort query parameter exists
        if ($request->has('sort')) {
            $sortOption = $request->get('sort');

            // Sorting based on price
            if ($sortOption === 'price-asc') {
                uasort($cart, function ($a, $b) {
                    return $a['price'] <=> $b['price']; // Ascending price order
                });
            } elseif ($sortOption === 'price-desc') {
                uasort($cart, function ($a, $b) {
                    return $b['price'] <=> $a['price']; // Descending price order
                });
            }
        }

        return view('cart.index', compact('cart')); // Return the view with the cart data
    }

}
