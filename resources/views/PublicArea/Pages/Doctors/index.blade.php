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
                                <h2 class="title">Meet our doctors</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url('/') }}">Home</a>
                                </span>
                                <span>Doctors</span>
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

        <!-- team-section -->
        <section class="prt-row team-section01 clearfix">
            <div class="container">
                <div class="row row-equal-height" data-aos="fade-up" data-aos-duration="1000">
                    @foreach ($doctors as $item)
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-team style1">
                                <div class="featured-thumbnail">
                                    @if ($item->profilePicture)
                                        <img class="doctor-image" src="{{ asset('storage/' . $item->profilePicture) }}" alt="{{ $item->name }}">
                                    @else
                                        <img class="doctor-image" src="{{ asset('PublicArea/images/team-member/team-img01.png') }}" alt="Default Image">
                                    @endif
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title-box">
                                        <div class="featured-title">
                                            <h3><a href="team-details.html">{{ $item->name }}</a></h3>
                                        </div>
                                        <div class="featured-position">
                                            <p>{{ $item->specialzations->specializationName ?? 'General doctor' }}</p>
                                        </div>
                                    </div>
                                    <div class="prt-history">
                                        <p><i class="fa fa-check-circle"></i> {{ $item->workplaceName }}</p>
                                        <div class="d-flex">
                                            <span>4.8</span>
                                            <div class="team-rating-star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- More Details Button -->
                                    <div class="more-details">


                                        <a href="{{ route('CustomerDoctor.details', $item->id) }}" class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-darkcolor">
                                            More Details
                                        </a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>



        <!-- team-section end -->

        <!--cta-section-->
        <section class="prt-row padding_zero-section cta-section03 animation clearfix">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cta-content text-center">
                            <div class="section-title title-style-center_text">
                                <div class="title-header">
                                    <h2 class="cta-title">Need a help</h2>
                                    <h3 class="cta-titlepre">Are you facing any problem in your health?</h3>
                                </div>
                                <div class="cta-bnt mt-40 fadeup-amin">
                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-darkcolor"
                                        href="contact-us.html">Contact us now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="prt_single_image-wrapper cta-img mt-40 res-991-mt-20" data-cursor-tooltip="">
                            <div class="prt_single_image-wrapper">
                                <a href="team-details.html"><img width="1920" height="400" class="img-fluid"
                                        src="images/single-img-05.png" alt="image"></a>
                            </div>
                            <div class="prt-pfbox-overlay">
                                <div class="ctaimg-title">
                                    <a href="team-details.html">Meet our team</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--cta-section end-->

        <!-- info-section -->
        <section class="prt-row padding_zero-section prt-bg bg-base-skin info-section clearfix ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="prt-info-main-block">
                            <div class="info_btn mr-30 res-767-mb-15">
                                <a class="prt-btn prt-btn-size-md prt-btn-shape-round  prt-btn-style-border prt-btn-color-darkcolor"
                                    href="#">COVID-19 resources</a>
                            </div>
                            <!-- featured-icon-box -->
                            <div class="featured-icon-box icon-align-before-content style2">
                                <div class="featured-icon">
                                    <div
                                        class="prt-icon prt-icon_element-onlytxt prt-icon_element-size-lg prt-icon_element-color-darkcolor">
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
