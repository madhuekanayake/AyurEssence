@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Specialization Data Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addSpecializationModal">
                            Add Specialization <i class="fa fa-plus-circle ml-1"></i>
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Specialization Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Specialization Name</th>

                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($specialzations as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->specializationName }}</td>

                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                    onclick="editSpecialization('{{ $item->id }}', '{{ $item->specializationName }}', '{{ $item->description }}')">
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
<div class="modal fade" id="addSpecializationModal" tabindex="-1" role="dialog" aria-labelledby="addSpecializationLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSpecializationLabel">Add New Specialization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('DoctorManagement.specializationAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="specializationName">Specialization Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="specializationName" name="specializationName" placeholder="Specialization Name" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder=" Description" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>

            </div>
        </div>
    </div>
</div>

{{-- Edit Specialization Modal --}}
<div class="modal fade" id="editSpecializationModal" tabindex="-1" role="dialog" aria-labelledby="editSpecializationLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSpecializationLabel">Edit Specialization Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editSpecializationForm" action="{{ route('DoctorManagement.specializationUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit_specialization_id">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_specializationName">Specialization Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_specializationName" name="specializationName" placeholder="Specialization Name" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_description" name="description" placeholder="Specialization Description" required></textarea>
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
<div class="modal fade" id="deleteSpecializationModal" tabindex="-1" role="dialog" aria-labelledby="deleteSpecializationLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this Specialization item?</h5>

            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteSpecializationForm" action="{{ route('DoctorManagement.specializationDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="specializationId">
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
        function editSpecialization(id, specializationName, description) {
            // Set the values of the inputs in the modal
            document.getElementById('edit_specialization_id').value = id;
            document.getElementById('edit_specializationName').value = specializationName;  // Update to 'edit_title'
            document.getElementById('edit_description').value = description;

            // Show the edit modal
            $('#editSpecializationModal').modal('show');
        }

        function confirmDelete(specializationId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('specializationId').value = specializationId;

            // Show the delete modal
            $('#deleteSpecializationModal').modal('show');
        }
    </script>
@endpush
