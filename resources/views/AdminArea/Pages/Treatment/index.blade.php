@extends('AdminArea.Layout.main')

@section('Admincontainer')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Treatments Data Table</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addTreatmentModal">
                                Add Treatment <i class="fa fa-plus-circle ml-1"></i>
                            </button>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Treatment Records</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Content</th>
                                            <th>Ingredients</th>
                                            <th>Benefits</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($treatments as $treatment)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $treatment->id }}</td>
                                                <td>{{ $treatment->name }}</td>
                                                <td>{{ $treatment->description }}</td>
                                                <td>{{ Str::limit(strip_tags($treatment->content), 50) }}</td>
                                                <td>{{ $treatment->ingredients }}</td>
                                                <td>{{ $treatment->benefits }}</td>

                                                <td>
                                                    <button type="button" class="btn btn-link text-primary p-0"
                                                        data-toggle="modal" data-target="#uploadImageModal"
                                                        onclick="openUploadImageModal('{{ $treatment->treatmentId }}')">
                                                        <i class="fas fa-plus-circle menu-icon"></i>
                                                    </button>

                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="editTreatment('{{ $treatment->id }}', '{{ $treatment->name }}', '{{ $treatment->description }}','{{ $treatment->content }}','{{ $treatment->ingredients }}','{{ $treatment->benefits }}')">
                                                        <i class="fas fa-edit menu-icon"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-link text-danger p-0"
                                                        onclick="confirmDelete('{{ $treatment->id }}')">
                                                        <i class="fas fa-trash menu-icon"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="viewTreatment({{ $treatment->id }}, {{ $treatment->name }}, {{ $treatment->description }}, {{ $treatment->content }}, {{ $treatment->ingredients }}, {{ $treatment->benefits }})">
                                                        <i class="fas fa-arrow-right menu-icon"></i>
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

    {{-- Add Treatment Modal --}}
    <div class="modal fade" id="addTreatmentModal" tabindex="-1" role="dialog" aria-labelledby="addTreatmentLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTreatmentLabel">Add Treatment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Treatment.add') }}" method="POST" enctype="multipart/form-data"
                        id="addTreatmentForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Treatment Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Treatment Name" required pattern=".*\S.*"
                                    title="Whitespace-only input is not allowed.">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="description">Description <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Treatment Description"
                                    required></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="quillEditor">Content <span style="color: red;">*</span></label>
                                <div id="quillExample1" class="quill-container"></div>
                                <!-- Hidden input to store Quill content -->
                                <input type="hidden" id="content" name="content" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="ingredients">Ingredients <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="ingredients" name="ingredients" rows="3" placeholder="Treatment Ingredients"
                                    required></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="benefits">Benefits <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="benefits" name="benefits" rows="3" placeholder="Treatment Benefits" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Treatment Modal --}}
    <div class="modal fade" id="editTreatmentModal" tabindex="-1" role="dialog" aria-labelledby="editTreatmentLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTreatmentLabel">Edit Treatment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Treatment.update') }}" method="POST" enctype="multipart/form-data" id="editTreatmentForm">

                        @csrf
                        <input type="hidden" name="id" id="edit_treatment_id">

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="edit_treatment_name">Treatment Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="edit_treatment_name" name="name"
                                    placeholder="Treatment Name" required pattern=".*\S.*"
                                    title="Whitespace-only input is not allowed.">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="edit_treatment_description">Description <span
                                        style="color: red;">*</span></label>
                                <textarea class="form-control" id="edit_treatment_description" name="description" rows="3"
                                    placeholder="Treatment Description" required></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="edit_treatment_quillEditor">Content <span style="color: red;">*</span></label>
                                <div id="edit_treatment_quillEditor" class="quill-container" style="height: 200px;">
                                </div>
                                <input type="hidden" id="edit_treatment_content" name="content" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="edit_treatment_ingredients">Ingredients <span
                                        style="color: red;">*</span></label>
                                <textarea class="form-control" id="edit_treatment_ingredients" name="ingredients" rows="3"
                                    placeholder="Treatment Ingredients" required></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="edit_treatment_benefits">Benefits <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="edit_treatment_benefits" name="benefits" rows="3"
                                    placeholder="Treatment Benefits" required></textarea>
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
    <div class="modal fade" id="deleteTreatmentModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteTreatmentLabel" aria-hidden="true">
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
                    <h5>Are you sure you want to delete this Treatment?</h5>

                </div>
                <div class="modal-footer" style="padding: 10px;">
                    <form id="deleteTreatmentForm" action="{{ route('Treatment.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="treatmentId">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i>
                            Delete</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- View Treatment Modal --}}
    <div class="modal fade" id="viewTreatmentModal" tabindex="-1" role="dialog" aria-labelledby="viewTreatmentLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewTreatmentLabel">View Treatment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Treatment.update') }}" method="POST" enctype="multipart/form-data"
                        id="viewTreatmentForm">
                        @csrf
                        <input type="hidden" name="id" id="view_treatment_id">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="view_treatment_name">Treatment Name</label>
                                <input type="text" class="form-control" id="view_treatment_name" name="name"
                                    placeholder="Treatment Name" readonly>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="view_treatment_description">Description</label>
                                <textarea class="form-control" id="view_treatment_description" name="description" rows="3"
                                    placeholder="Treatment Description" readonly></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="view_quillExample">Content</label>
                                <div id="view_quillExample" class="quill-container"
                                    style="height: 200px; border: 1px solid #ced4da;"></div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="view_treatment_ingredients">Ingredients</label>
                                <textarea class="form-control" id="view_treatment_ingredients" name="ingredients" rows="3"
                                    placeholder="Treatment Ingredients" readonly></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="view_treatment_benefits">Benefits</label>
                                <textarea class="form-control" id="view_treatment_benefits" name="benefits" rows="3"
                                    placeholder="Treatment Benefits" readonly></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Add Image Modal --}}
    <div class="modal fade" id="uploadImageModal" tabindex="-1" role="dialog" aria-labelledby="uploadImageLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadImageLabel">Upload Treatment Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Treatment.treatmentImageAdd') }}" method="POST" enctype="multipart/form-data"
                    id="uploadImageForm">
                    @csrf
                    <input type="hidden" id="uploadTreatmentId" name="treatmentId">
                    <div class="form-group">
                        <label for="image">Select Image <span style="color: red;">*</span></label>
                        <input type="file" class="form-control" id="image" name="image" required
                            accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

