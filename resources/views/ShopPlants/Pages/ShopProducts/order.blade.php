@extends('ShopPlants.Layout.main')
@section('ShopPlantsContainer')

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('ShopPlants/img/bg-img/24.jpg') }}');">
        <h2>Your Orders</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<div class="orders-area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Order History</h2>
                    <p>Track all your plant purchases in one place</p>
                </div>

                @if($orders->isEmpty())
                    <div class="empty-state text-center py-5">
                        <img src="{{ asset('ShopPlants/img/icons/empty-cart.svg') }}" alt="No Orders" class="mb-4" style="max-width: 120px;">
                        <h3>You have no orders yet</h3>
                        <p class="text-muted">Browse our collection and find the perfect plants for your space</p>
                        <a href="{{ route('shop') }}" class="btn alazea-btn mt-3">Shop Now</a>
                    </div>
                @else
                    <div class="orders-container">
                        @foreach($orders as $order)
                            <div class="order-card mb-4">
                                <div class="order-header d-flex justify-content-between align-items-center bg-light p-3 rounded-top">
                                    <div>
                                        <span class="badge badge-success p-2 mr-2">{{ $order->payment_status }}</span>
                                        <small class="text-muted">Ordered on {{ $order->created_at->format('M d, Y') }}</small>
                                    </div>
                                    <div class="order-id">
                                        <span class="text-muted">Order #{{ $order->id }}</span>
                                    </div>
                                </div>

                                <div class="order-body p-4 border rounded-bottom">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="customer-info">
                                                <h5><i class="fa fa-user-circle mr-2"></i>Customer ID: {{ $order->customer_id }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <div class="order-total">
                                                <h5 class="mb-0">Total: <span class="text-success">${{ number_format($order->total_amount, 2) }}</span></h5>
                                                <small class="text-muted">{{ count($order->orderItems) }} item(s)</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="order-items">
                                        <h6 class="text-uppercase mb-3 border-bottom pb-2"><i class="fa fa-leaf mr-2"></i>Order Items</h6>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Product</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-right">Price</th>
                                                        <th class="text-right">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order->orderItems as $item)
                                                        <tr>
                                                            <td>
                                                                <div class="d-flex align-items-center">

                                                                    <div class="product-info">
                                                                        <h6 class="mb-0">{{ $item->product->plantname ?? 'N/A' }}</h6>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">{{ $item->quantity }}</td>
                                                            <td class="text-right">${{ number_format($item->price, 2) }}</td>
                                                            <td class="text-right"><strong>${{ number_format($item->quantity * $item->price, 2) }}</strong></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="order-actions text-right mt-3">

                                        <a href="{{ route('orders.receipt', $order->id) }}" class="btn btn-sm btn-outline-secondary">Print Receipt</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
