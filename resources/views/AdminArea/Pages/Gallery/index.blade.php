@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Gallery Data Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addGalleryModal">
                            Add Gallery Image <i class="fa fa-plus-circle ml-1"></i>
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Gallery Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Image Title</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($galleries as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Gallery Image" width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                    onclick="editGallery('{{ $item->id }}', '{{ $item->title }}', '{{ $item->description }}')">
                                                    <i class="fas fa-edit menu-icon"></i>
                                                </button>
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

{{-- Add Gallery Modal --}}
<div class="modal fade" id="addGalleryModal" tabindex="-1" role="dialog" aria-labelledby="addGalleryLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGalleryLabel">Add New Gallery Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Gallery.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="title">Image Title <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Image Title" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="image">File Upload <span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Image Description" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>

            </div>
        </div>
    </div>
</div>

{{-- Edit Gallery Modal --}}
<div class="modal fade" id="editGalleryModal" tabindex="-1" role="dialog" aria-labelledby="editGalleryLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGalleryLabel">Edit Gallery Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editGalleryForm" action="{{ route('Gallery.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit_gallery_id">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_title">Title <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_title" name="title" placeholder="Gallery Title" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="edit_image">Update Image</label>
                            <input type="file" class="form-control" id="edit_image" name="image">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="edit_description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_description" name="description" placeholder="Gallery Description" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="deleteGalleryModal" tabindex="-1" role="dialog" aria-labelledby="deleteGalleryLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this gallery item?</h5>

            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteGalleryForm" action="{{ route('Gallery.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="galleryId">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i> Delete</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>




@endsection

@push('js')
    <script>
        function editGallery(id, title, description) {
            // Set the values of the inputs in the modal
            document.getElementById('edit_gallery_id').value = id;
            document.getElementById('edit_title').value = title;  // Update to 'edit_title'
            document.getElementById('edit_description').value = description;

            // Show the edit modal
            $('#editGalleryModal').modal('show');
        }

        function confirmDelete(galleryId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('galleryId').value = galleryId;

            // Show the delete modal
            $('#deleteGalleryModal').modal('show');
        }
    </script>
@endpush


