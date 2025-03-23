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
                                <h2 class="title">Plant Diseases</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url('/') }}">Home</a>
                                </span>
                                <span>Diseases Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- Plant Details Section -->
    <div class="site-main">
        <section class="prt-row plant-details-section clearfix">
            <div class="container">
                <div class="row">
                    <!-- Plant Images (Left Side) -->
                    <div class="col-lg-6">
                        <div class="plant-card p-4" style="border: 0.5px solid #ddd; border-radius: 0; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">
                            <!-- Main Image Slider -->
                            <div class="plant-image-slider mb-4">
                                <div class="swiper plantSwiper">
                                    <div class="swiper-wrapper">
                                        @if ($plant_diseases->images->isNotEmpty())
                                            @foreach ($plant_diseases->images as $image)
                                                <div class="swiper-slide">
                                                    <img class="img-fluid rounded shadow main-image" src="{{ asset('storage/' . $image->image) }}" alt="{{ $plant_diseases->diseasesName }}" style="width: 100%; height: 500px; object-fit: cover;">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="swiper-slide">
                                                <img class="img-fluid rounded shadow" src="{{ asset('PublicArea/images/plants/default-image.png') }}" alt="Default Plant Image" style="width: 100%; height: 500px; object-fit: cover;">
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
                            @if ($plant_diseases->images->count() > 1)
                                <div class="thumbnail-slider">
                                    <div class="swiper thumbnailSwiper">
                                        <div class="swiper-wrapper">
                                            @foreach ($plant_diseases->images as $image)
                                                <div class="swiper-slide">
                                                    <img class="img-thumbnail rounded shadow" src="{{ asset('storage/' . $image->image) }}" alt="{{ $plant_diseases->diseasesName }}" style="width: 110px; height: 110px; object-fit: cover; cursor: pointer;">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Plant Info (Right Side) -->
                    <div class="col-lg-6">
                        <div class="plant-info">
                            <h3 class="mb-3">{{ $plant_diseases->diseasesName }}</h3>
                            <p><strong>Symptoms:</strong> {{ $plant_diseases->symptoms }}</p>
                            <p><strong>Impact:</strong> {{ $plant_diseases->category->impact ?? 'Uncategorized' }}</p>
                            <p><strong>Cause:</strong> {{ $plant_diseases->cause }}</p>
                            <p><strong>Treatment:</strong> {{ $plant_diseases->treatment }}</p>
                            <p><strong>Plants Affected:</strong> {{ $plant_diseases->plantsAffected }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Plant Details Section End -->
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
        .plantSwiper {
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

        /* Plant Info Styles */
        .plant-info {
            padding: 20px;
        }

        .plant-info h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .plant-info h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }

        .plant-meta p {
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
        var mainSwiper = new Swiper(".plantSwiper", {
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
