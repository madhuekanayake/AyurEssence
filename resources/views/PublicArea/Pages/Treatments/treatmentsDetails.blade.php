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
                                <h2 class="title">Treatment Details</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url('/') }}">Home</a>
                                </span>
                                <span>Treatment Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- Treatment Details Section -->
    <div class="site-main">
        <section class="prt-row treatment-details-section clearfix">
            <div class="container">
                <div class="row">
                    <!-- Treatment Images (Left Side) -->
                    <div class="col-lg-6">
                        <div class="treatment-card p-4"
                            style="border: 0.5px solid #ddd; border-radius: 0px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">

                            <!-- Large Primary Image -->
                            <div class="primary-image mb-3">
                                @if ($treatment->images->isNotEmpty())
                                    <img class="img-fluid rounded shadow"
                                        src="{{ asset('storage/' . $treatment->images->first()->image) }}"
                                        alt="{{ $treatment->name }}"
                                        style="width: 100%; height: 500px; object-fit: cover;">
                                @else
                                    <img class="img-fluid rounded shadow"
                                        src="{{ asset('PublicArea/images/treatments/default-image.png') }}"
                                        alt="Default Treatment Image"
                                        style="width: 100%; height: 500px; object-fit: cover;">
                                @endif
                            </div>

                            <!-- Additional Images -->
                            @if ($treatment->images->count() > 1)
                                <div class="additional-images d-flex gap-2">
                                    @foreach ($treatment->images->slice(1) as $image)
                                        <img class="img-thumbnail rounded shadow"
                                            src="{{ asset('storage/' . $image->image) }}"
                                            alt="{{ $treatment->name }}"
                                            style="width: 150px; height: 150px; object-fit: cover; cursor: pointer;"
                                            onclick="document.querySelector('.primary-image img').src = this.src;">
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Treatment Info (Right Side) -->
                    <div class="col-lg-6">
                        <div class="treatment-info">
                            <h3 class="mb-3">{{ $treatment->name }}</h3>
                            <p><strong>Description:</strong> {{ $treatment->description }}</p>
                            <p><strong>Content:</strong> {{ Str::limit(strip_tags($treatment->content), 150) }}</p>
                            <p><strong>Ingredients:</strong> {{ $treatment->ingredients }}</p>
                            <p><strong>Benefits:</strong> {{ $treatment->benefits }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Treatment Details Section End -->
@endsection

@push('css')
    <style>
        .primary-image img {
            border-radius: 4px;
            transition: transform 0.3s ease-in-out;
        }

        .primary-image img:hover {
            transform: scale(1.04);
        }

        .additional-images img {
            border: 0.5px solid transparent;
            transition: border 0.3s ease-in-out;
        }

        .additional-images img:hover {
            border: 0.1px solid #020202;
            transform: scale(1.05);
        }
    </style>
@endpush
