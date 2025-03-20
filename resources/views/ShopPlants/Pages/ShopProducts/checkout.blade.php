@extends('ShopPlants.Layout.main')
@section('ShopPlantsContainer')

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('ShopPlants/img/bg-img/24.jpg') }}');">
        <h2>Checkout</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area mb-100">
    <div class="container">
        <div class="row justify-content-between">
            <!-- Billing Details -->
            <div class="col-12 col-lg-7">
                <div class="checkout_details_area clearfix">
                    <h5>Billing Details</h5>
                    <form action="{{ route('place.order') }}" method="POST" id="payment-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="first_name">First Name *</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="last_name">Last Name *</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="phone">Phone Number *</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="address">Address *</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="city">City *</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="state">State *</label>
                                <input type="text" class="form-control" id="state" name="state" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="postcode">Postcode *</label>
                                <input type="text" class="form-control" id="postcode" name="postcode" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="country">Country *</label>
                                <select class="form-control" id="country" name="country" required>
                                    <option value="US">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="CA">Canada</option>
                                    <option value="AU">Australia</option>
                                    <!-- Add more countries as needed -->
                                </select>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="order_notes">Order Notes</label>
                                <textarea class="form-control" id="order_notes" name="order_notes" rows="5" placeholder="Notes about your order, e.g. special delivery instructions."></textarea>
                            </div>
                        </div>

                        <!-- Stripe Payment Form -->
                        <form action="{{ route('place.order') }}" method="POST" id="payment-form">
                            @csrf
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <div id="card-errors" role="alert"></div>
                            <button>Submit Payment</button>
                        </form>

                        <!-- Submit Button -->
                        <button class="btn alazea-btn w-100 mt-30">Place Order</button>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-12 col-lg-4">
                <div class="checkout-content">
                    <h5 class="title--">Your Order</h5>
                    {{-- <div class="products">
                        @foreach ($cart as $id => $item)
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span>{{ $item['name'] }} (x{{ $item['quantity'] }})</span>
                                <span>${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                            </div>
                        @endforeach
                    </div> --}}
                    <div class="subtotal d-flex justify-content-between align-items-center">
                        <h5>Subtotal</h5>
                        <h5>${{ number_format($total, 2) }}</h5>
                    </div>
                    <div class="shipping d-flex justify-content-between align-items-center">
                        <h5>Shipping</h5>
                        <h5>Free</h5>
                    </div>
                    <div class="order-total d-flex justify-content-between align-items-center">
                        <h5>Order Total</h5>
                        <h5>${{ number_format($total, 2) }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Checkout Area End ##### -->

<!-- Include Stripe.js -->

<script>
    // Initialize Stripe with your publishable key
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();

    // Custom styling for the Stripe Element
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element
    var card = elements.create('card', {style: style});

    // Add the card Element to the form
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // Create a payment token
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Show errors to the customer
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Insert the token ID into the form so it gets submitted to the server
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', result.token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        });
    });
</script>

@endsection