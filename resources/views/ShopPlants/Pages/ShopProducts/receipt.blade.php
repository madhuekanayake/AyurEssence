<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { margin: 0; }
        .order-details { margin-bottom: 20px; }
        .order-details h2 { margin: 0 0 10px; }
        .order-items { width: 100%; border-collapse: collapse; }
        .order-items th, .order-items td { border: 1px solid #000; padding: 8px; text-align: left; }
        .order-items th { background-color: #f2f2f2; }
        .total { text-align: right; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Order Receipt</h1>
        <p>Order ID: {{ $order->id }}</p>
        <p>Date: {{ $order->created_at->format('M d, Y') }}</p>
    </div>

    <div class="order-details">
        <h2>Customer Details</h2>
        <p>Customer ID: {{ $order->customer_id }}</p>
    </div>

    <table class="order-items">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->plantname ?? 'N/A' }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        <h3>Total Amount: ${{ number_format($order->total_amount, 2) }}</h3>
    </div>
</body>
</html>
