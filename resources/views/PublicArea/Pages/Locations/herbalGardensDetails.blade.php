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
                                <h2 class="title">Herbal Gardens Details</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url('/') }}">Home</a>
                                </span>
                                <span>Herbal Gardens Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- Blog Details Section -->
    <div class="site-main">
        <section class="prt-row blog-details-section clearfix">
            <div class="container">
                <div class="row">
                    <!-- Blog Content -->
                    <div class="col-lg-6">
                        <div class="blog-card p-4"
                            style="border: 0.5px solid #ddd; border-radius: 8px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">
                            <!-- Blog Images -->
                            <div class="row">
                                @if ($garden->images->isNotEmpty())
                                    @foreach ($garden->images as $image)
                                        <div class="col-md-6 mb-3">
                                            <img class="img-fluid rounded shadow" src="{{ asset('storage/' . $image->image) }}"
                                                alt="{{ $garden->gardenName }}" style="width: 100%; height: 250px; object-fit: cover;">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-12">
                                        <img class="img-fluid rounded shadow"
                                            src="{{ asset('PublicArea/images/herbalGarden/default-image.png') }}"
                                            alt="Default garden Image" style="width: 100%; height: 250px; object-fit: cover;">
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                    <!-- Blog Info -->
                    <div class="col-lg-6">
                        <div class="blog-info">
                            <h3 class="mb-3">{{ $garden->gardenName }}</h3>
                            <p><strong>Location:</strong> {{ $garden->gardenLocation }}</p>
                            <p><strong>Address:</strong> {{ $garden->gardenAddress }}</p>
                            <p><strong>Phone:</strong> {{ $garden->gardenPhone }}</p>
                            <p><strong>Email:</strong> {{ $garden->gardenEmail }}</p>
                            <p><strong>Open Time:</strong> {{ $garden->gardenOpenTime }}</p>
                            <p><strong>Close Time:</strong> {{ $garden->gardenCloseTime }}</p>
                            <p><strong>Local Ticket Price:</strong> {{ $garden->localTicketPrice }}</p>
                            <p><strong>Foreign Ticket Price:</strong> {{ $garden->foreignTicketPrice }}</p>
                            <p><strong>Open Days:</strong> {{ $garden->gardenOpenDays }}</p>
                            <p><strong>Description:</strong> {{ $garden->gardenDescription }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Blog Details Section End -->
@endsection

@push('css')
    <style>
        .blog-card {
            padding: 20px;
            background: #fff;
            border-radius: 8px;
        }

        .blog-info h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .blog-info p {
            margin-bottom: 8px;
            font-size: 16px;
        }

        .img-fluid {
            transition: transform 0.3s ease-in-out;
        }

        .img-fluid:hover {
            transform: scale(1.05);
        }
    </style>
@endpush
