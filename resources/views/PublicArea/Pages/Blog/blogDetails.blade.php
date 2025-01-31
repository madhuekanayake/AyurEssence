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
                                <h2 class="title">Blog Details</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url('/') }}">Home</a>
                                </span>
                                <span>Blog Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- Blog Details Section -->
    <div class="site-main">
        <section class="prt-row blog-details-section clearfix">
            <div class="container">
                <div class="row">
                    <!-- Blog Content -->
                    <div class="col-lg-6">
                        <div class="blog-card p-4"
                            style="border: 0.5px solid #ddd; border-radius: 0px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">
                            <!-- Blog Image Slider -->
                            <div class="blog-image-slider mb-4">
                                <div class="swiper blogSwiper">
                                    <div class="swiper-wrapper">
                                        @if ($blog->images->isNotEmpty())
                                            @foreach ($blog->images as $image)
                                                <div class="swiper-slide">
                                                    <img class="img-fluid rounded shadow main-image"
                                                        src="{{ asset('storage/' . $image->image) }}"
                                                        alt="{{ $blog->title }}"
                                                        style="width: 100%; height: 500px; object-fit: cover;">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="swiper-slide">
                                                <img class="img-fluid rounded shadow"
                                                    src="{{ asset('PublicArea/images/blogs/default-image.png') }}"
                                                    alt="Default Blog Image"
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
                            @if ($blog->images->count() > 1)
                                <div class="thumbnail-slider">
                                    <div class="swiper thumbnailSwiper">
                                        <div class="swiper-wrapper">
                                            @foreach ($blog->images as $image)
                                                <div class="swiper-slide">
                                                    <img class="img-thumbnail rounded shadow"
                                                        src="{{ asset('storage/' . $image->image) }}"
                                                        alt="{{ $blog->title }}"
                                                        style="width: 110px; height: 110px; object-fit: cover; cursor: pointer;">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                            <!-- Blog Info -->
                            <div class="col-lg-6">
                            <div class="blog-info">
                                <h3 class="mb-3">{{ $blog->title }}</h3>
                                <p class="text-muted mb-4">
                                    <strong>Date:</strong> {{ $blog->date }}


                                </p>
                                <div class="blog-content">
                                    {!! $blog->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Blog Details Section End -->
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
        .blogSwiper {
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

        /* Blog Info Styles */
        .blog-info {
            padding: 20px;
        }

        .blog-info h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .blog-content {
            line-height: 1.6;
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
        var mainSwiper = new Swiper(".blogSwiper", {
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
