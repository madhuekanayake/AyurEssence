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
                                    <h2 class="title">Medicinal Treatments</h2>
                                </div>
                                <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="{{ url('/') }}">Home</a>
                                    </span>
                                    <span>Treatments</span>
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

            <!--treatment-section-->
            <section class="prt-row prt-bg bg-base-grey treatment-section clearfix">
                <div class="container">
                    <div class="row row-equal-height" data-aos="fade-up" data-aos-duration="1000">

                        @foreach ($treatments as $treatment)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-box -->
                            <div class="featured-box style2">
                                <div class="featured-thumbnail">
                                    @if ($treatment->images->isNotEmpty())
                                        <img width="413" height="150" class="img-fluid" src="{{ asset('storage/' . $treatment->images->first()->image) }}" alt="Treatment Image">
                                    @else
                                        <img width="413" height="150" class="img-fluid" src="{{ asset('PublicArea/images/treatment/default-image.png') }}" alt="Default Image">
                                    @endif
                                </div>


                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>
                                            <a href="{{ url('treatment-details/' . $treatment->id) }}">{{ $treatment->name }}</a>
                                        </h3>
                                    </div>

                                    <div class="featured-desc">
                                        <p>
                                            {{ Str::limit(strip_tags($treatment->content), 150) }}
                                            <a href="{{ route('CustomerTreatment.details', $treatment->id) }}" class="prt-btn btn-inline prt-btn-color-darkcolor btn-underline">
                                                Read More..
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-box end-->
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>
            <!--treatment-section end-->

        </div><!-- site-main end-->

@endsection

@push('css')
<style>
    .featured-thumbnail img {
        border-radius: 10px;
        overflow: hidden;
    }
</style>
@endpush
