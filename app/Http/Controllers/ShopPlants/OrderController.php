<?php

namespace App\Http\Controllers\ShopPlants;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function showOrders()
    {
        // Check if the customer is logged in
        if (Session::has('customer_id')) {
            $customerId = Session::get('customer_id');

            // Fetch orders for the logged-in customer only
            $orders = Order::where('customer_id', $customerId)
                ->with('orderItems.product') // Eager load order items and their associated product
                ->get();

            // Pass the orders to the view
            return view('ShopPlants.Pages.ShopProducts.order', compact('orders'));
        } else {
            // Redirect to login if the customer is not logged in
            return redirect()->route('auth.index')->with('error', 'Please login to view your orders.');
        }
    }

    public function downloadReceipt($orderId)
    {
        // Fetch the order with its items and product details
        $order = Order::with('orderItems.product')->findOrFail($orderId);

        // Generate the PDF
        $pdf = Pdf::loadView('ShopPlants.Pages.ShopProducts.receipt', compact('order'));

        // Download the PDF
        return $pdf->download('receipt-order-' . $orderId . '.pdf');
    }
}
