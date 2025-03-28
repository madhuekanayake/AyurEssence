@extends('ShopPlants.Layout.main')
@section('ShopPlantsContainer')

<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('ShopPlants/img/bg-img/24.jpg') }}');">
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

<div class="site-main">
    <section class="single_product_details_area mb-50">
        <div class="produts-details--content mb-50">
            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @if ($SalePlant->images->isNotEmpty())
                                        @foreach ($SalePlant->images as $key => $image)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <a class="product-img" href="{{ asset('storage/' . $image->image) }}" title="{{ $SalePlant->plantname }}">
                                                    <img class="d-block w-100" src="{{ asset('storage/' . $image->image) }}" alt="{{ $SalePlant->plantname }}">
                                                </a>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="carousel-item active">
                                            <a class="product-img" href="{{ asset('PublicArea/images/products/default-image.png') }}" title="Default Product Image">
                                                <img class="d-block w-100" src="{{ asset('PublicArea/images/products/default-image.png') }}" alt="Default Product Image">
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <ol class="carousel-indicators">
                                    @if ($SalePlant->images->isNotEmpty())
                                        @foreach ($SalePlant->images as $key => $image)
                                            <li class="{{ $key == 0 ? 'active' : '' }}" data-target="#product_details_slider" data-slide-to="{{ $key }}" style="background-image: url({{ asset('storage/' . $image->image) }});">
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{ asset('PublicArea/images/products/default-image.png') }});">
                                        </li>
                                    @endif
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc">
                            <h4 class="title">{{ $SalePlant->plantname }}</h4>
                            <h4 class="price">Rs{{ $SalePlant->finalPrice }}</h4>
                            <div class="short_overview">
                                <p>{{ $SalePlant->description }}</p>
                            </div>

                            <div class="cart--area d-flex flex-wrap align-items-center">
                                <!-- Add to Cart Form -->
                                <form class="cart clearfix d-flex align-items-center" action="{{ route('cart.add', $SalePlant->id) }}" method="POST">
                                    @csrf
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="{{ $SalePlant->stockQuantity }}" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    </div>
                                    <button type="submit" name="addtocart" class="btn alazea-btn ml-15">Add to cart</button>
                                </form>
                                <!-- Wishlist & Compare -->
                                <div class="wishlist-compare d-flex flex-wrap align-items-center">
                                    <a href="#" class="wishlist-btn ml-15"><i class="icon_heart_alt"></i></a>
                                    <a href="#" class="compare-btn ml-15"><i class="arrow_left-right_alt"></i></a>
                                </div>
                            </div>

                            <div class="products--meta">
                                <p><span><strong>SKU:</strong></span> <span>{{ $SalePlant->id }}</span></p>
                                <p><span><strong>Category:</strong></span> <span>{{ $SalePlant->category->categoryName ?? 'Uncategorized' }}</span></p>
                                <p><span><strong>Original Price:</strong></span> <span>Rs{{ $SalePlant->price }}</span></p>
                                <p><span><strong>Discount:</strong></span> <span>{{ $SalePlant->discount }}%</span></p>
                                <p><span><strong>Stock:</strong></span> <span>{{ $SalePlant->stockQuantity }} available</span></p>

                                <p>
                                    <span>Share on:</span>
                                    <span>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_details_tab clearfix">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">Additional Information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Reviews</a>
                            </li>
                        </ul>
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="description">
                                <div class="description_area">
                                    <p>{{ $SalePlant->description }}</p>
                                    <p>{{ $SalePlant->extendedDescription ?? 'No extended description available.' }}</p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="addi-info">
                                <div class="additional_info_area">
                                    <p>Planting Instructions
                                        <br> <span>{{ $SalePlant->plantingInstructions ?? 'Information not available' }}</span></p>
                                    <p>Care Requirements
                                        <br> <span>{{ $SalePlant->careRequirements ?? 'Information not available' }}</span></p>
                                    <p>Size and Growth
                                        <br> <span>{{ $SalePlant->sizeAndGrowth ?? 'Information not available' }}</span></p>
                                    <p>Best Season
                                        <br> <span>{{ $SalePlant->bestSeason ?? 'Information not available' }}</span></p>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="reviews">
                                <div class="reviews_area">
                                    <!-- Reviews will go here -->
                                    <p>No reviews yet for this product.</p>
                                </div>

                                <div class="submit_a_review_area mt-50">
                                    <h4>Submit A Review</h4>
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group d-flex align-items-center">
                                                    <span class="mr-15">Your Ratings:</span>
                                                    <div class="stars">
                                                        <input type="radio" name="star" class="star-1" id="star-1">
                                                        <label class="star-1" for="star-1">1</label>
                                                        <input type="radio" name="star" class="star-2" id="star-2">
                                                        <label class="star-2" for="star-2">2</label>
                                                        <input type="radio" name="star" class="star-3" id="star-3">
                                                        <label class="star-3" for="star-3">3</label>
                                                        <input type="radio" name="star" class="star-4" id="star-4">
                                                        <label class="star-4" for="star-4">4</label>
                                                        <input type="radio" name="star" class="star-5" id="star-5">
                                                        <label class="star-5" for="star-5">5</label>
                                                        <span></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Nickname</label>
                                                    <input type="email" class="form-control" id="name" placeholder="Your Name">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="options">Reason for your rating</label>
                                                    <select class="form-control" id="options">
                                                          <option>Quality</option>
                                                          <option>Value</option>
                                                          <option>Design</option>
                                                          <option>Price</option>
                                                          <option>Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="comments">Comments</label>
                                                    <textarea class="form-control" id="comments" rows="5" data-max-length="150"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn alazea-btn">Submit Your Review</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="related-products-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Product Area -->
                @foreach ($SalePlants as $SalePlant)
                    <div class="col-12 col-sm-6 col-lg-3"> <!-- Changed to col-lg-3 for 4 items per row -->
                        <div class="single-product-area mb-50">
                            <!-- Product Image -->
                            <div class="product-img">
                                <a href="shop-details.html">
                                    @php
                                        // Find the primary image for the blog
                                        $primaryImage = $SalePlant->images->firstWhere('isPrimary', 1);
                                    @endphp

                                    @if ($primaryImage)
                                        <img class="img-fluid fixed-size"
                                            src="{{ asset('storage/' . $primaryImage->image) }}"
                                            alt="Primary Blog Image">
                                    @elseif ($SalePlant->images->isNotEmpty())
                                        <img class="img-fluid fixed-size"
                                            src="{{ asset('storage/' . $SalePlant->images->first()->image) }}"
                                            alt="SalePlant Image">
                                    @else
                                        <img class="img-fluid fixed-size"
                                            src="{{ asset('PublicArea/images/blogs/default-image.png') }}"
                                            alt="Default Image">
                                    @endif
                                </a>
                                <div class="product-meta d-flex">
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
                                <h6>${{ $SalePlant->finalPrice }}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .fixed-size {
            width: 250px; /* Adjust width as needed */
            height: 250px; /* Adjust height as needed */
            object-fit: cover; /* Ensures images are cropped to fit the dimensions */
        }
    </style>


@endsection

@push('css')

@endpush

@push('js')

@endpush
