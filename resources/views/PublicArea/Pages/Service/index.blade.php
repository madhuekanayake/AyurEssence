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
                                    <h3>We are here for your care</h3>
                                    <h2 class="title">Profession mental health advisors</h2>
                                </div>
                                <div class="page-title-desc">
                                    <p>Empathetic and experienced mental health advisors providing guidance and support here to help you navigate life's challenges, fostering well-being and resilience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="prt-pagetitle-appointment-block res-991-mt-40">
                                <form action="#" class="query_form-1 wrap-form clearfix" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="text-input">
                                                <input name="name" type="text" value="" placeholder="Name*" required="required">
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="text-input select-option">
                                                <select id="subject" name="user_state">
                                                    <option value="select-subject">Subject*</option>
                                                    <option value="subject1">General Medicine</option>
                                                    <option value="subject2">Pediatrics</option>
                                                    <option value="subject3">Detox &amp; Rejuvenation</option>
                                                    <option value="subject4">Eye, ENT &amp; Dental Care</option>
                                                </select>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                           <span class="text-input">
                                                <input name="date" type="date" value="" required="required">
                                           </span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="text-input">
                                                <textarea name="message" rows="3" placeholder="Message*" required="required"></textarea>
                                            </span>
                                        </div>
                                        <div class="col-md-12 mt-20">
                                           <button class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-darkcolor" type="submit">Make a appointment</button>
                                        </div>
                                    </div>
                                </form>
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
                                            <h3>Get second free consultancy for your</h3>
                                        </div>
                                        <div class="featured-desc">
                                            <p>Claim your second free consultation and experience the great expert guidance with your journey to get the solutions just got easier.</p>
                                            <div class="mt-35">
                                                <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-border prt-btn-color-darkcolor ml-20" href="contact-us.html">Make 2nd  free appointment</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- featured-content-box end-->
                            </div>
                        </div>
                        {{-- <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->title }}</td>

                                    <td>
                                        @if ($service->image)
                                            <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image" width="100">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $service->description }}</td>

                                </tr>
                            @endforeach
                        </tbody> --}}
                        <div class="col-xl-6 col-lg-6 col-md-12">

                            <div class="row prt-stepsbox res-991-mt-20">
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    <!-- featured-content-box -->
                                    <div class="featured-content-box style1 box-1">
                                        <div class="featured-content">
                                            <div class="featured-title">
                                                <h3>01. Check doctor profile</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Explore doctors' expertise, qualifications, and reviews for confident healthcare decisions</p>
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
                                                <h3>02. Request consulting</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Seek expert advice and the solutions by requesting a consultation today.</p>
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
                                                <h3>03. Receive consulting</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Gain the valuable insights and the solutions by booking your consultation now.</p>
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
                                                <h3>04. Get your solution</h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Unlock your solution today and take the action to see the results.</p>
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

            <!-- testimonials-section -->
            <section class="prt-row testimonials-section clearfix">
                <div class="container">
                     <div class="row">
                        <div class="col-lg-12">
                            <div class="testimonials">
                                <div class="row res-1199-align-center">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="testimonials-nav">
                                            <!-- testimonial-avatar-main -->
                                            <div class="testimonial-avatar-main">
                                                <div class="testimonial-avatar">
                                                    <div class="testimonial-img">
                                                        <img width="180" height="180" class="img-fluid" src="{{ asset('PublicArea/images/testimonial/testimonial-01.png') }}" alt="testimonial-img">
                                                    </div>
                                                </div>
                                                <div class="testimonial-rating-star">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <div class="testimonial-caption">
                                                    <h3>Christina lois</h3>
                                                    <p>Chairman and founder</p>
                                                </div>
                                            </div><!-- testimonial-avatar-main end -->
                                            <!-- testimonial-avatar-main -->
                                            <div class="testimonial-avatar-main">
                                                <div class="testimonial-avatar">
                                                    <div class="testimonial-img">
                                                        <img width="180" height="180" class="img-fluid" src="{{ asset('PublicArea/images/testimonial/testimonial-02.png') }}" alt="testimonial-img">
                                                    </div>
                                                </div>
                                                <div class="testimonial-rating-star">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <div class="testimonial-caption">
                                                    <h3>Jessica brown </h3>
                                                    <p>Founder</p>
                                                </div>
                                            </div><!-- testimonial-avatar-main end -->
                                            <!-- testimonial-avatar-main -->
                                            <div class="testimonial-avatar-main">
                                                <div class="testimonial-avatar">
                                                    <div class="testimonial-img">
                                                        <img width="180" height="180" class="img-fluid" src="{{ asset('PublicArea/images/testimonial/testimonial-03.png') }}" alt="testimonial-img">
                                                    </div>
                                                </div>
                                                <div class="testimonial-rating-star">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <div class="testimonial-caption">
                                                    <h3>Kate mason</h3>
                                                    <p>Specialist</p>
                                                </div>
                                            </div><!-- testimonial-avatar-main end -->
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8">
                                        <div class="testimonials-info slick-slider mt-45 res-1199-mt-0 res-767-mt-30">
                                            <!-- testimonials -->
                                            <div class="testimonials text-center">
                                                <div class="testimonial-content">
                                                    <blockquote class="testimonial-text">Absolutely a-m-a-z-i-n-g! i have worked with quite a few themes over the years and i have to say that themetechmount have really nailed this one! it’s so easy to use, it’s versatile, it’s really well documented and their customer support is excellent! they are very helpful and very quick to reply.</blockquote>
                                                </div>
                                            </div><!-- testimonials end -->
                                            <!-- testimonials -->
                                            <!-- testimonials -->
                                            <div class="testimonials text-center">
                                                <div class="testimonial-content">
                                                    <blockquote class="testimonial-text">This theme feels like they tried to fit elementor into a pre-existing theme. no elementor theme builder components exist. header and footer are controlled by the theme options, not elementor templates. the slider revolution slider is controlled at the page level. the theme works for what it is, but it requires theme option changes.</blockquote>
                                                </div>
                                            </div><!-- testimonials end -->
                                            <!-- testimonials -->
                                            <!-- testimonials -->
                                            <div class="testimonials text-center">
                                                <div class="testimonial-content">
                                                    <blockquote class="testimonial-text">Template options can be overridden, but that requires more dev work than expected. i would only recommend this theme if the exact template from the demo will work for you. also, not all content imports correctly which requires their support team to gain admin access into the site to fix.</blockquote>
                                                </div>
                                            </div><!-- testimonials end -->
                                            <!-- testimonials -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-3 col-lg-12"></div>
                                    <div class="col-xl-9 col-lg-12">
                                        <div class="client-box-main">
                                            <div class="client-box">
                                                <div class="client-thumbnail">
                                                    <a href="#"> <img width="158" height="31" class="img-fluid" src="{{ asset('PublicArea/images/client/client-01.png') }}" alt="image"></a>
                                                </div>
                                            </div>
                                            <div class="client-box">
                                                <div class="client-thumbnail">
                                                    <a href="#"> <img width="158" height="31" class="img-fluid" src="{{ asset('PublicArea/images/client/client-02.png') }}" alt="image"></a>
                                                </div>
                                            </div>
                                            <div class="client-box">
                                                <div class="client-thumbnail">
                                                    <a href="#"> <img width="158" height="31" class="img-fluid" src="{{ asset('PublicArea/images/client/client-03.png') }}" alt="image"></a>
                                                </div>
                                            </div>
                                            <div class="client-box">
                                                <div class="client-thumbnail">
                                                    <a href="#"> <img width="158" height="31" class="img-fluid" src="{{ asset('PublicArea/images/client/client-04.png') }}" alt="image"></a>
                                                </div>
                                            </div>
                                            <div class="client-box">
                                                <div class="client-thumbnail">
                                                    <a href="#"> <img width="158" height="31" class="img-fluid" src="{{ asset('PublicArea/images/client/client-05.png') }}" alt="image"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonials-section end-->

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
                                        <a class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-darkcolor" href="contact-us.html">Contact us now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="prt_single_image-wrapper cta-img mt-40 res-991-mt-20" data-cursor-tooltip="">
                                <div class="prt_single_image-wrapper">
                                    <a href="team-details.html"><img width="1920" height="400" class="img-fluid" src="{{ asset('PublicArea/images/single-img-05.png') }}" alt="image"></a>
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

        </div><!-- site-main end-->

@endsection
