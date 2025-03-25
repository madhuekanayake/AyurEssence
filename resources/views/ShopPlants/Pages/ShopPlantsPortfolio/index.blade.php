@extends('ShopPlants.Layout.main')
@section('ShopPlantsContainer')


<!-- ##### Breadcrumb Area Start ##### -->
<div class="breadcrumb-area">
    <!-- Top Breadcrumb Area -->
    <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('ShopPlants/img/bg-img/22.jpg') }}');">

        <h2>PORTFOLIO</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('ShopPlants.index') }}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcrumb Area End ##### -->

<!-- ##### Portfolio Area Start ##### -->
<section class="alazea-portfolio-area portfolio-page section-padding-0-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>OUR PORTFOLIO</h2>
                    <p>We devote all of our experience and resources to create stunning plant arrangements.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($portfolios as $portfolio)
                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-portfolio-item">
                        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" class="img-fluid">
                        <div class="portfolio-hover-overlay">
                            <a href="{{ asset('storage/' . $portfolio->image) }}" class="portfolio-img d-flex align-items-center justify-content-center" title="{{ $portfolio->title }}">
                                <div class="port-hover-text">
                                    <h3>{{ $portfolio->title }}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- ##### Portfolio Area End ##### -->



@endsection


