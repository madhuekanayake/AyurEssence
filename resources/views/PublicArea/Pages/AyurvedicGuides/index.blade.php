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
                                    <h2 class="title">Our latest stories</h2>
                                </div>
                                <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="{{ url('/') }}">Home</a>
                                    </span>
                                    <span>Ayurvedic Guides</span>
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
            <section class="prt-row blog-section prt-blog-single clearfix">
                <div class="container">
                    <div class="row">
                        @foreach ($ayurveda_guides as $guide)
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                <!-- featured-imagebox-post -->
                                <div class="featured-imagebox featured-imagebox-post style1">
                                    <div class="featured-thumbnail">
                                        @if ($guide->image)
                                            <img width="303" height="300" class="img-fluid" src="{{ asset('storage/' . $guide->image) }}" alt="Ayurveda Guide Image">
                                        @else
                                            <img width="303" height="300" class="img-fluid" src="{{ asset('PublicArea/images/default-image.jpg') }}" alt="Default Image">
                                        @endif
                                    </div>
                                    
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3>
                                                <a href="{{ url('blog-details/' . $guide->id) }}">{{ $guide->title }}</a>
                                            </h3>
                                        </div>
                                        <div class="featured-meta">
                                            <p>{{ $guide->description }}</p>
                                        </div>
                                        <div class="featured-desc">
                                            <p>
                                                {{ Str::limit(strip_tags($guide->information), 150) }}

                                            </p>
                                        </div>
                                    </div>
                                </div><!-- featured-imagebox-post end -->
                            </div><!-- col-lg-4 end -->
                        @endforeach
                    </div><!-- row end -->
                </div><!-- container end -->
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
                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-skincolor" href="contact-us.html">+94 222 468 5678</a>
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
