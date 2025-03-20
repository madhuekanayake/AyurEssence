@extends('ShopPlants.Layout.main')
@section('ShopPlantsContainer')

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('ShopPlants/img/bg-img/24.jpg') }}');">
        <h2>Your Shopping Cart</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Cart Area Start ##### -->
<div class="cart-area section-padding-0-100 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Products</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cart as $id => $item)
                                @php
                                    $subtotal = $item['price'] * $item['quantity'];
                                    $total += $subtotal;
                                @endphp
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="#"><img src="{{ $item['image'] }}" alt="Product"></a>
                                        <h5>{{ $item['name'] }}</h5>
                                    </td>
                                    <td class="qty">
                                        <div class="quantity">
                                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                                @csrf
                                                <span class="qty-minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown(); this.parentNode.submit();">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </span>
                                                <input type="number" name="quantity" class="qty-text" step="1" min="1" value="{{ $item['quantity'] }}">
                                                <span class="qty-plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp(); this.parentNode.submit();">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </span>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="price"><span>${{ number_format($item['price'], 2) }}</span></td>
                                    <td class="total_price"><span>${{ number_format($subtotal, 2) }}</span></td>
                                    <td class="action">
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="remove-btn"><i class="icon_close"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Coupon Discount -->
            <div class="col-12 col-lg-6">
                <div class="coupon-discount mt-70">
                    <h5>COUPON DISCOUNT</h5>
                    <p>Enter a valid coupon code to get a discount on your order.</p>
                    <form action="#" method="post">
                        <input type="text" name="coupon-code" placeholder="Enter your coupon code">
                        <button type="submit">APPLY COUPON</button>
                    </form>
                </div>
            </div>

            <!-- Cart Totals -->
            <div class="col-12 col-lg-6">
                <div class="cart-totals-area mt-70">
                    <h5 class="title--">Cart Total</h5>
                    <div class="subtotal d-flex justify-content-between">
                        <h5>Subtotal</h5>
                        <h5>${{ number_format($total, 2) }}</h5>
                    </div>
                    <div class="shipping d-flex justify-content-between">
                        <h5>Shipping</h5>
                        <h5>Free</h5>
                    </div>
                    <div class="total d-flex justify-content-between">
                        <h5>Total</h5>
                        <h5>${{ number_format($total, 2) }}</h5>
                    </div>
                    <div class="checkout-btn">
                        <a href="{{ route('checkout', ['total' => $total]) }}" class="btn alazea-btn w-100">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ##### Cart Area End ##### -->



@endsection