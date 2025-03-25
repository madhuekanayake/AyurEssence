<?php

namespace App\Http\Controllers\ShopPlants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PayController extends Controller
{
    public function checkout(Request $request)
    {
        $total = $request->query('total');
        $userEmail = session('customer_email');
        $userId = session('customer_id');

        if (!$userId || !$userEmail) {
            return redirect()->route('auth.index')->with('error', 'Please log in to complete your order.');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Total Cart Value',
                    ],
                    'unit_amount' => $total * 100, // Amount in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);

        return redirect($session->url);
    }


    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        $userEmail = session('customer_email');
        $userId = session('customer_id');
        $cart = session('cart', []);

        // Check if both customer_id and customer_email are available
        if (!$userId || !$userEmail) {
            return redirect()->route('auth.index')->with('error', 'Please log in to complete your order.');
        }

        // Save order details to the database
        $order = Order::create([
            'customer_id' => $userId, // Ensure this is not null
            'customer_email' => $userEmail,
            'total_amount' => array_sum(array_map(function($item) {
                return $item['price'] * $item['quantity'];
            }, $cart)),
            'payment_status' => 'paid',
            'session_id' => $sessionId,
        ]);

        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Clear the cart
        session()->forget('cart');

        return view('ShopPlants.Pages.ShopProducts.checkout_success', compact('order'));
    }


    public function cancel()
    {
        return view('ShopPlants.Pages.ShopProducts.checkout_cancel');
    }
}
