<?php

namespace App\Http\Controllers\ShopPlants;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\SalePlants;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = SalePlants::findOrFail($id);
        $cart = Session::get('cart', []);

        // Check if the product already exists in the cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id] = [
                'id' => $product->salePlantId,
                'name' => $product->plantname,
                'price' => $product->finalPrice,
                'quantity' => $request->quantity,
                'image' => $product->images->first() ? asset('storage/' . $product->images->first()->image) : asset('PublicArea/images/products/default-image.png'),
            ];
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'Product added to cart successfully!');
    }

    // Show the cart
    public function showCart()
    {
        $cart = Session::get('cart', []);
        return view('ShopPlants.Pages.ShopProducts.cart', compact('cart'));
    }

    // Remove a product from the cart
    public function removeFromCart($id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Product removed from cart successfully!');
    }

    // Update cart item quantity
    public function updateCart(Request $request, $id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            Session::put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('success', 'Cart updated successfully!');
    }
}
