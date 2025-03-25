@extends('PublicArea.Layout.main')

@section('container')
    <!-- Page Title -->
    <div class="prt-page-title-row">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="prt-page-title-row-heading">
                            <div class="page-title-heading">
                                <h2 class="title">Product Details</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url('/') }}">Home</a>
                                </span>
                                <span>Product Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- Product Details Section -->
    <div class="site-main">
        <section class="prt-row product-details-section clearfix">
            <div class="container">
                <div class="row">
                    <!-- Product Images (Left Side) -->
                    <div class="col-lg-6">
                        <div class="product-card p-4"
                            style="border: 0.5px solid #ddd; border-radius: 0px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">

                            <!-- Main Image Slider -->
                            <div class="product-image-slider mb-4">
                                <div class="swiper productSwiper">
                                    <div class="swiper-wrapper">
                                        @if ($product->images->isNotEmpty())
                                            @foreach ($product->images as $image)
                                                <div class="swiper-slide">
                                                    <img class="img-fluid rounded shadow main-image"
                                                        src="{{ asset('storage/' . $image->image) }}"
                                                        alt="{{ $product->productName }}"
                                                        style="width: 100%; height: 500px; object-fit: cover;">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="swiper-slide">
                                                <img class="img-fluid rounded shadow"
                                                    src="{{ asset('PublicArea/images/products/default-image.png') }}"
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
                                                        alt="{{ $product->productName }}"
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
                            <h3 class="mb-3">{{ $product->productName }}</h3>
                            <div class="product-meta mb-4">
                                <p><strong>Category:</strong> {{ $product->category->categoryName ?? 'Uncategorized' }}</p>
                            </div>
                            <div class="product-description mb-4">
                                <p><strong>Description:</strong> {{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Product Details Section End -->
@endsection

@push('css')
    <style>
        /* Main Image Styles */
        .main-image {
            transition: transform 0.3s ease-in-out;
        }

        .main-image:hover {
            transform: scale(1.02);
        }

        /* Swiper Styles */
        .productSwiper {
            width: 100%;
            height: 500px;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .thumbnailSwiper {
            width: 100%;
            height: 120px; /* Increased size */
            padding: 10px 0;
        }

        .thumbnail-slider .swiper-slide img {
            width: 120px; /* Increased size */
            height: 120px; /* Increased size */
            object-fit: cover;
            cursor: pointer;
            border: 2px solid #ddd; /* Optional: Adds a subtle border */
            border-radius: 6px; /* Optional: Slightly rounded corners */
            transition: transform 0.3s ease-in-out;
        }

        .thumbnail-slider .swiper-slide img:hover {
            transform: scale(1.1);
        }

        .thumbnail-slider .swiper-slide {
            opacity: 0.6;
            transition: opacity 0.3s ease;
        }

        .thumbnail-slider .swiper-slide-thumb-active {
            opacity: 1;
        }

        /* Navigation Buttons */
        .swiper-button-next,
        .swiper-button-prev {
            color: #fff;
            background: rgba(0, 0, 0, 0.5);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            padding: 20px;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 16px;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(0, 0, 0, 0.7);
        }

        /* Pagination */
        .swiper-pagination-bullet {
            background: #fff;
            opacity: 0.7;
        }

        .swiper-pagination-bullet-active {
            background: #fff;
            opacity: 1;
        }

        /* Product Info Styles */
        .product-info {
            padding: 20px;
        }

        .product-info h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .product-info h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .product-meta p {
            margin-bottom: 8px;
        }
    </style>
@endpush

@push('js')
    <script>
        // Initialize thumbnail swiper
        var thumbnailSwiper = new Swiper(".thumbnailSwiper", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });

        // Initialize main swiper
        var mainSwiper = new Swiper(".productSwiper", {
            spaceBetween: 30,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            thumbs: {
                swiper: thumbnailSwiper,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });
    </script>
@endpush
