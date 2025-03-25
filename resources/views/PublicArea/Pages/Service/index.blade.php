@extends('PublicArea.Layout.main')
@section('container')

        <!-- page-title -->
        <div class="prt-page-title-row style2">
            <div class="prt-page-title-row-inner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <div class="prt-page-title-row-heading">
                                <div class="page-title-heading">
                                    <h3>Preserving Nature with AI</h3>
                                    <h2 class="title">AI-Powered Medicinal Plant Identification & Conservation</h2>
                                </div>
                                <div class="page-title-desc">
                                    <p>Leverage AI technology to identify medicinal plants, promote conservation efforts, and spread awareness about their traditional and modern applications for a sustainable future.</p>
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

            <!-- appointment-section -->
            <section class="prt-row appointment-section01 clearfix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="appointment-mask-wrapper">
                                <div class="appointment-mask-circle">
                                    <div class="appointment-mask-image-circle"></div>
                                </div>
                                <!-- featured-content-box -->
                                <div class="featured-content-box mt-30">
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3>AI-Powered Medicinal Plant Identification</h3>
                                        </div>
                                        <div class="featured-desc">
                                            <p>AI-driven medicinal plant identification utilizes machine learning and computer vision to analyze.</p>
                                            <div class="mt-35">
                                                <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor ml-20" href="{{ route('ImageUpload.all') }}">Plant Idenitification</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- featured-content-box end-->
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12">

                            <div class="row prt-stepsbox res-991-mt-20">
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <!-- featured-content-box -->
                                    <div class="featured-content-box style1 box-1">
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3>01. Identify Medicinal Plants</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Use AI-powered recognition to accurately identify medicinal plants and understand their benefits.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- featured-content-box end-->
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <!-- featured-content-box -->
                                    <div class="featured-content-box style1 box-2">
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3>02. Learn About Conservation</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Discover sustainable practices for preserving endangered medicinal plants and their ecosystems.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- featured-content-box end-->
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <!-- featured-content-box -->
                                    <div class="featured-content-box style1 box-3">
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3>03. Gain Expert Insights</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Access AI-driven research and expert knowledge to understand plant properties and applications.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- featured-content-box end-->
                                </div>

                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <!-- featured-content-box -->
                                    <div class="featured-content-box style1 box-4">
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3>04. Raise Awareness</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Join the movement to promote traditional knowledge, sustainability, and the importance of medicinal plants.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- featured-content-box end-->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- appointment-section end-->

            <!--service-section-->
            <section class="prt-row prt-bg bg-base-grey service-section01 clearfix">
                <div class="container">
                    <div class="row row-equal-height" data-aos="fade-up" data-aos-duration="1000">
                        @foreach ($services as $service)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-service style2">
                                <div class="featured-thumbnail">
                                    @if ($service->image)
                                        <img width="413" height="200" class="img-fluid" src="{{ asset('storage/' . $service->image) }}" alt="Service Image">
                                    @else
                                        <img width="413" height="200" class="img-fluid" src="{{ asset('PublicArea/images/services/default-image.png') }}" alt="Default Image">
                                    @endif
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>
                                            <a href="{{ url('service-details/' . $service->id) }}">{{ $service->title }}</a>

                                        </h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>
                                            {{ Str::limit($service->description, 100) }}
                                            <a class="prt-btn btn-inline prt-btn-color-darkcolor btn-underline" href="{{ url('service-details/' . $service->id) }}">View more</a>
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

            <!--service-section end-->


            

        </div><!-- site-main end-->

@endsection
