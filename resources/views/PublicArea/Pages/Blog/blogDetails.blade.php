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
                    <div class="col-lg-12">
                        <div class="blog-card p-4" style="border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                            <!-- Blog Image Slider -->
                            <div class="blog-image-slider mb-4">
                                <div class="swiper blogSwiper">
                                    <div class="swiper-wrapper">
                                        @if ($blog->images->isNotEmpty())
                                            @foreach ($blog->images as $image)
                                                <div class="swiper-slide">
                                                    <img class="img-fluid rounded shadow" src="{{ asset('storage/' . $image->image) }}"
                                                        alt="{{ $blog->title }}"
                                                        style="width: 100%; height: 400px; object-fit: cover;">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="swiper-slide">
                                                <img class="img-fluid rounded shadow"
                                                    src="{{ asset('PublicArea/images/blogs/default-image.png') }}"
                                                    alt="Default Blog Image"
                                                    style="width: 100%; height: 400px; object-fit: cover;">
                                            </div>
                                        @endif
                                    </div>
                                    <!-- Add Navigation -->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>

                            <!-- Blog Info -->
                            <div class="blog-info">
                                <h3 class="mb-3">{{ $blog->title }}</h3>
                                <p class="text-muted mb-4"><strong>Date:</strong> {{ $blog->date }}</p>
                                <p>{!! $blog->content !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Blog Details Section End -->
@endsection

@push('js')
<script>
    var swiper = new Swiper(".blogSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });
</script>
@endpush


@push('js')
<style>
    .blogSwiper {
        width: 100%;
        height: 400px;
        border-radius: 8px;
        overflow: hidden;
    }

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

    .swiper-pagination-bullet {
        background: #fff;
        opacity: 0.7;
    }

    .swiper-pagination-bullet-active {
        background: #fff;
        opacity: 1;
    }
</style>
@endpush
