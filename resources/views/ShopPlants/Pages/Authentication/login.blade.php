@extends('ShopPlants.Layout.main')
@section('ShopPlantsContainer')


    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('ShopPlants/img/bg-img/24.jpg') }}');">
            <h2>Login</h2>
        </div>



        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->



    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
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

                            <!-- Display Error Message -->
                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <form action="{{ route('auth.login') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn alazea-btn mt-15">Login</button>
                                </div>

                                <div class="col-12 mt-3">
                                    <a href="{{ route('auth.index2') }}">Don't have an account? Register here</a>
                                </div>
                                <div class="col-12 mt-3">
                                    <a href="{{ route('auth.google') }}" class="btn btn-danger">
                                        <i class="fab fa-google"></i>  Login with Google
                                    </a>
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
    <!-- ##### Contact Area End ##### -->

@endsection
