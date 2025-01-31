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
                                <h2 class="title">Meetings & Events Details</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url('/') }}">Home</a>
                                </span>
                                <span>Meetings And Events Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- Meeting and Events View Page -->
    <div class="site-main">
        <section class="prt-row meeting and events-details-section clearfix">
            <div class="container">
                <div class="row">
                    <!-- Meeting and Events Details -->
                    <div class="col-lg-6">
                        <div class="plant-card p-4"
                            style="border: 0.5px solid #ddd; border-radius: 0px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">


                            @if ($meeting_and_events)
                                @if ($meeting_and_events->image)
                                    <div class="event-image text-center">
                                        <img class="img-fluid rounded shadow-lg"
                                            src="{{ asset('storage/' . $meeting_and_events->image) }}"
                                            alt="{{ $meeting_and_events->title }}"
                                            style="width: 100%; height: 500px; object-fit: cover;">
                                    </div>
                                @endif

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="meeting_and_events-info">

                            <h4 class="mt-3 text-dark font-weight-bold">{{ $meeting_and_events->title }}</h4>

                            <p><strong>Start Date:</strong> {{ $meeting_and_events->startDate }}</p>
                            <p> <strong>End Date:</strong> {{ $meeting_and_events->endDate }}</p>
                            <p> <strong>Start Time:</strong> {{ $meeting_and_events->startTime }}</p>
                            <p> <strong>End Time:</strong> {{ $meeting_and_events->endTime }}</p>
                            <p><strong>Contact Number:</strong> {{ $meeting_and_events->contactNo }}</p>
                            <p> <strong>Content:</strong> {{ Str::limit(strip_tags($meeting_and_events->content), 150) }}
                            </p>
                            <p> <strong>Description:</strong> {{ $meeting_and_events->description }}</p>
                        </div>
                    @else
                        <p class="text-muted text-center">No meeting or event details available at the moment.</p>
                        @endif
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>


    <!-- Meeting and Events View Page End -->
@endsection

