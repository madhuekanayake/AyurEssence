<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class ShopPlantsOrderController extends Controller
{
    public function showOrders()
    {
        // Fetch all orders with customer and order items
        $orders = Order::with(['customer', 'orderItems.product'])->get();

        // Pass the orders to the view
        return view('AdminArea.Pages.Orders.index', compact('orders'));
    }

    public function DeleteOrder(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'id' => 'required|integer|exists:orders,id',
            ]);

            // Find the order by ID
            $order = Order::findOrFail($request->id);

            // Delete related order items
            OrderItem::where('order_id', $order->id)->delete();

            // Delete the order record
            $order->delete();

            // Return success response
            return back()->with('success', 'Order deleted successfully!');
        } catch (\Exception $e) {
            // Return error response
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
