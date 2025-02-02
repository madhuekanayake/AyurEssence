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
                                <h2 class="title">Treatment Details</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url('/') }}">Home</a>
                                </span>
                                <span>Treatment Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- Treatment Details Section -->
    <div class="site-main">
        <section class="prt-row treatment-details-section clearfix">
            <div class="container">
                <div class="row">
                    <!-- Treatment Images -->
                    <div class="col-lg-6">
                        <div class="treatment-card p-4"
                            style="border: 0.5px solid #ddd; border-radius: 0px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">
                            <!-- Treatment Image Slider -->
                            <div class="treatment-image-slider mb-4">
                                <div class="swiper treatmentSwiper">
                                    <div class="swiper-wrapper">
                                        @if ($treatment->images->isNotEmpty())
                                            @foreach ($treatment->images as $image)
                                                <div class="swiper-slide">
                                                    <img class="img-fluid rounded shadow main-image"
                                                        src="{{ asset('storage/' . $image->image) }}"
                                                        alt="{{ $treatment->name }}"
                                                        style="width: 100%; height: 500px; object-fit: cover;">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="swiper-slide">
                                                <img class="img-fluid rounded shadow"
                                                    src="{{ asset('PublicArea/images/treatments/default-image.png') }}"
                                                    alt="Default Treatment Image"
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
                            @if ($treatment->images->count() > 1)
                                <div class="thumbnail-slider">
                                    <div class="swiper thumbnailSwiper">
                                        <div class="swiper-wrapper">
                                            @foreach ($treatment->images as $image)
                                                <div class="swiper-slide">
                                                    <img class="img-thumbnail rounded shadow"
                                                        src="{{ asset('storage/' . $image->image) }}"
                                                        alt="{{ $treatment->name }}"
                                                        style="width: 110px; height: 110px; object-fit: cover; cursor: pointer;">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Treatment Info -->
                    <div class="col-lg-6">
                        <div class="treatment-info">
                            <h3 class="mb-3">{{ $treatment->name }}</h3>
                            <p><strong>Description:</strong> {{ $treatment->description }}</p>
                            <p><strong>Content:</strong> {{ Str::limit(strip_tags($treatment->content), 150) }}</p>
                            <p><strong>Ingredients:</strong> {{ $treatment->ingredients }}</p>
                            <p><strong>Benefits:</strong> {{ $treatment->benefits }}</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Treatment Details Section End -->
@endsection

@push('css')
    <style>
        /* Image Styles */
        .main-image {
            transition: transform 0.3s ease-in-out;
        }

        .main-image:hover {
            transform: scale(1.02);
        }

        /* Swiper Styles */
        .treatmentSwiper {
            width: 100%;
            height: 500px;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .thumbnailSwiper {
            width: 100%;
            height: 120px;
            padding: 10px 0;
        }

        .thumbnail-slider .swiper-slide img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid #ddd;
            border-radius: 6px;
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

        /* Treatment Info Styles */
        .treatment-info {
            padding: 20px;
        }

        .treatment-info h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .treatment-info h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }

        .treatment-meta p {
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
        var mainSwiper = new Swiper(".treatmentSwiper", {
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
