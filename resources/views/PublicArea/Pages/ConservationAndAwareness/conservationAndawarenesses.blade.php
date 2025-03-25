@extends('PublicArea.Layout.main')

@section('container')
    <!-- Page Title -->
    <div class="prt-page-title-row">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="prt-page-title-row-heading">
                            <div class="page-title-heading">
                                <h2 class="title">Conservation & Awareness Details</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url('/') }}">Home</a>
                                </span>
                                <span>Conservation And Awareness Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title End -->


    <!-- Conservation Awarenesses View Page -->
    <div class="site-main">
        <section class="prt-row meeting and events-details-section clearfix">
            <div class="container">
                <div class="row">
                    <!-- Conservation Awarenesses Details -->
                    <div class="col-lg-6">
                        <div class="plant-card p-4"
                            style="border: 0.5px solid #ddd; border-radius: 0px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">


                            @if ($conservation_awarenesses)
                                @if ($conservation_awarenesses->image)
                                    <div class="event-image text-center">
                                        <img class="img-fluid rounded shadow-lg"
                                            src="{{ asset('storage/' . $conservation_awarenesses->image) }}"
                                            alt="{{ $conservation_awarenesses->endangeredStatus }}"
                                            style="width: 100%; height: 500px; object-fit: cover;">
                                    </div>
                                @endif

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="conservation_awarenesses-info">

                            <h4 class="mt-3 text-dark font-weight-bold">{{ $conservation_awarenesses->endangeredStatus }}
                            </h4>

                            <p><strong>Sustainable Harvesting:</strong>
                                {{ $conservation_awarenesses->sustainableHarvesting }}</p>
                            <p><strong>Reforestation Projects:</strong>
                                {{ $conservation_awarenesses->reforestationProjects }}</p>
                            <p><strong>Biodiversity Importance:</strong>
                                {{ $conservation_awarenesses->biodiversityImportance }}</p>

                        </div>
                    @else
                        <p class="text-muted text-center">No Conservation and Awarenesses Details available at the moment.
                        </p>
                        @endif
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>


    <!-- Meeting and Events View Page End -->
@endsection
