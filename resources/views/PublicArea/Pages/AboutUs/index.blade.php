@extends('PublicArea.Layout.main')
@section('container')
    <!-- page-title -->
    <div class="prt-page-title-row style1">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-8 col-md-10 col-sm-9 ms-auto">
                        <div class="prt-schedule">
                            <div class="prt-schedule-title">
                                <h2>Opening hours</h2>
                                <p>Just make an appointment & you're done!</p>
                            </div>
                            <div class="row mt-40 res-575-mt-20">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="prt-schedule-block">
                                        <h3>Monday to Thursday</h3>
                                        <p>9.30 am – 6.30 pm</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="prt-schedule-block">
                                        <h3>Friday to Sunday</h3>
                                        <p>11.00 am – 5.00 pm</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10">
                                <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-border prt-btn-color-whitecolor"
                                    href="contact-us.html">Make a appointment</a>
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

        <!-- about-section -->
        <section class="prt-row about-section01 clearfix" data-aos="fade-up" data-aos-duration="1000">
            <div class="container">
                <div class="row row-equal-height">
                    <div class="col-xl-4 col-lg-6 col-md-12">
                        <!-- col-bg-img-one -->
                        <div class="col-bg-img-one prt-bg prt-col-bgimage-yes bg-base-darkblack spacing-1 border-rad_10">
                            <div class="prt-col-wrapper-bg-layer prt-bg-layer border-rad_10">
                                <div class="prt-col-wrapper-bg-layer-inner border-rad_10"></div>
                            </div>
                            <div class="layer-content">
                                <div class="prt-about-block1">
                                    <h3>Exploring the wellness through the <span class="text-base-skin">ayurvedic</span>
                                        solutions</h3>
                                </div>
                                <ul class="prt-list prt-list-style-icon-02 mt-30 res-991-mt-15">
                                    <li class="prt-list-li-content">Customized wellness plans</li>
                                    <li class="prt-list-li-content"> Holistic lifestyle integration </li>
                                    <li class="prt-list-li-content">Education and empowerment</li>
                                </ul>
                                <div class="mt-40">
                                    <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-border prt-btn-color-whitecolor w-100"
                                        href="#">Explore our solutions</a>
                                </div>
                            </div>
                        </div>
                        <!-- col-bg-img-one end -->
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12">
                        <!-- col-bg-img-one -->
                        <div
                            class="col-bg-img-two prt-bg prt-col-bgimage-yes bg-base-dark spacing-1 border-rad_10 res-991-mt-30">
                            <div class="prt-col-wrapper-bg-layer prt-bg-layer border-rad_10">
                                <div class="prt-col-wrapper-bg-layer-inner border-rad_10"></div>
                            </div>
                            <div class="layer-content text-start">
                                <div class="prt-about-block1">
                                    <h3>Discover our various ayurvedic essence with your path to wellness begins here</h3>
                                </div>
                                <div class="mt-20a">
                                    <a class="prt-btn btn-inline prt-btn-color-whitecolor btn-underline" href="#">View
                                        more</a>
                                </div>
                                <div class="row mt-80 res-991-mt-40">
                                    <div class="col-lg-6 col-md-4 col-sm-5">
                                        <!--prt-fid-->
                                        <div class="prt-fid inside style1">
                                            <div class="prt-fid-contents">
                                                <h4 class="prt-fid-inner">
                                                    <span data-appear-animation = "animateDigits"
                                                        data-from             = "0" data-to               = "25"
                                                        data-interval         = "1" data-before           = ""
                                                        data-before-style     = "sup" data-after            = "+"
                                                        data-after-style      = "sub">25</span>
                                                    <span>+</span>
                                                </h4>
                                                <div class="fid-contents">
                                                    <h3 class="prt-fid-title">Years of experience</h3>
                                                </div>
                                            </div>
                                        </div><!-- prt-fid end-->
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-sm-7">
                                        <!--prt-fid-->
                                        <div class="prt-fid inside style1 res-575-mt-20">
                                            <div class="prt-fid-contents">
                                                <h4 class="prt-fid-inner">
                                                    <span data-appear-animation = "animateDigits"
                                                        data-from             = "0" data-to               = "53"
                                                        data-interval         = "2" data-before           = ""
                                                        data-before-style     = "sup" data-after            = "+"
                                                        data-after-style      = "sub">53</span>
                                                    <span>+</span>
                                                </h4>
                                                <div class="fid-contents">
                                                    <h3 class="prt-fid-title">Happy customers</h3>
                                                </div>
                                            </div>
                                        </div><!-- prt-fid end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- col-bg-img-one end -->
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-12">
                        <!-- featured-image-box -->
                        <div class="featured-image-box res-1199-mt-30">
                            <div class="featured-thumbnail">

                                <img width="413" height="200" class="img-fluid w-100"
                                    src="{{ asset('PublicArea/images/single-img-03.jpg') }}" alt="image">
                            </div>
                            <div class="featured-content">
                                <div class="featured-title">
                                    <h3>Our mission</h3>
                                </div>
                                <div class="featured-desc">
                                    <p>Our mission lays a commitment to bring the profound benefits of ayurveda to people
                                        from all walks of life.</p>
                                </div>
                            </div>
                        </div>
                        <!-- featured-image-box end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end-->

        <!--padding_zero-section-->
        <section class="prt-row padding_zero-section pt-50 res-991-pt-0 clearfix">
            <div class="container">
                <div class="row g-0">
                    <div class="col-lg-12">
                        <div class="row g-0">
                            <div class="col-lg-6 col-md-12">
                                <!-- col-bg-img-three -->
                                <div
                                    class="col-bg-img-three prt-bg prt-col-bgimage-yes bg-base-darkblack prt-left-span spacing-3">
                                    <div class="prt-col-wrapper-bg-layer prt-bg-layer">
                                        <div class="prt-col-wrapper-bg-layer-inner"></div>
                                    </div>
                                    <div class="layer-content">
                                        <div class="prt-quotes-block" data-aos="fade-up" data-aos-duration="1000">
                                            <!-- featured-icon-box -->
                                            <div class="featured-icon-box icon-align-before-content style3">
                                                <div class="featured-icon">
                                                    <div
                                                        class="prt-icon prt-icon_element-onlytxt prt-icon_element-size-lg prt-icon_element-color-darkcolor">
                                                        <img width="56" height="44" src="{{ asset('PublicArea/images/icon-07.png') }}"
                                                            class="img-fluid" alt="icon">
                                                    </div>
                                                </div>
                                                <div class="featured-content">
                                                    <div class="featured-title">
                                                        <h3>Kimbery bari</h3>
                                                    </div>
                                                    <div class="featured-desc">
                                                        <p>CEO, Vedas</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- featured-icon-box end -->
                                            <div class="mt-15">
                                                <h3>We push the limits of <span>what's possible</span> for our patients.
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- col-bg-img-three end -->
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="prt-bg bg-base-grey prt-right-span spacing-2 position-relative">
                                    <div class="prt-col-wrapper-bg-layer prt-bg-layer">
                                        <div class="prt-col-wrapper-bg-layer-inner"></div>
                                    </div>
                                    <div class="layer-content">
                                        <!-- section title -->
                                        <div class="section-title ">
                                            <div class="title-header">
                                                <h2 class="title quotes-title">Welcome to veda care</h2>
                                            </div>
                                            <div class="title-desc">
                                                <p class="prt-about-desc">Our clients are our priority, we offer quality
                                                    medical services with a team of specialists.</p>
                                                <p class="mt-30">welcome to veda care, where ancient wisdom eets modern
                                                    healthcare. our mission is to nurture your well-being through
                                                    personalized <u class="headingfont-color">ayurvedic solutions.</u> with
                                                    a team of experienced practitioners and a commitment to holistic
                                                    wellness, we provide comprehensive healthcare services tailored to your
                                                    unique needs and we prioritize your health, treating not just the
                                                    symptoms but the root causes of ailments.</p>
                                                <p class="mt-10">Our state-of-the-art facilities and the client-centered
                                                    approach ensure you receive the highest quality care. join us on a
                                                    journey to optimal health and balance. welcome to veda care, your
                                                    trusted partner in wellness.</p>
                                            </div>
                                        </div>
                                        <!-- section title end-->
                                    </div>
                                </div>
                            </div>
                        </div><!-- row end -->
                    </div>
                </div>
            </div>
        </section>
        <!--padding_zero-section end-->

        <!-- team-section -->
        <section class="prt-row team-section clearfix">
            <div class="container">
                <div class="row row-equal-height" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-team style1">
                            <div class="featured-thumbnail">

                                <img width="303" height="327"
                                    src="{{ 'PublicArea/images/team-member/team-img01.png' }}" alt="image">
                            </div>
                            <div class="featured-content">
                                <div class="featured-title-box">
                                    <div class="featured-title">
                                        <h3><a href="team-details.html">Dr. Reshta wann</a></h3>
                                    </div>
                                    <div class="featured-position">
                                        <p>General doctor</p>
                                    </div>
                                </div>
                                <div class="prt-history">
                                    <p><i class="fa fa-check-circle"></i> 2214 Consultation done</p>
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
                            </div>
                        </div>
                        <!-- featured-imagebox end -->
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-team style1">
                            <div class="featured-thumbnail">

                                <img width="303" height="327"
                                    src="{{ asset('PublicArea/images/team-member/team-img03.png') }}" alt="image">
                            </div>
                            <div class="featured-content">
                                <div class="featured-title-box">
                                    <div class="featured-title">
                                        <h3><a href="team-details.html">Dr. Natalia zox</a></h3>
                                    </div>
                                    <div class="featured-position">
                                        <p>Manager</p>
                                    </div>
                                </div>
                                <div class="prt-history">
                                    <p><i class="fa fa-check-circle"></i> 1086 Consultation done</p>
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
                            </div>
                        </div>
                        <!-- featured-imagebox end -->
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-team style1">
                            <div class="featured-thumbnail">

                                <img width="303" height="327"
                                    src="{{ asset('PublicArea/images/team-member/team-img02.png') }}" alt="image">
                            </div>
                            <div class="featured-content">
                                <div class="featured-title-box">
                                    <div class="featured-title">
                                        <h3><a href="team-details.html">Dr. Gordian mon</a></h3>
                                    </div>
                                    <div class="featured-position">
                                        <p>Founder</p>
                                    </div>
                                </div>
                                <div class="prt-history">
                                    <p><i class="fa fa-check-circle"></i> 200 Consultation done</p>
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
                            </div>
                        </div>
                        <!-- featured-imagebox end -->
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <!-- featured-imagebox -->
                        <div class="featured-imagebox featured-imagebox-team style1">
                            <div class="featured-thumbnail">

                                <img width="303" height="327"
                                    src="{{ asset('PublicArea/images/team-member/team-img04.png') }}" alt="image">
                            </div>
                            <div class="featured-content">
                                <div class="featured-title-box">
                                    <div class="featured-title">
                                        <h3><a href="team-details.html">Dr. Broklyn simm</a></h3>
                                    </div>
                                    <div class="featured-position">
                                        <p>Lab technician</p>
                                    </div>
                                </div>
                                <div class="prt-history">
                                    <p><i class="fa fa-check-circle"></i> 2015 Consultation done</p>
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
                            </div>
                        </div>
                        <!-- featured-imagebox end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- team-section end -->

        <!-- faq-section -->
        <section
            class="prt-row padding_zero-section bg-layer-equal-height faq-section spacing-5 z-index_1 position-relative clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 spacing-4">
                        <div class="accordion style1">
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#" class="active">How does ayurveda work?</a>
                                </div>
                                <div class="toggle-content show">
                                    <p>Ayurveda works by the assessing of an individual's unique constitution and using the
                                        natural remedies, diet, and lifestyle adjustments to restore balance.</p>
                                </div>
                            </div><!-- toggle end -->
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">What are the three doshas in ayurveda?</a>
                                </div>
                                <div class="toggle-content">
                                    <p>Ayurveda categorizes individuals into three the doshas and they are the vata, pitta,
                                        and kapha, each representing different elemental energies in the body.</p>
                                </div>
                            </div><!-- toggle end -->
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">What conditions can ayurveda treat?</a></div>
                                <div class="toggle-content">
                                    <p>Ayurveda can address the various health issues by including the digestive problems,
                                        stress, skin disorders, and chronic diseases, by addressing the root causes.</p>
                                </div>
                            </div><!-- toggle end -->
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">Is the ayurvedic treatment safe?</a></div>
                                <div class="toggle-content">
                                    <p>When administered by trained professionals, ayurvedic treatments are generally safe.
                                        however, consult with an ayurvedic practitioner for personalized guidance.</p>
                                </div>
                            </div><!-- toggle end -->
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">What is panchakarma in ayurveda?</a></div>
                                <div class="toggle-content">
                                    <p>Panchakarma is a detoxification and rejuvenation therapy in the ayurveda that
                                        involves the cleansing and eliminating the toxins from the body.</p>
                                </div>
                            </div><!-- toggle end -->
                            <!-- toggle -->
                            <div class="toggle prt-toggle_style_classic prt-control-right-true">
                                <div class="toggle-title"><a href="#">Are ayurvedic herbs safe to use?</a></div>
                                <div class="toggle-content">
                                    <p>Ayurvedic herbs are generally the safe when used under the great expert guidance.
                                        self-prescribing herbs may lead to adverse effects, so consult an ayurvedic
                                        practitioner.</p>
                                </div>
                            </div><!-- toggle end -->
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <!-- col-bg-img-four -->
                        <div
                            class="col-bg-img-four prt-bg prt-col-bgimage-yes bg-base-darkblack prt-right-span ml-45 res-1199-ml-0">
                            <div class="prt-col-wrapper-bg-layer prt-bg-layer">
                                <div class="prt-col-wrapper-bg-layer-inner"></div>
                            </div>
                            <div class="layer-content">
                            </div>
                        </div>
                        <!-- col-bg-img-four end -->

                        <img class="img-fluid prt-equal-height-image w-100"
                            src="{{ asset('PublicArea/images/bg-image/col-bgimage-4.jpg') }}" alt="bg-image">
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-section end-->

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

    </div><!-- site-main end-->
@endsection
