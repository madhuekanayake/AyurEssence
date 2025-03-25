@extends('AdminArea.Layout.main')

@section('Admincontainer')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h3 class="page-title">All Orders</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <!-- Optional: Add a button here if needed -->
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Order Records</h4>
                @if($orders->isEmpty())
                    <p class="text-center text-muted">No orders found.</p>
                @else
                    @foreach($orders as $order)
                        <div class="card mb-4 shadow-sm p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="text-primary">Order ID: {{ $order->id }}</h5>
                                <button type="button" class="btn btn-link text-danger p-0" onclick="confirmDelete('{{ $order->id }}')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                            <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                            <p><strong>Payment Status:</strong> <span class="badge {{ $order->payment_status === 'Paid' ? 'badge-success' : 'badge-danger' }}">{{ $order->payment_status }}</span></p>
                            <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>

                            <div class="border-top pt-2">
                                <h6 class="text-secondary">Customer Details:</h6>
                                @if($order->customer)
                                    <p><strong>Name:</strong> {{ $order->customer->first_name }} {{ $order->customer->last_name }}</p>
                                    <p><strong>Address:</strong> {{ $order->customer->address_line1 }}, {{ $order->customer->address_line2 }}</p>
                                    <p><strong>Email:</strong> {{ $order->customer->email }}</p>
                                @else
                                    <p class="text-muted">Customer details not available.</p>
                                @endif
                            </div>

                            <div class="border-top pt-2">
                                <h6 class="text-secondary">Order Items:</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Product Name</th>
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

</div>
@endsection



{{-- Delete Modal --}}
<div class="modal fade" id="deleteOrderModal" tabindex="-1" role="dialog" aria-labelledby="deleteOrderLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="max-height: 300px;">
            <div class="modal-header" style="padding: 10px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" style="padding: 15px;">
                <div class="mb-2">
                    <img src="{{ asset('AdminArea/images/bin.gif') }}" alt="Delete Confirmation" width="80">
                </div>
                <h5>Are you sure you want to delete this order?</h5>
            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteOrderForm" action="{{ route('Order.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="orderId">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i> Delete</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>



@push('js')
<script>
    function confirmDelete(orderId) {
        // Set the order ID in the hidden input field of the delete modal
        document.getElementById('orderId').value = orderId;

        // Show the delete modal
        $('#deleteOrderModal').modal('show');
    }
</script>
@endpush
