@extends('AdminArea.Layout.main')
@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Dashboard</h3>
        </div>
        <div class="row grid-margin">
            <div class="col-12">
                <div class="card card-statistics">
                    <div class="card-body">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <div class="statistics-item">
                                <p><i class="icon-sm fas fa-user-md mr-2"></i>Total Doctors</p>
                                <h2>{{ $totalDoctors }}</h2>
                            </div>
                            <div class="statistics-item">
                                <p><i class="icon-sm fas fa-users mr-2"></i>Total Customers</p>
                                <h2>{{ $totalCustomers }}</h2>
                            </div>
                            <div class="statistics-item">
                                <p><i class="icon-sm fas fa-leaf mr-2"></i>Total Plants</p>
                                <h2>{{ $totalPlants }}</h2>
                            </div>
                            <div class="statistics-item">
                                <p><i class="icon-sm fas fa-seedling mr-2"></i>Total Ayurvedic Hospital</p>
                                <h2>{{ $totalhospitals }}</h2>
                            </div>
                            <div class="statistics-item">
                                <p><i class="icon-sm fas fa-pills mr-2"></i>Total Pharmacy</p>
                                <h2>{{ $totalpharmacy }}</h2>
                            </div>
                            <div class="statistics-item">
                                <p><i class="icon-sm fas fa-shopping-cart mr-2"></i>Total Sales</p>
                                <h2>{{ $totalSales }}</h2>
                            </div>
                            <div class="statistics-item">
                                <p><i class="icon-sm fas fa-money-bill-alt mr-2"></i>Total Income</p>
                                <h2>Rs{{ number_format($totalIncome, 2) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-shopping-cart"></i>Orders</h4>
                        <canvas id="orders-chart"></canvas>
                        <div id="orders-chart-legend" class="orders-chart-legend"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-chart-line"></i>Sales</h4>
                        <h2 class="mb-5">{{ $totalSales }} <span class="text-muted h4 font-weight-normal">Sales</span></h2>
                        <canvas id="sales-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title"><i class="fas fa-chart-pie"></i>Sales status</h4>
                        <div class="flex-grow-1 d-flex flex-column justify-content-between">
                            <canvas id="sales-status-chart" class="mt-3"></canvas>
                            <div class="pt-4">
                                <div id="sales-status-chart-legend" class="sales-status-chart-legend"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title"><i class="fas fa-tachometer-alt"></i>Monthly Sales</h4>
                        <p class="card-description">Monthly sales for the past 6 months</p>
                        <div class="flex-grow-1 d-flex flex-column justify-content-between">
                            <canvas id="monthly-sales-chart" class="mt-3 mb-3 mb-md-0"></canvas>
                            <div id="monthly-sales-chart-legend" class="daily-sales-chart-legend pt-4 border-top"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-chart-bar"></i>Top Products</h4>
                        <canvas id="top-products-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Latest Orders</h4>
                        @if($latestOrders->isEmpty())
                            <p class="text-center text-muted">No orders found.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Total Amount</th>
                                            <th>Payment Status</th>
                                            <th>Order Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($latestOrders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td>{{ $order->customer->first_name ?? 'N/A' }} {{ $order->customer->last_name ?? '' }}</td>
                                                <td>Rs{{ number_format($order->total_amount, 2) }}</td>
                                                <td>
                                                    <span class="badge {{ $order->payment_status === 'Paid' ? 'badge-success' : 'badge-danger' }}">
                                                        {{ $order->payment_status }}
                                                    </span>
                                                </td>
                                                <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                                                <td><a class="nav-link" href="{{ route('orderManagement.show') }}">View</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Monthly Sales Chart
        var salesChartCanvas = document.getElementById('monthly-sales-chart').getContext('2d');
        var salesChartData = @json($salesChartData);

        var labels = salesChartData.map(item => item.month);
        var data = salesChartData.map(item => item.amount);

        var salesChart = new Chart(salesChartCanvas, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monthly Sales',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Top Products Chart
        var topProductsCanvas = document.getElementById('top-products-chart').getContext('2d');
        var topProductsData = @json($topProducts);

        var topProductsLabels = topProductsData.map(item => item.product_name);
        var topProductsSales = topProductsData.map(item => item.total_sales);

        var topProductsChart = new Chart(topProductsCanvas, {
            type: 'bar',
            data: {
                labels: topProductsLabels,
                datasets: [{
                    label: 'Sales',
                    data: topProductsSales,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endpush
