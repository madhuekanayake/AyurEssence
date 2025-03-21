@extends('ShopPlants.Layout.main')
@section('ShopPlantsContainer')


<section class="hero-area">
    <div class="hero-post-slides owl-carousel">

        <!-- Single Hero Post -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url(img/bg-img/1.jpg);"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>Discover the Essence of Ayurveda with Ayur Essence</h2>
                            <p>Experience the power of nature with our carefully selected Ayurvedic plants. From medicinal herbs to holistic wellness solutions, Ayur Essence brings you the best in traditional healing.</p>
                            <div class="welcome-btn-group">
                                <a href="{{ route('ShopProduct.all') }}" class="btn alazea-btn mr-30">SHOP NOW</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Hero Post -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url(img/bg-img/2.jpg);"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>Embrace the Healing Power of Ayurveda</h2>
                            <p>At Ayur Essence, we offer a wide range of Ayurvedic plants known for their medicinal properties. Bring the wisdom of nature into your life with our carefully selected herbs.</p>
                            <div class="welcome-btn-group">
                                <a href="{{ route('ShopProduct.all') }}" class="btn alazea-btn mr-30">SHOP NOW</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ##### Hero Area End ##### -->

<!-- ##### Service Area Start ##### -->
<section class="our-services-area bg-gray section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>OUR SERVICES</h2>
                    <p>We provide the perfect service for you.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col-12 col-lg-5">
                <div class="alazea-service-area mb-100">

                    <!-- Single Service Area -->
                    <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                        <!-- Icon -->
                        <div class="service-icon mr-30">
                            <img src="img/core-img/s1.png" alt="">
                        </div>
                        <!-- Content -->
                        <div class="service-content">
                            <h5>Organic Ayurvedic Plants</h5>
                            <p>We offer a wide range of organically grown Ayurvedic plants, carefully nurtured to provide natural healing benefits. Perfect for home remedies and traditional medicine.</p>
                        </div>
                    </div>

                    <!-- Single Service Area -->
                    <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="300ms">
                        <!-- Icon -->
                        <div class="service-icon mr-30">
                            <img src="img/core-img/s2.png" alt="">
                        </div>
                        <!-- Content -->
                        <div class="service-content">
                            <h5>Customized Herbal Solutions</h5>
                            <p>We provide personalized herbal recommendations based on your health needs. Our experts suggest the best Ayurvedic plants for immunity, digestion, skincare, and more.</p>
                        </div>
                    </div>

                    <!-- Single Service Area -->
                    <div class="single-service-area d-flex align-items-center wow fadeInUp" data-wow-delay="500ms">
                        <!-- Icon -->
                        <div class="service-icon mr-30">
                            <img src="img/core-img/s3.png" alt="">
                        </div>
                        <!-- Content -->
                        <div class="service-content">
                            <h5>Plant Care & Consultation</h5>
                            <p>Learn how to grow and maintain Ayurvedic plants effectively. Our experts provide guidance on soil, watering, sunlight, and organic pest control methods.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="alazea-video-area bg-overlay mb-100">
                    <img src="img/bg-img/23.jpg" alt="">
                    <a href="http://www.youtube.com/watch?v=7HKoqNJtMTQ" class="video-icon">
                        <i class="fa fa-play" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ##### Service Area End ##### -->

<!-- ##### About Area Start ##### -->
<section class="about-us-area section-padding-100-0">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2>ABOUT US</h2>
                    <p>Your trusted source for Ayurvedic plants and herbal solutions.</p>
                </div>
                <p>We specialize in providing high-quality Ayurvedic plants that support natural healing and wellness. Our plants are carefully cultivated to preserve their medicinal properties, ensuring you receive the best nature has to offer.</p>

                <!-- Progress Bar Content Area -->
                <div class="alazea-progress-bar mb-50">
                    <!-- Single Progress Bar -->
                    <div class="single_progress_bar">
                        <p>Rare Ayurvedic Plants</p>
                        <div id="bar1" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="90"></span>
                        </div>
                    </div>

                    <!-- Single Progress Bar -->
                    <div class="single_progress_bar">
                        <p>Customized Herbal Solutions</p>
                        <div id="bar2" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="85"></span>
                        </div>
                    </div>

                    <!-- Single Progress Bar -->
                    <div class="single_progress_bar">
                        <p>Traditional Ayurvedic Knowledge</p>
                        <div id="bar3" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="95"></span>
                        </div>
                    </div>

                    <!-- Single Progress Bar -->
                    <div class="single_progress_bar">
                        <p>Eco-friendly Cultivation</p>
                        <div id="bar4" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="80"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="alazea-benefits-area">
                    <div class="row">
                        <!-- Single Benefits Area -->
                        <div class="col-12 col-sm-6">
                            <div class="single-benefits-area">
                                <img src="img/core-img/b1.png" alt="">
                                <h5>High-Quality Ayurvedic Plants</h5>
                                <p>Our plants are organically grown to retain their natural medicinal benefits, ensuring purity and effectiveness.</p>
                            </div>
                        </div>

                        <!-- Single Benefits Area -->
                        <div class="col-12 col-sm-6">
                            <div class="single-benefits-area">
                                <img src="img/core-img/b2.png" alt="">
                                <h5>Expert Consultation</h5>
                                <p>Get personalized recommendations from our Ayurveda specialists on how to use plants for health and wellness.</p>
                            </div>
                        </div>

                        <!-- Single Benefits Area -->
                        <div class="col-12 col-sm-6">
                            <div class="single-benefits-area">
                                <img src="img/core-img/b3.png" alt="">
                                <h5>100% Organic & Natural</h5>
                                <p>We use sustainable farming methods without chemicals to maintain the authenticity of Ayurvedic herbs.</p>
                            </div>
                        </div>

                        <!-- Single Benefits Area -->
                        <div class="col-12 col-sm-6">
                            <div class="single-benefits-area">
                                <img src="img/core-img/b4.png" alt="">
                                <h5>Eco-Friendly & Sustainable</h5>
                                <p>We are committed to preserving nature through responsible farming practices that benefit both people and the environment.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="border-line"></div>
            </div>
        </div>
    </div>
