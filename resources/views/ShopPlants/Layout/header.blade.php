<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags must come first in the head; any other head content must come after these tags -->

    <!-- Title -->
    <title>Ayur Essence &amp; Shop Plants</title>



</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/leaf.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ** Top Header Area ** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->
                            <div class="top-header-meta">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="infodeercreative@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: ayuressenceshopplants@gmail.com</span></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: +94 547 893 567</span></a>
                            </div>

                            <!-- Top Header Content -->
                            <div class="top-header-meta d-flex">
                                <!-- Language Dropdown -->

                                <!-- Login -->
                                {{-- <div class="login">
                                    <a href="{{ route('auth.index') }}"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>
                                </div> --}}
                                <div class="login">
                                    @if(session()->has('customer_email') && session()->has('customer_id'))
                                        <div class="login">
                                            <a href="#"><i class="fa fa-user" aria-hidden="true"></i>
                                                <span>{{ session('customer_email') }}</span>
                                            </a>
                                            <a href="{{ route('orders.show') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Orders</a>
                                            <a href="{{ route('auth.logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                        </div>
                                    @else
                                        <div class="login">
                                            <a href="{{ route('auth.index') }}"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>
                                        </div>
                                    @endif
                                </div>


                                <!-- Cart -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ** Navbar Area ** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="index.html" class="nav-brand">
                            <h3 style="color: white;"> Ayur Essence </h3>
                        </a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{ route('ShopPlants.index') }}">Home</a></li>


                                    <li><a href="{{ route('ShopProduct.all') }}">Shop</a></li>
                                    <li><a href="{{ route('ShopProductPortfolio.all') }}">Portfolio</a></li>
                                    <li><a href="{{ route('cart.show') }}">Cart</a></li>

                                </ul>

                                <!-- Search Icon -->

                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>


                </div>
            </div>
        </div>
    </header>
