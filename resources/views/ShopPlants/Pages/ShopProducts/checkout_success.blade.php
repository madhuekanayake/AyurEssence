<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Successful</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .checkout-success-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            padding: 20px;
        }

        .success-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        .success-icon {
            font-size: 80px;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .success-card h1 {
            color: #333;
            margin-bottom: 15px;
            font-size: 28px;
        }

        .success-card p {
            color: #666;
            font-size: 16px;
            margin-bottom: 25px;
        }

        .order-details {
            background-color: #f9f9f9;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 25px;
            text-align: left;
        }

        .order-details h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 18px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .order-info p {
            margin-bottom: 10px;
        }

        .action-buttons {
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 40px;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #4CAF50;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="checkout-success-container">
        <div class="success-card">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1>Order Successful!</h1>
            <p>Thank you for your purchase. Your order has been confirmed.</p>



            <div class="action-buttons">
                <a href="{{ route('orders.show') }}" class="btn btn-primary">OK</a>
            </div>
        </div>
    </div>
</body>
</html>
