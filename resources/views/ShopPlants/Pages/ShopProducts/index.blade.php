@extends('ShopPlants.Layout.main')
@section('ShopPlantsContainer')
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center"
            style="background-image: url('{{ asset('ShopPlants/img/bg-img/24.jpg') }}');">
            <h2>Shop</h2>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('ShopPlants.index') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    <section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Shop Sorting Data -->
                <div class="col-12">
                    <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Shop Page Count -->
                        <div class="shop-page-count">
                            <p>Showing 1–9 of 72 results</p>
                        </div>
                        <!-- Search by Terms -->
                        <div class="search_by_terms">
                            <form action="#" method="post" class="form-inline">
                                <select class="custom-select widget-title">
                                    <option selected>Short by Popularity</option>
                                    <option value="1">Short by Newest</option>
                                    <option value="2">Short by Sales</option>
                                    <option value="3">Short by Ratings</option>
                                </select>
                                <select class="custom-select widget-title">
                                    <option selected>Show: 9</option>
                                    <option value="1">12</option>
                                    <option value="2">18</option>
                                    <option value="3">24</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar Area -->

                <!-- All Products Area -->
                <div class="col-12">
                    <div class="shop-products-area">
                        <div class="row">
                            @foreach ($SalePlants as $SalePlant)
                                <div class="col-12 col-md-6 col-lg-3"> <!-- 4 items per row on large screens -->
                                    <div class="single-product-area mb-50">
                                        <!-- Product Image -->
                                        <div class="product-img">
                                            <a href="{{ route('ShopProduct.details', $SalePlant->id) }}">
                                                @php
                                                    // Find the primary image for the blog
                                                    $primaryImage = $SalePlant->images->firstWhere('isPrimary', 1);
                                                @endphp

                                                @if ($primaryImage)
                                                    <img width="100%" height="250" class="img-fluid"
                                                        src="{{ asset('storage/' . $primaryImage->image) }}"
                                                        alt="Primary Blog Image">
                                                @elseif ($SalePlant->images->isNotEmpty())
                                                    <img width="100%" height="250" class="img-fluid"
                                                        src="{{ asset('storage/' . $SalePlant->images->first()->image) }}"
                                                        alt="SalePlant Image">
                                                @else
                                                    <img width="100%" height="250" class="img-fluid"
                                                        src="{{ asset('PublicArea/images/blogs/default-image.png') }}"
                                                        alt="Default Image">
                                                @endif
                                            </a>
                                            <div class="product-meta d-flex justify-content-center">
                                                <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                                                <a href="#" class="add-to-cart-btn">Add to cart</a>
                                                <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                                            </div>
                                        </div>
                                        <!-- Product Info -->
                                        <div class="product-info mt-15 text-center">
                                            <a href="{{ route('ShopProduct.details', $SalePlant->id) }}">
                                                <p>{{ $SalePlant->plantname }}</p>
                                            </a>
                                            <h6>Rs{{ $SalePlant->finalPrice }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
    </section>
    <!-- ##### Shop Area End ##### -->
@endsection
