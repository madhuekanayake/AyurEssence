@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Blog Image Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='{{ route('EducationalContent.blogAll') }}'">
                            <i class="fa fa-arrow-left mr-1"></i> Back
                        </button>

                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Blog Image</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            {{-- <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blog_images as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>

                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Blog Image" width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>

                                            @php
                                                // Check if the current blog has a primary image
                                                $hasPrimary = $blog_images->where('blogId', $item->blogId)->contains('isPrimary', 1);
                                            @endphp

                                            <td>
                                                @if ($item->isPrimary == 1)
                                                    <span class="badge badge-pill badge-success">Primary</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Secondary</span>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($item->isPrimary == 0 || !$hasPrimary)
                                                    <a href="{{ route('EducationalContent.isPrimary', $item->id) }}" class="">
                                                        <i class="fas fa-tag menu-icon"></i>


                                                    </a>
                                                @else
                                                    <span class="text-muted">Cannot Change</span>
                                                @endif

                                                <button type="button" class="btn btn-link text-danger p-0" onclick="confirmDelete('{{ $item->id }}')">
                                                    <i class="fas fa-trash menu-icon"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>


                            </table> --}}

                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blog_images as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>

                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Blog Image" width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>

                                            @php
                                                $hasActive = $blog_images->contains('isPrimary', 1);
                                            @endphp

                                            <td>
                                                @if ($item->isPrimary == 1)
                                                    <span class="badge badge-pill badge-soft-success font-size-12 rounded-pill">Primary</span>
                                                    <a href="{{ route('EducationalContent.isPrimary', $item->id) }}" class="text-danger ms-2">
                                                        <i class="fas fa-toggle-on fa-lg"></i>
                                                    </a>
                                                @else
                                                    <span class="badge badge-pill badge-soft-danger font-size-12 rounded-pill">Secondary</span>
                                                    <a href="{{ route('EducationalContent.isPrimary', $item->id) }}"
                                                        class="text-primary ms-2 {{ $hasActive ? 'disabled' : '' }}"
                                                        style="{{ $hasActive ? 'pointer-events: none; opacity: 0.5;' : '' }}">
                                                        <i class="fas fa-toggle-off fa-lg"></i>
                                                    </a>
                                                @endif
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-link text-danger p-0"
                                                    onclick="confirmDelete('{{ $item->id }}')">
                                                    <i class="fas fa-trash menu-icon"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

{{-- Delete Image Modal --}}
<div class="modal fade" id="deleteImageModal" tabindex="-1" role="dialog"
aria-labelledby="deleteImageLabel" aria-hidden="true">
<div class="modal-dialog modal-md" role="document">
    <div class="modal-content" style="max-height: 300px;">
        <div class="modal-header" style="padding: 10px;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-center" style="padding: 15px;">
            <div class="mb-2">
                <img src="{{ asset('AdminArea/images/bin.gif') }}" alt="Delete Confirmation" width="80">
            </div>
            <h5>Are you sure you want to delete this service item?</h5>

        </div>
        <div class="modal-footer" style="padding: 10px;">
            <form id="deleteImageForm" action="{{ route('EducationalContent.viewBlogImageDelete') }}"
                method="POST">
                @csrf
                <input type="hidden" name="id" id="blogImageId">
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i>
                    Delete</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

@push('js')
    <script>

        function confirmDelete(blogImageId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('blogImageId').value = blogImageId;

            // Show the delete modal
            $('#deleteImageModal').modal('show');
        }
    </script>
@endpush
