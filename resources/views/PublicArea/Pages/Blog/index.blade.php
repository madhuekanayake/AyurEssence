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
                                    <h2 class="title">Our latest stories</h2>
                                </div>
                                <div class="breadcrumb-wrapper">
                                    <span>
                                        <a title="Homepage" href="{{ url('/') }}">Home</a>
                                    </span>
                                    <span>Blog</span>
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
            <section class="prt-row prt-bg bg-base-grey blog-section clearfix">
                <div class="container">
                    <div class="row row-equal-height" data-aos="fade-up" data-aos-duration="1000">

                        @foreach ($blogs as $blog)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <!-- featured-imagebox -->
                            <div class="featured-imagebox featured-imagebox-blog style2">
                                <div class="featured-thumbnail">
                                    @php
                                        // Find the primary image for the blog
                                        $primaryImage = $blog->images->firstWhere('isPrimary', 1);
                                    @endphp

                                    @if ($primaryImage)
                                        <img width="413" height="150" class="img-fluid" src="{{ asset('storage/' . $primaryImage->image) }}" alt="Primary Blog Image">
                                    @elseif ($blog->images->isNotEmpty())
                                        <img width="413" height="150" class="img-fluid" src="{{ asset('storage/' . $blog->images->first()->image) }}" alt="Blog Image">
                                    @else
                                        <img width="413" height="150" class="img-fluid" src="{{ asset('PublicArea/images/blogs/default-image.png') }}" alt="Default Image">
                                    @endif
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h3>
                                            <a href="{{ url('blog-details/' . $blog->id) }}">{{ $blog->title }}</a>
                                        </h3>
                                    </div>
                                    <div class="featured-meta">
                                        <p><strong>Date:</strong> {{ $blog->date }}</p>
                                    </div>
                                    <div class="featured-desc">
                                        <p>
                                            {{ Str::limit(strip_tags($blog->content), 150) }}
                                            <a href="{{ route('CustomerBlog.details', $blog->id) }}" class="prt-btn btn-inline prt-btn-color-darkcolor btn-underline">
                                                Read More..
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- featured-imagebox end-->
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>


            <!--blog-section end-->

            



        </div><!-- site-main end-->

@endsection

@push('css')
<style>
    .featured-thumbnail img {
        border-radius: 10px; /* Adjust the value as needed */
        overflow: hidden; /* Ensures proper rendering of rounded corners */
    }
</style>

@endpush
