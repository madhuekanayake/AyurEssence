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
                                    <h2 class="title">Conservation & Awareness</h2>
                                </div>
                                <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="{{ url('/') }}">Home</a>
                                    </span>
                                    <span>Conservation And Awareness</span>
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

            <!--blog-section-->
            <section class="prt-row blog-section prt-blog-single clearfix">
                <div class="container">
                    <div class="row">
                        @foreach ($conservation_awarenesses as $item)
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                <!-- featured-imagebox-post -->
                                <div class="featured-imagebox featured-imagebox-post style1">
                                    <div class="featured-thumbnail">
                                        @if ($item->image)
                                            <img width="303" height="300" class="img-fluid" src="{{ asset('storage/' . $item->image) }}" alt="Meeting And Event Image">
                                        @else
                                            <img width="303" height="300" class="img-fluid" src="{{ asset('PublicArea/images/default-image.jpg') }}" alt="Default Image">
                                        @endif
                                    </div>
                                    <!-- featured-content -->
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3>
                                                <a href="{{ url('conservationAndawarenesses-details/' . $item->id) }}">{{ $item->endangeredStatus }}</a>
                                            </h3>
                                        </div>

                                        <div class="featured-desc">
                                            <p>
                                                <strong>Sustainable Harvesting:</strong> {{ $item->sustainableHarvesting }}
                                                <a href="{{ route('ConservationAndAwareness.details', $item->id) }}" class="prt-btn btn-inline prt-btn-color-darkcolor btn-underline">
                                                    Read More..
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- featured-imagebox-post end -->
                            </div><!-- col-lg-4 end -->
                        @endforeach
                    </div><!-- row end -->
                </div><!-- container end -->
            </section>



            <!--blog-section end-->



        </div><!-- site-main end-->

@endsection
