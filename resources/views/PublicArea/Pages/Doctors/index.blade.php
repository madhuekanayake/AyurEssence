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

    <!-- Search Form -->
    <div class="container mt-4">
        <form action="{{ route('CustomerDoctor.all') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by doctor's name" value="{{ request('search') }}" style="width: 100px; height: 40px;">
                <button class="btn btn-outline-secondary ms-2" type="submit" style="height: 40px;">Search</button>
            </div>
        </form>
    </div>



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
    </div><!-- site-main end-->
@endsection
