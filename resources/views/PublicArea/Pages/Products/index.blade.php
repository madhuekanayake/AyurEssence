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
                                    <h2 class="title">Medicinal Products</h2>
                                </div>
                                <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="{{ url('/') }}">Home</a>
                                    </span>
                                    <span>Products</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-title end-->

        <!-- site-main start -->
        <div class="site-main">

            <!--blog-section-->
            <section class="prt-row prt-bg bg-base-grey blog-section clearfix">
                <div class="container">
                    <div class="row row-equal-height" data-aos="fade-up" data-aos-duration="1000">

                        @foreach ($products as $product)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-blog style2">
                                <div class="featured-thumbnail">
                                    @php
                                        // Get the primary image
                                        $primaryImage = $product->images->firstWhere('isPrimary', 1);
                                    @endphp

                                    @if ($primaryImage)
                                        <img width="413" height="150" class="img-fluid" src="{{ asset('storage/' . $primaryImage->image) }}" alt="Primary Product Image">
                                    @elseif ($product->images->isNotEmpty())
                                        <img width="413" height="150" class="img-fluid" src="{{ asset('storage/' . $product->images->first()->image) }}" alt="Product Image">
                                    @else
                                        <img width="413" height="150" class="img-fluid" src="{{ asset('PublicArea/images/product/default-image.png') }}" alt="Default Image">
                                    @endif
                                </div>

                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>
                                            <a href="{{ url('product-details/' . $product->id) }}">{{ $product->productName }}</a>
                                        </h3>
                                    </div>

                                    <div class="featured-position">
                                        <p><strong>Category:</strong>{{ $product->category->categoryName ?? 'No Category' }}</p>
                                    </div>

                                    <div class="featured-desc">
                                        <p>

                                            <a href="{{ route('CustomerProduct.details', $product->id) }}" class="prt-btn btn-inline prt-btn-color-darkcolor btn-underline">
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
                                    <h2 class="cta-title">Need a help</h2>
                                    <h3 class="cta-titlepre">Get a free medical checkup</h3>
                                </div>
                                <div class="cta-bnt mt-40 fadeup-amin">
                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-skincolor" href="contact-us.html">+3 (092) 508-38-01</a>
                                </div>
                            </div>
                            <!-- section title end-->
                        </div>
                    </div>
                </div>
            </section>
            <!-- cta-sectopn end-->

            <!-- info-section -->
            <section class="prt-row padding_zero-section prt-bg bg-base-skin info-section clearfix ">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="prt-info-main-block">
                                <div class="info_btn mr-30 res-767-mb-15">
                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round  prt-btn-style-border prt-btn-color-darkcolor" href="#">COVID-19 resources</a>
                                </div>
                                <!-- featured-icon-box -->
                                <div class="featured-icon-box icon-align-before-content style2">
                                    <div class="featured-icon">
                                        <div class="prt-icon prt-icon_element-onlytxt prt-icon_element-size-lg prt-icon_element-color-darkcolor">
                                            <i class="flaticon-alert"></i>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3>Get The Health package</h3>
                                        </div>
                                        <div class="featured-desc">
                                            <p>What you need to know about the 2019 - 2023 fly season.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- featured-icon-box end -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- info-section -->

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