</section>

<!-- ##### About Area End ##### -->



<!-- ##### Product Area End ##### -->

<!-- ##### Blog Area Start ##### -->
<section class="alazea-blog-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>LATEST NEWS</h2>
                    <p>Stay updated with insights on Ayurvedic plants and natural healing</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <!-- Single Blog Post Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-post mb-100">
                    <div class="post-thumbnail mb-30">
                        <a href="single-post.html"><img src="img/bg-img/6.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <a href="single-post.html" class="post-title">
                            <h5>The Healing Power of Neem: Benefits and Uses</h5>
                        </a>
                        <div class="post-meta">
                            <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 10 Mar 2025</a>
                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Dr. Anjali Kumar</a>
                        </div>
                        <p class="post-excerpt">Neem has been used in Ayurveda for centuries to treat skin disorders, boost immunity, and purify the blood. Discover its numerous benefits.</p>
                    </div>
                </div>
            </div>

            <!-- Single Blog Post Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-post mb-100">
                    <div class="post-thumbnail mb-30">
                        <a href="single-post.html"><img src="img/bg-img/7.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <a href="single-post.html" class="post-title">
                            <h5>Ashwagandha: The Natural Stress Reliever</h5>
                        </a>
                        <div class="post-meta">
                            <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 5 Mar 2025</a>
                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Dr. Ravi Sharma</a>
                        </div>
                        <p class="post-excerpt">Ashwagandha is known for its adaptogenic properties that help reduce stress and improve mental clarity. Learn how to incorporate it into your daily routine.</p>
                    </div>
                </div>
            </div>

            <!-- Single Blog Post Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-blog-post mb-100">
                    <div class="post-thumbnail mb-30">
                        <a href="single-post.html"><img src="img/bg-img/8.jpg" alt=""></a>
                    </div>
                    <div class="post-content">
                        <a href="single-post.html" class="post-title">
                            <h5>Turmeric: The Golden Spice for Immunity</h5>
                        </a>
                        <div class="post-meta">
                            <a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 1 Mar 2025</a>
                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Dr. Priya Mehta</a>
                        </div>
                        <p class="post-excerpt">Turmeric contains curcumin, a powerful antioxidant that boosts immunity and reduces inflammation. Discover its benefits for overall wellness.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ##### Blog Area End ##### -->

<!-- ##### Subscribe Area Start ##### -->
<section class="subscribe-newsletter-area" style="background-image: url(img/bg-img/subscribe.png);">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading mb-0">
                    <h2>Join the Newsletter</h2>
                    <p>Subscribe to our newsletter and get 10% off your first purchase</p>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="subscribe-form">
                    <form action="#" method="get">
                        <input type="email" name="subscribe-email" id="subscribeEmail" placeholder="Enter your email">
                        <button type="submit" class="btn alazea-btn">SUBSCRIBE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Subscribe Side Thumbnail -->
    <div class="subscribe-side-thumb wow fadeInUp" data-wow-delay="500ms">
        <img class="first-img" src="img/core-img/leaf.png" alt="">
    </div>
</section>
<!-- ##### Subscribe Area End ##### -->

<!-- ##### Contact Area Start ##### -->
<section class="contact-area section-padding-100-0">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2>GET IN TOUCH</h2>
                    <p>Send us a message, we will call back later</p>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area mb-100">
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-name" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="contact-email" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn alazea-btn mt-15">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <!-- Google Maps -->
                <div class="map-area mb-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3581.3721301916844!2d80.62970163747971!3d7.292490532348231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae366266498acd3%3A0x411a3818a1e03c35!2sKandy!5e1!3m2!1sen!2slk!4v1742583583754!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
