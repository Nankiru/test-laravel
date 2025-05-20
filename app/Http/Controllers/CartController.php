<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // public function addToCart(Request $request, $id)
    // {
    //     $product = Product::find($id);

    //     if (!$product) {
    //         abort(404, 'Product not found!');
    //     }

    //     // Get quantity from request, default to 1
    //     $quantity = (int) $request->input('quantity', 1);

    //     // Ensure quantity is at least 1
    //     $quantity = max(1, $quantity);

    //     $cart = session()->get('cart', []);

    //     if (isset($cart[$id])) {
    //         $cart[$id]['quantity'] += $quantity; // Add to existing quantity
    //     } else {
    //         $cart[$id] = [
    //             'name' => $product->name,
    //             'price' => $product->price,
    //             'quantity' => $quantity,
    //             'image' => $product->image,
    //             'storage' => $product->storage,
    //             'ram' => $product->ram,
    //         ];
    //     }

    //     session()->put('cart', $cart);

    //     return redirect()->back()->with('success', 'Added to cart successfully!');
    // }

    public function addToCart(Request $request, $id)
    {
        // 🔐 Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('signin')->with('error', 'Please log in to add items to your cart.');
        }

        // 🛒 Find the product
        $product = Product::find($id);

        if (!$product) {
            abort(404, 'Product not found!');
        }

        // ✅ Get quantity or default to 1, and ensure it's at least 1
        $quantity = max(1, (int) $request->input('quantity', 1));

        // 🛍️ Get existing cart or create a new one
        $cart = session()->get('cart', []);

        // 📦 Add or update product in the cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'name'     => $product->name,
                'price'    => $product->price,
                'quantity' => $quantity,
                'image'    => $product->image,
                'storage'  => $product->storage,
                'ram'      => $product->ram,
            ];
        }

        // 💾 Save cart back to session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Added to cart successfully!');
    }




    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Item removed from cart.');
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
