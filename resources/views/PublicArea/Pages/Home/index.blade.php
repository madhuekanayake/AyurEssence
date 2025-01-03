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
                                                    <h3>Harmony with </h3>
                                                </div>
                                                <div class="">
                                                    <h2 class="title"><span>Ayurveda</span> Care</h2>
                                                </div>
                                                <div class="hero-slider_btn mt-10 res-991-mt-30">
                                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-skincolor mr-15 mb-10" href="contact-us.html">Make an appointment</a>
                                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-border prt-btn-color-whitecolor mb-10" href="contact-us.html">Contact us</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hero-overlay-box">
                                            <div class="prt-icon prt-icon_element-onlytxt prt-icon_element-size-lg prt-icon_element-color-darkcolor">
                                                <i class="fas fa-check-circle"></i>

                                            </div>
                                            <div><h3>Vaterian hospital services manufacture In 1996</h3></div>
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
                                                    <h2 class="title">Ayurveda</h2>
                                                </div>
                                                <div class="d-flex align-items-center mt-50 res-991-mt-30">
                                                    <div class="hero-slider_btn">
                                                        <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-skincolor mr-25 mb-10" href="contact-us.html">Make an appointment</a>
                                                    </div>
                                                    <div class="prt-hero-link">
                                                        <div class="prt-call"><i class="icon-whatsapp"></i> <a href="tel:1234567890">+123 456 7890</a></div>
                                                        <div class="prt-email"><a href="mailto:info@example.com">contact.vedacare@gmail.com</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hero-overlay-box">
                                            <div class="prt-icon prt-icon_element-onlytxt prt-icon_element-size-lg prt-icon_element-color-darkcolor">
                                                <i class="fas fa-check-circle"></i>
                                            </div>
                                            <div><h3>Vaterian hospital services manufacture In 1996</h3></div>
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

        <table id="order-listing" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Grade</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->grade }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            @if ($student->image)
                                <img src="{{ asset('uploads/student/' . $student->image) }}"
                                    alt="Student Image" width="50" height="50">
                            @else
                                N/A
                            @endif
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>

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
                                        <h2 class="title">Short story about dr. veda of nature and science.</h2>
                                    </div>
                                    <div class="title-desc">
                                        <p class="prt-about-desc">A passionate advocate for the nature and the science and united these realms, defying their separation.</p>
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
                                        <p>In her tranquil cottage on the edge of a pristine forest, she conducted groundbreaking research that brought together the wisdom of the natural world and the precision of scientific inquiry.</p>
                                    </div>
                                </div>
                                <!-- section title end-->
                                <div class="row g-0">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <ul class="prt-list prt-list-style-icon-01 pr-10 res-575-pr-0">
                                            <li class="prt-list-li-content"><i class="fas fa-user-md"></i> Professional doctors</li>
    <li class="prt-list-li-content"><i class="fas fa-flask"></i> Digital laboratory</li>
    <li class="prt-list-li-content"><i class="fas fa-calendar-check"></i> Online schedule</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <ul class="prt-list prt-list-style-icon-01">
                                            <li class="prt-list-li-content"><i class="fas fa-headset"></i> 24/7 Online support</li> <!-- Support Icon -->
                                            <li class="prt-list-li-content"><i class="fas fa-cogs"></i> High packages</li> <!-- Package Icon -->
                                            <li class="prt-list-li-btn"><a href="#"><i class="fas fa-arrow-right"></i> View more</a></li> <!-- Arrow Icon -->
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

                                    <img width="303" height="280" class="img-fluid" src="{{ asset('PublicArea/images/product/product-img-01.png') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="#">Acupuncture slipper</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p><span><a href="#">$329.00</a></span> <a href="#">$149.00</a></p>
                                    </div>
                                    <div class="prt-product-btn">
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor mr" href="#">Buy now</a>
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor" href="#">Add to card</a>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-product style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="280" class="img-fluid" src="{{ asset('PublicArea/images/product/product-img-02.png') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="#">Massage stone</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p><span><a href="#">$120.00</a></span> <a href="#">$80.00</a></p>
                                    </div>
                                    <div class="prt-product-btn">
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor mr" href="#">Buy now</a>
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor" href="#">Add to card</a>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-product style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="280" class="img-fluid" src="{{ asset('PublicArea/images/product/product-img-03.png') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="#">Teak massager</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p><span><a href="#">$160.00</a></span> <a href="#">$100.00</a></p>
                                    </div>
                                    <div class="prt-product-btn">
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor mr" href="#">Buy now</a>
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor" href="#">Add to card</a>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-product style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="280" class="img-fluid" src="{{ asset('PublicArea/images/product/product-img-04.png') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="#">Wooden bodycalf</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p><span><a href="#">$100.00</a></span> <a href="#">$90.00</a></p>
                                    </div>
                                    <div class="prt-product-btn">
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor mr" href="#">Buy now</a>
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor" href="#">Add to card</a>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-product style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="280" class="img-fluid" src="{{ asset('PublicArea/images/product/product-img-05.jpg') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="#">Herbal medicine</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p><span><a href="#">$100.00</a></span> <a href="#">$90.00</a></p>
                                    </div>
                                    <div class="prt-product-btn">
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor mr" href="#">Buy now</a>
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor" href="#">Add to card</a>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-product style1">
                                <div class="featured-thumbnail">

                                    <img width="303" height="280" class="img-fluid" src="{{ asset('PublicArea/images/product/product-img-06.jpg') }}" alt="img">
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3><a href="#">Massage brush</a></h3>
                                    </div>
                                    <div class="featured-desc">
                                        <p><span><a href="#">$80.00</a></span> <a href="#">$50.00</a></p>
                                    </div>
                                    <div class="prt-product-btn">
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor mr" href="#">Buy now</a>
                                        <a class="prt-btn prt-btn-size-sm prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor" href="#">Add to card</a>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-7 col-lg-10 col-md-12 m-auto">
                            <div class="prt-product-text">
                                <p>Explore a wide selection of products in our inventory <a class="prt-btn btn-inline prt-btn-color-whitecolor btn-underline" href="#">View all products</a></p>
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
                                    <h2 class="title">Explain your health problem</h2>
                                </div>
                            </div>
                            <!-- section title end-->
                        </div>
                    </div>
                    <div class="row mt-25">
                        <div class="col-lg-12">
                            <div class="prt-appointment-block">
                                <form action="#" class="query_form wrap-form clearfix" method="post">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="text-input">
                                                        <input name="name" type="text" value="" placeholder="Name*" required="required">
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="text-input">
                                                        <input name="phone" type="text" value="" placeholder="Phone*" required="required">
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="text-input select-option">
                                                         <select id="subject" name="user_state">
                                                            <option value="select-subject">Subject*</option>
                                                            <option value="subject1">General Medicine</option>
                                                            <option value="subject2">Pediatrics</option>
                                                            <option value="subject3">Detox & Rejuvenation</option>
                                                            <option value="subject4">Eye, ENT & Dental Care</option>
                                                        </select>
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                   <span class="text-input">
                                                        <input name="date" type="date" value="" required="required">
                                                   </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <span class="text-input">
                                                <textarea name="message" rows="4" placeholder="Message*" required="required"></textarea>
                                            </span>
                                        </div>
                                        <div class="col-md-12 text-center">
                                           <button class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-darkcolor" type="submit">Make a appointment</button>
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
                            <div class="prt-info-main-block">
                                <div class="info_btn mr-30 res-767-mb-15">
                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round  prt-btn-style-border prt-btn-color-darkcolor" href="#">COVID-19 resources</a>
                                </div>
                                <!-- featured-icon-box -->
                                <div class="featured-icon-box icon-align-before-content style2">
                                    <div class="featured-icon">
                                        <div class="prt-icon prt-icon_element-onlytxt prt-icon_element-size-lg prt-icon_element-color-darkcolor">
                                            <i class="fas fa-exclamation-triangle"></i>
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
                                        <a class="prt-btn btn-inline prt-btn-color-darkcolor btn-underline" href="#">View all stories</a>
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
                                                <h3><a href="blog-single.html">Here’s the top promising shopify template of – 2023</a></h3>
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
                                                    <h3><a href="blog-single.html">Best lawyer services HTML template listed as multilingual WPML compatible</a></h3>
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
                                                <h3><a href="blog-single.html">Get the best opencart template for the medical</a></h3>
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

            <!-- cta-sectopn -->
            <section class="prt-row prt-bg bg-base-grey padding_zero-section cta-section01 clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 col-lg-12 m-auto">
                            <div class="prt-cta-mainblock ">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="prt-cta-call">
                                        <p>Looking for consultation? <a href="tel:1234567890">+1 3333 000 444</a></p>
                                    </div>
                                    <div class="prt-cta-title"><h3>We are <span>certified</span> ayurved company</h3></div>
                                </div>
                                <div class="prt-cta-btn res-1199-mt-30">
                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor ml-20" href="contact-us.html">Contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cta-sectopn end-->

        </div><!-- site-main end-->
        @endsection

