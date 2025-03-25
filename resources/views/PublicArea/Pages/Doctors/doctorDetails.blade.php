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
                                <h2 class="title">Doctor Details</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="{{ url('/') }}">Home</a>
                                </span>
                                <span>Doctor Details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->

    <!-- site-main start -->
    <div class="site-main">
        <section class="prt-row doctor-details-section clearfix">
            <div class="container">
                <div class="row">
                    <!-- Doctor Card -->
                    <div class="col-lg-12">
                        <div class="doctor-card d-flex align-items-center p-4" style="border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); position: relative;">
                            <!-- Doctor Image and Details -->
                            <div class="d-flex" style="flex: 1;">
                                <!-- Doctor Image -->
                                <div class="doctor-image text-center" style="margin-right: 20px;">
                                    <img class="img-fluid rounded-circle"
                                        src="{{ $doctor->profilePicture ? asset('storage/' . $doctor->profilePicture) : asset('PublicArea/images/team-member/team-img01.png') }}"
                                        alt="{{ $doctor->name }}"
                                        style="width: 150px; height: 150px; object-fit: cover; margin-bottom: 10px;">
                                    <p class="mt-3"><strong>Specialization:</strong> {{ $doctor->specialzations->specializationName ?? 'General Doctor' }}</p>
                                </div>

                                <!-- Doctor Info -->
                                <div class="doctor-info" style="flex: 2;">
                                    <h3 style="margin-bottom: 10px;">{{ $doctor->name }}</h3>
                                    <p style="margin-bottom: 8px;"><strong>Qualification:</strong> {{ $doctor->qualification }}</p>
                                    <p style="margin-bottom: 8px;"><strong>Experience:</strong> {{ $doctor->yearsOfExperience }} years</p>
                                    <p style="margin-bottom: 8px;"><strong>Workplace:</strong> {{ $doctor->workplaceName }}</p>
                                    <p style="margin-bottom: 8px;"><strong>Description:</strong> {{ $doctor->description }}</p>

                                    <p style="margin-bottom: 8px;"><strong>Consultation Time:</strong> {{ $doctor->consultationStartTime }} - {{ $doctor->consultationEndTime }}</p>

                                </div>
                            </div>
<!-- Action Buttons -->
<div class="action-buttons text-right" style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%);">
    <a href="{{ url('/book-consultation') }}" class="btn btn-primary d-block mb-2" style="background-color: #FF5722; border: none; color: white; width: 200px;">Book Consultation</a>
    <a href="tel:{{ $doctor->contactNumber }}" class="btn btn-secondary d-block" style="background-color: #795548; border: none; color: white; width: 200px;">Call Us {{ $doctor->contactNumber }}</a>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
<!-- site-main end -->
@endsection