<script>
    function openUploadImageModal(treatmentId) {
    document.getElementById('uploadTreatmentId').value = treatmentId;
}

</script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quill = new Quill('#quillExample1', {
                theme: 'snow'
            });

            const form = document.getElementById('addTreatmentForm');
            form.addEventListener('submit', function() {
                // Copy Quill content to the hidden input field
                document.getElementById('content').value = quill.root.innerHTML;
            });
        });

        function editTreatment(id, name, description, content, ingredients, benefits) {
    // Set the values of the inputs in the modal
    document.getElementById('edit_treatment_id').value = id;
    document.getElementById('edit_treatment_name').value = name;
    document.getElementById('edit_treatment_description').value = description;
    document.getElementById('edit_treatment_content').value = content;
    document.getElementById('edit_treatment_ingredients').value = ingredients;
    document.getElementById('edit_treatment_benefits').value = benefits;

    // If Quill editor exists, set its content
    if (quillEditTreatment) {
        quillEditTreatment.root.innerHTML = content;
    }

    // Show the edit modal
    $('#editTreatmentModal').modal('show');
}

document.addEventListener('DOMContentLoaded', () => {
    let quillEditTreatment = null;

    $('#editTreatmentModal').on('shown.bs.modal', function () {
        // Initialize Quill editor if not already initialized
        if (!quillEditTreatment) {
            quillEditTreatment = new Quill('#edit_treatment_quillEditor', {
                theme: 'snow',
                placeholder: 'Enter treatment content here...',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'],
                        [{ list: 'ordered' }, { list: 'bullet' }],
                        ['link', 'image'],
                        ['clean'],
                    ],
                },
            });
        }

        // Set the content from the hidden input when modal opens
        const contentInput = document.getElementById('edit_treatment_content');
        quillEditTreatment.root.innerHTML = contentInput.value || '';

        // Update hidden input when Quill content changes
        quillEditTreatment.on('text-change', function() {
            contentInput.value = quillEditTreatment.root.innerHTML;
        });
    });

    // Add form submit handler to ensure Quill content is included
    document.getElementById('editTreatmentForm').addEventListener('submit', function(e) {
        const contentInput = document.getElementById('edit_treatment_content');
        contentInput.value = quillEditTreatment.root.innerHTML;
    });
});


        document.addEventListener('DOMContentLoaded', () => {
            let quillView = null;

            window.viewTreatment = function(id, name, description, content, ingredients, benefits) {
                // Initialize Quill if not already initialized
                if (!quillView) {
                    quillView = new Quill('#view_quillExample', {
                        theme: 'snow',
                        readOnly: true,
                        modules: {
                            toolbar: false
                        }
                    });
                }

                // Populate the fields
                document.getElementById('view_treatment_id').value = id;
                document.getElementById('view_treatment_name').value = name;
                document.getElementById('view_treatment_description').value = description;
                document.getElementById('view_treatment_ingredients').value = ingredients;
                document.getElementById('view_treatment_benefits').value = benefits;

                // Set Quill content safely
                try {
                    quillView.root.innerHTML = content;
                } catch (e) {
                    console.error('Error setting Quill content:', e);
                    quillView.root.innerHTML = '';
                }

                // Show the modal using Bootstrap's modal method
                $('#viewTreatmentModal').modal('show');
            };

            // Clear modal fields when hidden
            $('#viewTreatmentModal').on('hidden.bs.modal', function() {
                if (quillView) {
                    quillView.root.innerHTML = '';
                }
                document.getElementById('view_treatment_id').value = '';
                document.getElementById('view_treatment_name').value = '';
                document.getElementById('view_treatment_description').value = '';
                document.getElementById('view_treatment_ingredients').value = '';
                document.getElementById('view_treatment_benefits').value = '';
            });
        });
    </script>

    <script>
        function editTreatment(id, name, description, content, ingredients, benefits) {
            // Set the values of the inputs in the modal
            document.getElementById('edit_treatment_id').value = id;
            document.getElementById('edit_treatment_name').value = name; // Update to 'edit_title'
            document.getElementById('edit_treatment_description').value = description;
            document.getElementById('edit_treatment_content').value = content;
            document.getElementById('edit_treatment_ingredients').value = ingredients;
            document.getElementById('edit_treatment_benefits').value = benefits;

            // Show the edit modal
            $('#editTreatmentModal').modal('show');
        }


        function viewTreatment(id, name, description, content, ingredients, benefits) {
            // Set the values of the inputs in the modal
            document.getElementById('view_treatment_id').value = id;
            document.getElementById('view_treatment_name').value = name; // Update to 'edit_title'
            document.getElementById('view_treatment_description').value = description;
            document.getElementById('view_treatment_content').value = content;
            document.getElementById('view_treatment_ingredients').value = ingredients;
            document.getElementById('view_treatment_benefits').value = benefits;

            // Show the edit modal
            $('#viewTreatmentModal').modal('show');
        }

        function confirmDelete(treatmentId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('treatmentId').value = treatmentId;

            // Show the delete modal
            $('#deleteTreatmentModal').modal('show');
        }
    </script>


@endpush
