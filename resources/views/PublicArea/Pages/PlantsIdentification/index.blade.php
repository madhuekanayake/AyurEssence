@extends('PublicArea.Layout.main')
@section('container')
    <!-- page-title -->
    <div class="prt-page-title-row style1">
        <div class="prt-page-title-row-inner">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-8 col-md-10 col-sm-9 ms-auto">
                        <div class="prt-schedule">
                            <div class="prt-schedule-title">
                                <h2 class="mb-4">Medicinal Plant Identification</h2>
                                <p class="lead">
                                    AI-driven medicinal plant identification uses machine learning and computer vision to classify plants from images.<br>
                                    Trained on vast datasets, AI analyzes leaf shape, color, and texture for accurate recognition, enhancing research, conservation, and accessibility to herbal medicine.<br>
                                    AI-powered apps help distinguish medicinal from toxic plants, ensuring safer and more efficient use of traditional remedies.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end-->

                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>



                                <section class="prt-row padding_zero-section contact-section mt_120 res-991-mt-0 clearfix">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 m-auto">
                                                <div class="prt-contactblock">
                                                    <div class="my-2">
                                                        @if (session('image'))
                                <div class="mt-4 text-center">
                                    <h4 class="mb-3">Identified Plant:</h4>
                                    <div class="image-container rounded overflow-hidden" style="width: 500px; height: 500px; margin: 0 auto;">
                                        <img src="{{ asset('storage/' . session('image')) }}" alt="Uploaded Image" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                    </div>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success fade show">
                                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger fade show">
                                    <i class="fas fa-exclamation-triangle me-2"></i>{{ $errors->first('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="text-center mb-4">
                            <h3 class="position-relative d-inline-block">
                                <span class="position-relative z-index-1">Upload a Plant Image</span>
                                <span class="d-block position-absolute bg-success opacity-25"></span>
                            </h3>
                            <p class="text-muted">Please select a clear image of a plant for identification</p>
                        </div>
                        <form action="{{ route('ImageUpload.upload') }}" class="query_form-2 wrap-form clearfix mt-25" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="file-upload-container p-4 border border-dashed rounded mb-4 text-center">
                                        <label for="image-upload" class="d-block cursor-pointer">
                                            <i class="fas fa-leaf fa-2x mb-3 text-success"></i>
                                            <span class="text-input d-block">
                                                <input id="image-upload" name="image" type="file" accept="image/*" required class="d-none">
                                                <span class="btn btn-outline-success mb-2">Choose File</span>
                                                <span class="selected-file-name d-block text-muted">No file chosen</span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mt-10">
                                        <button class="prt-btn prt-btn-size-md prt-btn-shape-round prt-btn-style-fill prt-btn-color-darkcolor w-100" type="submit">
                                            <i class="fas fa-upload me-2"></i>Identify Plant
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>
    <br>
    <br>
    <br>
    <br>


    <style>


        .prt-btn {
            transition: all 0.3s ease;
        }
        .prt-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .alert {
            border-radius: 8px;
            border-left: 4px solid;
        }
        .alert-success {
            border-left-color: #28a745;
        }
        .alert-danger {
            border-left-color: #dc3545;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const actualInput = document.getElementById('image-upload');
            const fileNameDisplay = document.querySelector('.selected-file-name');
            const uploadContainer = document.querySelector('.file-upload-container');

            actualInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    fileNameDisplay.textContent = this.files[0].name;
                    uploadContainer.classList.add('border-success');
                } else {
                    fileNameDisplay.textContent = 'No file chosen';
                    uploadContainer.classList.remove('border-success');
                }
            });

            document.querySelector('.btn-outline-success').addEventListener('click', function(e) {
                e.preventDefault();
                actualInput.click();
            });
        });
    </script>
@endsection
