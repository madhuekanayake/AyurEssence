@extends('PublicArea.Layout.main')
@section('container')

            <!-- hero-section -->
            <div class="hero-section prt-bg">
                <div class="hero-slider-wrapper">
                    <div class="hero-slider prt-slider">
                        <div class="hero-slide slide-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-10 col-lg-12 position-relative m-auto">
                                        <div class="hero-content-block">
                                            <div class="hero-content">
                                                <div class="pretitle">
                                                    <h3>Nature with </h3>
                                                </div>
                                                <div class="">
                                                    <h2 class="title"><span>Ayur</span>Essence</h2>
                                                </div>
                                                <div class="hero-slider_btn mt-10 res-991-mt-30">
                                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-skincolor mr-15 mb-10" href="{{ route('ImageUpload.all') }}">Plant Idenitification</a>
                                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-border prt-btn-color-whitecolor mb-10" href="{{ route('ContactUs.all') }}">Contact us</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hero-overlay-box">
                                            <div class="prt-icon prt-icon_element-onlytxt prt-icon_element-size-lg prt-icon_element-color-darkcolor">
                                                <i class="fas fa-check-circle"></i>

                                            </div>
                                            <div><h3>Identify the Medicinal Plants – Embrace Ayur Essence</h3></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hero-slide slide-2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 position-relative">
                                        <div class="hero-content-block">
                                            <div class="hero-content">
                                                <div class="pretitle">
                                                    <h3>Welcome to the</h3>
                                                </div>
                                                <div class="">
                                                    <h2 class="title">Ayur Essence</h2>
                                                </div>
                                                <div class="d-flex align-items-center mt-50 res-991-mt-30">
                                                    <div class="hero-slider_btn">
                                                        <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-skincolor mr-25 mb-10" href="{{ route('ImageUpload.all') }}">Plant Idenitification</a>
                                                    </div>
                                                    <div class="prt-hero-link">
                                                        <div class="prt-call"><i class="fab fa-whatsapp"></i> <a href="tel:1234567890">+94 222 468 5678</a></div>
                                                        <div class="prt-email"><a href="mailto:info@example.com">contact.ayuressence@gmail.com</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hero-overlay-box">
                                            <div class="prt-icon prt-icon_element-onlytxt prt-icon_element-size-lg prt-icon_element-color-darkcolor">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div><h3>Identify the Medicinal Plants – Embrace Ayur Essence</h3></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- hero-section end -->

        </div>



        <!-- site-main start -->
        <div class="site-main">

            <!-- about-section -->
            <section class="prt-row about-section animation clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="pr-20 res-1199-pr-0">
                                <!-- section title -->
                                <div class="section-title">
                                    <div class="title-header">
                                        <h2 class="title">Identify Medicinal Plants Where Nature Meets the Science of Ayurveda.</h2>
                                    </div>
                                    <div class="title-desc">
                                        <p class="prt-about-desc">Discover the Secrets of Healing: Identify Medicinal Plants Blending Nature and Ayurveda.</p>
                                    </div>
                                </div>
                                <!-- section title end-->
                                <!-- prt_single_image-wrapper -->
                                <div class="prt_single_image-wrapper mt-30 res-991-mt-0 fadeleft-anim">

                                    <img width="615" height="500" class="img-fluid border-rad_20" src="{{ asset('PublicArea/images/single-img-01.jpg') }}" alt="image">
                                </div>
                                <!-- prt_single_image-wrapper end -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="pl-20 res-1199-pl-0 res-991-mt-30">
                                <!-- prt_single_image-wrapper -->
                                <div class="prt_single_image-wrapper mb-40 faderight-anim">
                                    <img width="615" height="500" class="img-fluid border-rad_20" src="{{ asset('PublicArea/images/single-img-02.jpg') }}" alt="image">
                                </div>
                                <!-- prt_single_image-wrapper end -->
                                <!-- section title -->
                                <div class="section-title">
                                    <div class="title-desc">
                                        <p>Suggests a deeper connection between traditional knowledge and the identification of healing plants that promote overall wellness.</p>
                                    </div>
                                </div>
                                <!-- section title end-->
                                <div class="row g-0">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <ul class="prt-list prt-list-style-icon-01 pr-10 res-575-pr-0">
                                            <li class="prt-list-li-content"><i class="fas fa-seedling"></i> Plant Identification</li> <!-- Plant Icon -->
                                            <li class="prt-list-li-content"><i class="fas fa-book-open"></i> Educational Resource</li> <!-- Book Icon -->
                                            <li class="prt-list-li-content"><i class="fas fa-comments"></i> Chat Bot</li> <!-- Chat Icon -->
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <ul class="prt-list prt-list-style-icon-01">
                                            <li class="prt-list-li-content"><i class="fas fa-shopping-basket"></i> Marketplace for Medicinal Plants</li> <!-- Marketplace Icon -->
                                            <li class="prt-list-li-content"><i class="fas fa-map-marked-alt"></i> Interactive Mapping Service</li> <!-- Map Icon -->
                                            <li class="prt-list-li-btn"><a href="{{ route('CustomerService.all') }}"><i class="fas fa-arrow-right"></i> View more</a></li> <!-- Arrow Icon -->
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-section end-->

            <!--service-section-->
            <section class="prt-row padding_top_zero-section service-section animation clearfix">
                <div class="container">
                    <div class="row row-equal-height slick_slider fadeup-amin" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1400,"settings":{"slidesToShow": 3}},{"breakpoint":980,"settings":{"slidesToShow": 2}},{"breakpoint":656,"settings":{"slidesToShow": 1}}]}'>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-service style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="151" class="img-fluid" src="{{ asset('PublicArea/images/services/service-01.png') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="service-details.html">General medicine</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>( Kayachikitsa )</p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-service style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="151" class="img-fluid" src="{{ asset('PublicArea/images/services/service-02.png') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="service-details.html">Pediatrics</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>( Kaumarabhritya )</p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-service style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="151" class="img-fluid" src="{{ asset('Publicarea/images/services/service-03.png') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="service-details.html">Detox & rejuvenation</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>( Panchkarma )</p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-service style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="151" class="img-fluid" src="{{ asset('PublicArea/images/services/service-04.png') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="service-details.html">Eye, ENT & dental care</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>( Kayachikitsa )</p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-service style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="151" class="img-fluid" src="{{ asset('Publicarea/images/services/service-05.jpg') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="service-details.html">Holistic wellness</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>( Kayachikitsa )</p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-service style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="151" class="img-fluid" src="{{ asset('PublicArea/images/services/service-06.jpg') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="service-details.html">Panchakarma detox</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>( Panchakarma )</p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                    </div>
                </div>
            </section>
            <!--service-section end-->

            <!-- cta-sectopn -->
            <section class="prt-row prt-bg bg-base-grey prt-bgimage-yes bg-img1 cta-section position-relative animation clearfix">
                <div class="prt-row-wrapper-bg-layer prt-bg-layer bg-base-grey"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="prt-single-image-overlay">

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

            <!-- product-section -->
            <section class="prt-row product-section animation clearfix">
                <div class="container">
                    <div class="row row-equal-height">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <!-- featured-icon-box -->
                            <div class="featured-icon-box icon-align-before-content style1 bg-base-dark">
                                <div class="featured-icon">
                                    <div class="prt-icon prt-icon_element-onlytxt prt-icon_element-size-lg prt-icon_element-color-darkcolor">
                                        <i class="fas fa-leaf"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>100% Organic</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Certified 100% organic products</p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-icon-box end -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <!-- featured-icon-box -->
                            <div class="featured-icon-box icon-align-before-content style1 bg-base-skin">
                                <div class="featured-icon">
                                    <div class="prt-icon prt-icon_element-onlytxt prt-icon_element-size-lg prt-icon_element-color-darkcolor">
                                        <i class="fas fa-award"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>Certified medicine</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Reliable medical treatments</p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-icon-box end -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <!-- featured-icon-box -->
                            <div class="featured-icon-box icon-align-before-content style1 bg-base-dark">
                                <div class="featured-icon">
                                    <div class="prt-icon prt-icon_element-onlytxt prt-icon_element-size-lg prt-icon_element-color-darkcolor">
                                        <i class="fas fa-hourglass"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>Various awards received</h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p>Recipient of multiple awards</p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-icon-box end -->
                        </div>
                    </div>
                    <div class="row row-equal-height slick_slider fadeup-amin" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1290,"settings":{"slidesToShow": 3}}, {"breakpoint":992,"settings":{"slidesToShow": 2,"arrows":false}},{"breakpoint":576,"settings":{"slidesToShow": 1}},{"breakpoint":375,"settings":{"slidesToShow": 1}}]}'>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-product style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="280" class="img-fluid" src="{{ asset('PublicArea/images/plants/gotukola.jpeg') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="#">Gotukola</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <h7><a href="#">Centella Asiatica</a></h7>
                                    </div>
                                    <div class="prt-product-btn">
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor mr" href="{{ route('CustomerPlant.all') }}">View More</a>

                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-product style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="280" class="img-fluid" src="{{ asset('PublicArea/images/plants/iramusu.jpg') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="#">Iramusu</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <h7><a href="#">Desmodium Gangeticum</a></h7>
                                    </div>
                                    <div class="prt-product-btn">
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor mr" href="{{ route('CustomerPlant.all') }}">View More</a>

                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-product style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="280" class="img-fluid" src="{{ asset('PublicArea/images/plants/alovera.jpg') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="#">Aloe Vera</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <h7><a href="#">Aloe Barbadensis</a></h7>
                                    </div>
                                    <div class="prt-product-btn">
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor mr" href="{{ route('CustomerPlant.all') }}">View More</a>

                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-product style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="280" class="img-fluid" src="{{ asset('PublicArea/images/plants/lemmon.png') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="#">Lemon</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <h7><a href="#">Citrus Limon</a></h7>
                                    </div>
                                    <div class="prt-product-btn">
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor mr" href="{{ route('CustomerPlant.all') }}">View More</a>

                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-product style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="280" class="img-fluid" src="{{ asset('PublicArea/images/plants/sandawood.jpeg') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="#">Sandalwood</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <h7><a href="#">Santalum Album</a></h7>
                                    </div>
                                    <div class="prt-product-btn">
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor mr" href="{{ route('CustomerPlant.all') }}">View More</a>

                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-product style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="280" class="img-fluid" src="{{ asset('PublicArea/images/plants/cinnamon.jpeg') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="#">Cinnamon</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <h7><a href="#">Cinnamomum Verum</a></h7>
                                    </div>
                                    <div class="prt-product-btn">
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor mr" href="{{ route('CustomerPlant.all') }}">View More</a>

                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-7 col-lg-10 col-md-12 m-auto">
                            <div class="prt-product-text">
                                <p>Explore a wide selection of plants in our collection. <a class="prt-btn btn-inline prt-btn-color-whitecolor btn-underline" href="{{ route('CustomerPlant.all') }}">View all plants</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- product-section -->

            <!-- appointment-sectopn -->
            <section class="prt-row prt-bg bg-base-darkblack prt-bgimage-yes bg-img2 appointment-section position-relative clearfix">
                <div class="prt-row-wrapper-bg-layer prt-bg-layer bg-base-darkblack"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section title -->
                            <div class="section-title title-style-center_text">
                                <div class="title-header">
                                    <h2 class="title">Get Health</h2>
                                </div>
                            </div>
                            <!-- section title end-->
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="prt-appointment-block">
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <form action="{{ route('GetHealth.add') }}" method="POST" class="query_form wrap-form clearfix">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="text-input">
                                                        <input name="name" type="text" placeholder="Name*" required>
                                                    </span>

                                                </div>
                                                <div class="col-md-6">
                                                    <span class="text-input">
                                                        <input name="phone" type="text" placeholder="Phone*" required>
                                                    </span>

                                                </div>
                                                <div class="col-md-6">
                                                    <span class="text-input">
                                                        <input name="email" type="email" placeholder="Email*" required>
                                                    </span>

                                                </div>
                                                <div class="col-md-6">
                                                    <span class="text-input">
                                                        <input name="subject" type="text" placeholder="Subject*" required>
                                                    </span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <span class="text-input">
                                                <textarea name="massage" rows="4" placeholder="Massage*" required></textarea>
                                            </span>

                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-darkcolor" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- appointment-sectopn end-->

            <!-- info-section -->
            <section class="prt-row padding_zero-section prt-bg bg-base-skin info-section clearfix ">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">

                        </div>
                    </div>
                </div>
            </section>
            <!-- info-section -->

            <!--blog-section-->
            <section class="prt-row blog-section animation clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12 ">
                            <div class="">
                                <!-- section title -->
                                <div class="section-title mb-45 res-991-mb-30">
                                    <div class="title-header">
                                        <h2 class="blog-title">Our latest stories</h2>
                                    </div>
                                    <div class="title-desc">
                                        <p>Stay informed and inspired with our freshest content, delivering insights and stories that matter.</p>
                                        <a class="prt-btn btn-inline prt-btn-color-darkcolor btn-underline" href="{{ route('CustomerBlog.all') }}">View all stories</a>
                                    </div>
                                </div>
                                <!-- section title end-->
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row fadeup-amin">
                        <div class="col-lg-3 col-md-4 col-sm-12 ">
                            <!-- featured-imagebox-post -->
                            <div class="featured-imagebox featured-imagebox-post style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="300" class="img-fluid" src="{{ asset('PublicArea/images/blog/blog-01.jpg') }}" alt="">
                                </div>
                                <!-- featured-content -->
                                <div class="featured-content">
                                    <div class="featured-content-inner">
                                        <div class="post-header">
                                            <!-- post-meta -->
                                            <div class="post-meta">
                                                <span class="prt-meta-line category">Thearpy</span>
                                                <span class="prt-meta-line time">8 min ago</span>
                                                <span class="prt-meta-line comment">10 Comment</span>
                                            </div><!-- post-meta end -->
                                            <div class="post-title featured-title">
                                                <h3><a href="blog-single.html">Revolutionizing Herbal Medicine with AI-Powered Plant Identification</a></h3>
                                            </div>

                                        </div>
                                    </div><!-- featured-content end -->
                                </div>
                            </div><!-- featured-imagebox-post end -->
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-12 prt-post-mt ">
                            <div class="pl-30 pr-30 res-1199-pl-0 res-1199-pr-0">
                                <!-- featured-imagebox-post -->
                                <div class="featured-imagebox featured-imagebox-post style1">
                                    <div class="featured-thumbnail prt-blog-img">

                                        <img width="574" height="530" class="img-fluid" src="{{ asset('PublicArea/images/blog/blog-02.jpg') }}" alt="">
                                    </div>
                                    <!-- featured-content -->
                                    <div class="featured-content">
                                        <div class="featured-content-inner">
                                            <div class="post-header">
                                                <!-- post-meta -->
                                                <div class="post-meta">
                                                    <span class="prt-meta-line category">Thearpy</span>
                                                    <span class="prt-meta-line time">8 min ago</span>
                                                    <span class="prt-meta-line comment">10 Comment</span>
                                                </div><!-- post-meta end -->
                                                <div class="post-title featured-title">
                                                    <h3><a href="blog-single.html">Ayurvedic medicine, one of the world’s oldest holistic healing systems, originated in India over 3,000 years ago.</a></h3>
                                                </div>
                                            </div>
                                        </div><!-- featured-content end -->
                                    </div>
                                </div><!-- featured-imagebox-post end -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-12 prt-post-mt ">
                            <!-- featured-imagebox-post -->
                            <div class="featured-imagebox featured-imagebox-post style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="300" class="img-fluid" src="{{ asset('PublicArea/images/blog/blog-03.jpg') }}" alt="">
                                </div>
                                <!-- featured-content -->
                                <div class="featured-content">
                                    <div class="featured-content-inner">
                                        <div class="post-header">
                                            <!-- post-meta -->
                                            <div class="post-meta">
                                                <span class="prt-meta-line category">Thearpy</span>
                                                <span class="prt-meta-line time">5 min ago</span>
                                                <span class="prt-meta-line comment">05 Comment</span>
                                            </div><!-- post-meta end -->
                                            <div class="post-title featured-title">
                                                <h3><a href="blog-single.html">Ayurvedic Therapy: Revolutionizing Healing with AI-Powered Plant Identification</a></h3>
                                            </div>

                                        </div>
                                    </div><!-- featured-content end -->
                                </div>
                            </div><!-- featured-imagebox-post end -->
                        </div>
                    </div>
                    <!-- row end -->
                </div>
            </section>
            <!--blog-section end-->



        </div><!-- site-main end-->
        @endsection

