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
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<div class="site-main">
    <section class="prt-row product-details-section clearfix">
        <div class="container">
            <div class="row">
                <!-- Product Images (Left Side) -->
                <div class="col-lg-6">
                    <div class="product-card p-4" style="border: 0.5px solid #ddd; border-radius: 0px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">

                        <!-- Main Image Slider -->
                        <div class="product-image-slider mb-4">
                            <div class="swiper productSwiper">
                                <div class="swiper-wrapper">
                                    @if ($product->images->isNotEmpty())
                                        @foreach ($product->images as $image)
                                            <div class="swiper-slide">
                                                <img class="img-fluid rounded shadow main-image"
                                                    src="{{ asset('storage/' . $image->image) }}"
                                                    alt="{{ $product->plantname }}"
                                                    style="width: 100%; height: 500px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="swiper-slide">
                                            <img class="img-fluid rounded shadow"
                                                src="{{ asset('PublicArea/images/plants/default-image.png') }}"
                                                alt="Default Product Image"
                                                style="width: 100%; height: 500px; object-fit: cover;">
                                        </div>
                                    @endif
                                </div>
                                <!-- Navigation -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <!-- Pagination -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>

                        <!-- Thumbnail Navigation -->
                        @if ($product->images->count() > 1)
                            <div class="thumbnail-slider">
                                <div class="swiper thumbnailSwiper">
                                    <div class="swiper-wrapper">
                                        @foreach ($product->images as $image)
                                            <div class="swiper-slide">
                                                <img class="img-thumbnail rounded shadow"
                                                    src="{{ asset('storage/' . $image->image) }}"
                                                    alt="{{ $product->plantname }}"
                                                    style="width: 110px; height: 110px; object-fit: cover; cursor: pointer;">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Product Info (Right Side) -->
                <div class="col-lg-6">
                    <div class="product-info">
                        <h3 class="mb-3">{{ $product->plantname }}</h3>
                        <p class="text-muted mb-4"><strong>Scientific Name:</strong> {{ $product->scientificName }}</p>
                        <p><strong>Category:</strong> {{ $product->category->categoryName ?? 'Uncategorized' }}</p>
                        <p><strong>Price:</strong> ${{ $product->price }}</p>
                        <p><strong>Discount:</strong> {{ $product->discount }}%</p>
                        <p><strong>Final Price:</strong> ${{ $product->finalPrice }}</p>
                        <p><strong>Description:</strong> {{ $product->description }}</p>

                        <!-- Quantity and Add to Cart -->
                        <form action="#" method="POST">
                            @csrf
                            <div class="d-flex align-items-center mb-3">
                                <label for="quantity" class="me-2"><strong>Quantity:</strong></label>
                                <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stockQuantity }}"
                                    class="form-control" style="width: 80px;">
                            </div>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
