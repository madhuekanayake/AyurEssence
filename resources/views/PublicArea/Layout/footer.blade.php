        <!-- footer start -->
        <footer class="footer widget-footer bg-base-dark text-base-white overflow-hidden clearfix">
            <div class="second-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="footer-widget-box prt-pr">
                                <h3 class="widget-title-h3">Quick link</h3>
                                <div class="footer-menu-links">
                                    <ul class="footer-menu-list">
                                        <li class="footer-menu-item"><a href="{{ route('ImageUpload.all') }}" class="footer-menu-item-link">Plant Identification</a></li>
                                        <li class="footer-menu-item"><a href="{{ route('CustomerPlant.all') }}" class="footer-menu-item-link">Plants</a></li>
                                        <li class="footer-menu-item"><a href="{{ route('ShopPlants.index') }}" class="footer-menu-item-link">Shop</a></li>
                                        <li class="footer-menu-item"><a href="{{ route('CustomerBlog.all') }}" class="footer-menu-item-link">Education</a></li>
                                        <li class="footer-menu-item"><a href="{{ route('CustomerLocations.herbalGardensAll') }}" class="footer-menu-item-link">Location</a></li>

                                    </ul>
                                </div>
                                <!-- Newsletter -->
                                <div class="newsletter-form-main clearfix">
                                    <h3 class="widget-title-h3">Our newsletter</h3>
                                    <div class="widget-form">
                                        <form id="subscribe-form" class="newsletter-form" method="post" action="{{ route('ContactUs.newsLetterAdd') }}" data-mailchimp="true">
                                            @csrf
                                            <div class="mailchimp-inputbox clearfix" id="subscribe-content">
                                                <p>
                                                    <input type="email" name="email" placeholder="Name*" required=""></p>
                                                <button class="submit" type="submit">Go</button>
                                            </div>
                                            <p class="cookies">
                                                <input type="checkbox" name="cookies-consent" id="cookies-consent1">
                                                <label for="cookies-consent1"></label>
                                                I agree to all terms and conditions
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="footer-widget-box">
                                <div class="footer-img">

                                    <a href="#"><img width="441" height="385" class="img-fluid w-100 border-rad_10" src="{{ asset('PublicArea/images/footer.jpeg') }}" alt="image"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="footer-widget-box prt-pl">
                                <h3 class="widget-title-h3">Contact</h3>
                                <ul class="prt-list footer-cta-list">
                                    <li class="list-items">SL: <a href="tel:1234567890">+94 222 468 5678</a></li>
                                    <li class="list-items">59 Street, Kandy, Sri Lanka</li>
                                    <li class="list-items"><a href="tel:1234567890">contact.ayuressence@gmail.com</a></li>
                                </ul>
                                <!-- social-icons -->
                                <div class="social-icons">
                                    <h3 class="widget-title-h3">Follow on social media</h3>
                                    <ul class="footer-social-icons">
                                        <li class="footer-social-icons-item">
                                            <a href="#" target="_blank" class="footer-social-icons-link">Facebook</a>
                                        </li>
                                        <li class="footer-social-icons-item">
                                            <a href="#" target="_blank" class="footer-social-icons-link">Dribbble</a>
                                        </li>
                                        <li class="footer-social-icons-item">
                                            <a href="#" target="_blank" class="footer-social-icons-link">Behance</a>
                                        </li>
                                        <li class="footer-social-icons-item">
                                            <a href="#" target="_blank" class="footer-social-icons-link">Pinterest</a>
                                        </li>
                                        <li class="footer-social-icons-item">
                                            <a href="#" target="_blank" class="footer-social-icons-link">Instagram</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="copyright ">
                                    <div class="copyright-text">
                                        <ul class="footer-nav-menu">
                                            <li><a href="#"> Privacy policy </a></li>
                                            <li><a href="#"> Terms and conditions</a></li>
                                            <li><a href="#"> Help </a></li>
                                        </ul>
                                        <div class="cpy-text">
                                            <p>2025 AyurEssence © All rights reserved</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer">
                <div class="container-fluid p-0">

                </div>
            </div>
        </footer>
        <!-- footer end -->

    </div><!-- page end -->

    <!-- Javascript -->


</body>
</html>
