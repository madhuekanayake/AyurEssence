@extends('PublicArea.Layout.main')
@section('container')

        <!-- page-title -->
        <div class="prt-page-title-row">
            <div class="prt-page-title-row-inner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="prt-page-title-row-heading">
                                <div class="page-title-heading">
                                    <h2 class="title">Medicinal Plants</h2>
                                </div>
                                <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="{{ url('/') }}">Home</a>
                                    </span>
                                    <span>Plants</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-title end-->

        <!-- Search Form -->
    <div class="container mt-4">
        <form action="{{ route('CustomerPlant.search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by plant's name" value="{{ request('search') }}" style="width: 100px; height: 40px;">
                <button class="btn btn-outline-secondary ms-2" type="submit" style="height: 40px;">Search</button>
            </div>
        </form>
    </div>

        <!-- site-main start -->
        <div class="site-main">

            <!--blog-section-->
            <section class="prt-row prt-bg bg-base-grey blog-section clearfix">
                <div class="container">
                    <div class="row row-equal-height" data-aos="fade-up" data-aos-duration="1000">

                        @foreach ($plants as $plant)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-blog style2">
                                <div class="featured-thumbnail">
                                    @php
                                        // Find the primary image for the blog
                                        $primaryImage = $plant->images->firstWhere('isPrimary', 1);
                                    @endphp

                                    @if ($primaryImage)
                                        <img width="413" height="150" class="img-fluid" src="{{ asset('storage/' . $primaryImage->image) }}" alt="Primary Blog Image">
                                    @elseif ($plant->images->isNotEmpty())
                                        <img width="413" height="150" class="img-fluid" src="{{ asset('storage/' . $plant->images->first()->image) }}" alt="plant Image">
                                    @else
                                        <img width="413" height="150" class="img-fluid" src="{{ asset('PublicArea/images/blogs/default-image.png') }}" alt="Default Image">
                                    @endif
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>
                                            <a href="{{ url('blog-details/' . $plant->id) }}">{{ $plant->title }}</a>
                                        </h3>
                                    </div>
                                    <div class="featured-meta">
                                        <p><strong>Name:</strong> {{ $plant->plantname }}</p>
                                    </div>
                                    <div class="featured-meta">
                                        <p><strong>Scientific Name:</strong> {{ $plant->scientificName }}</p>
                                    </div>
                                    <div class="featured-desc">
                                        <p>
                                            {{ Str::limit(strip_tags($plant->description), 150) }}
                                            <a href="{{ route('CustomerPlant.details', $plant->id) }}" class="prt-btn btn-inline prt-btn-color-darkcolor btn-underline">
                                                Read More..
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>


            <!--blog-section end-->

            <!-- cta-sectopn -->
            <section class="prt-row prt-bg bg-base-grey prt-bgimage-yes bg-img1 cta-section position-relative animation clearfix">
                <div class="prt-row-wrapper-bg-layer prt-bg-layer bg-base-grey"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="prt-single-image-overlay prt-blog-overlay">
                                <img width="480" height="491" class="img-fluid" src="{{ asset('PublicArea/images/single-overlay.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <!-- section title -->
                            <div class="section-title title-style-center_text">
                                <div class="title-header">
                                    <h2 class="cta-title">Medicinal Plants </h2>
                                    <h3 class="cta-titlepre">Purchase a medicinal Plants for your garden</h3>
                                </div>
                                <div class="cta-bnt mt-40 fadeup-amin">
                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-skincolor" href="{{ route('ShopProduct.all') }}">
                                        Purchase <i class="fas fa-arrow-right ml-2"></i>
                                    </a>
                                </div>

                            </div>
                            <!-- section title end-->
                        </div>
                    </div>
                </div>
            </section>
            <!-- cta-sectopn end-->



        </div><!-- site-main end-->

@endsection

@push('css')
<style>
    .featured-thumbnail img {
        border-radius: 10px; /* Adjust the value as needed */
        overflow: hidden; /* Ensures proper rendering of rounded corners */
    }
</style>

@endpush
