@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Service Data Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addServiceModal">
                            Add Service <i class="fa fa-plus-circle ml-1"></i>
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Service Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Service Title</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $service->id }}</td>
                                            <td>{{ $service->title }}</td>

                                            <td>
                                                @if ($service->image)
                                                    <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image" width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $service->description }}</td>
                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                    onclick="editService('{{ $service->id }}', '{{ $service->title }}', '{{ $service->description }}')">
                                                    <i class="fas fa-edit menu-icon"></i>
                                                </button>
                                                <button type="button" class="btn btn-link text-danger p-0"
                                                    onclick="confirmDelete('{{ $service->id }}')">
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

{{-- Add Service Modal --}}
<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceLabel">Add New Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Service.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="serviceTitle">Service Title <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="serviceTitle" name="title" placeholder="Service Title" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="serviceImage">File Upload <span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="serviceImage" name="image" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="serviceDescription">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="serviceDescription" name="description" rows="3" placeholder="Service Description" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Service Modal --}}
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="editServiceLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editServiceLabel">Edit Service Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editServiceForm" action="{{ route('Service.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit_service_id">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_service_title">Title <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_service_title" name="title" placeholder="Service Title" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="edit_service_image">Update Image</label>
                            <input type="file" class="form-control" id="edit_service_image" name="image">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="edit_service_description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_service_description" name="description" placeholder="Service Description" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Delete Service Modal --}}
<div class="modal fade" id="deleteServiceModal" tabindex="-1" role="dialog" aria-labelledby="deleteServiceLabel" aria-hidden="true">
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
                <form id="deleteServiceForm" action="{{ route('Service.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="serviceId">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i> Delete</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        function editService(id, title, description) {
    // Set the values of the inputs in the modal
    document.getElementById('edit_service_id').value = id;
    document.getElementById('edit_service_title').value = title; // Corrected ID
    document.getElementById('edit_service_description').value = description; // Corrected ID

    // Show the edit modal
    $('#editServiceModal').modal('show');
}


        function confirmDelete(serviceId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('serviceId').value = serviceId;

            // Show the delete modal
            $('#deleteServiceModal').modal('show');
        }
    </script>
@endpush

@endsection

