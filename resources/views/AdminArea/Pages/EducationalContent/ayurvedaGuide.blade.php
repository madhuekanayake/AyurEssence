@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Ayurveda Guides Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addAyurvedicGuideModal">
                            Add Guide Details <i class="fa fa-plus-circle ml-1"></i>
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ayurveda Guides Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="guide-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Guide Title</th>
                                        <th>Information</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ayurveda_guides as $guide)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $guide->id }}</td>
                                            <td>{{ $guide->title }}</td>
                                            <td>{{ Str::limit(strip_tags($guide->information), 50) }}</td>
                                            <td>{{ $guide->description }}</td>
                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                    onclick="editGuide(
                                                        '{{ $guide->id }}',
                                                        '{{ $guide->title }}',
                                                        '{{ $guide->information }}',
                                                        '{{ $guide->description }}'
                                                    )">
                                                    <i class="fas fa-edit menu-icon"></i>
                                                </button>
                                                <button type="button" class="btn btn-link text-danger p-0"
                                                    onclick="confirmDelete('{{ $guide->id }}')">
                                                    <i class="fas fa-trash menu-icon"></i>
                                                </button>

                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
    data-toggle="modal"
    data-target="#viewAyurvedicGuideModal"
    onclick="viewGuide(
        '{{ $guide->id }}',
        '{{ $guide->title }}',
        '{{ $guide->information }}',
        '{{ $guide->description }}'
    )">
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


{{-- Add Modal --}}
<div class="modal fade" id="addAyurvedicGuideModal" tabindex="-1" role="dialog" aria-labelledby="addAyurvedicGuideLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAyurvedicGuideLabel">Add Ayurveda Guide</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('EducationalContent.ayurvedaGuideAdd') }}" method="POST" enctype="multipart/form-data" id="addAyurvedaGuideForm">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">Guide Title <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Guide Title" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="quillEditor">Information <span style="color: red;">*</span></label>
                            <div id="quillExample1" class="quill-container"></div>
                            <!-- Hidden input to store Quill content -->
                            <input type="hidden" id="information" name="information" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Guide Description" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Ayurvedic Guide Modal --}}
<div class="modal fade" id="editAyurvedicGuideModal" tabindex="-1" role="dialog" aria-labelledby="editAyurvedicGuideLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAyurvedicGuideLabel">Edit Ayurveda Guide</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('EducationalContent.ayurvedaGuideUpdate') }}" method="POST" enctype="multipart/form-data" id="editAyurvedaGuideForm">
                    @csrf
                    <input type="hidden" name="id" id="edit_ayurvedic_guide_id">
                    <input type="hidden" id="edit_information" name="information" required>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="edit_title">Guide Title <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_title" name="title" placeholder="Guide Title" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_quillEditor">Information <span style="color: red;">*</span></label>
                            <div id="edit_quillExample" class="quill-container" style="height: 200px;"></div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_description" name="description" rows="3" placeholder="Guide Description" required></textarea>
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
<div class="modal fade" id="deleteAyurvedaGuideModal" tabindex="-1" role="dialog" aria-labelledby="deleteAyurvedaGuideLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this Ayurveda Guide?</h5>

            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteGalleryForm" action="{{ route('EducationalContent.ayurvedaGuideDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="ayurvedaGuideId">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i> Delete</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- View Ayurvedic Guide Modal --}}
<div class="modal fade" id="viewAyurvedicGuideModal" tabindex="-1" role="dialog" aria-labelledby="viewAyurvedicGuideLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewAyurvedicGuideLabel">View Ayurveda Guide</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="viewAyurvedaGuideForm">
                    <input type="hidden" name="id" id="view_ayurvedic_guide_id">
                    <input type="hidden" id="view_information" name="information" readonly>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="view_title">Guide Title</label>
                            <input type="text" class="form-control" id="view_title" name="title" placeholder="Guide Title" readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="view_quillExample">Information</label>
                            <div id="view_quillExample" class="quill-container" style="height: 200px; border: 1px solid #ced4da;"></div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="view_description">Description</label>
                            <textarea class="form-control" id="view_description" name="description" rows="3" placeholder="Guide Description" readonly></textarea>
                        </div>
                    </div>

                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quill = new Quill('#quillExample1', {
            theme: 'snow'
        });

        const form = document.getElementById('addAyurvedaGuideForm');
        form.addEventListener('submit', function () {
            // Copy Quill content to the hidden input field
            document.getElementById('information').value = quill.root.innerHTML;
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
    let quillEdit = null;

    $('#editAyurvedicGuideModal').on('shown.bs.modal', function () {
        // Initialize Quill editor if not already initialized
        if (!quillEdit) {
            quillEdit = new Quill('#edit_quillExample', {
                theme: 'snow',
                placeholder: 'Enter information here...',
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline'], // Text styling
                        [{ list: 'ordered' }, { list: 'bullet' }], // Lists
                        ['link', 'image'], // Media
                        ['clean'], // Clear formatting
                    ],
                },
            });

            // Sync Quill content with the hidden input
            quillEdit.on('text-change', function () {
                document.getElementById('edit_information').value = quillEdit.root.innerHTML;
            });
        }

        // Reset Quill content when the modal is shown
        const informationInput = document.getElementById('edit_information');
        quillEdit.root.innerHTML = informationInput.value || '';
    });

    $('#editAyurvedicGuideModal').on('hidden.bs.modal', function () {
        // Clear the Quill editor content when the modal is hidden
        if (quillEdit) {
            quillEdit.root.innerHTML = '';
            document.getElementById('edit_information').value = '';
        }
    });
});


document.addEventListener('DOMContentLoaded', () => {
    let quillView = null;

    function viewGuide(id, title, information, description) {
        // Populate the fields with the provided data
        document.getElementById('view_ayurvedic_guide_id').value = id;
        document.getElementById('view_title').value = title;
        document.getElementById('view_description').value = description;

        // Initialize Quill editor if not already initialized
        if (!quillView) {
            quillView = new Quill('#view_quillExample', {
                theme: 'snow',
                readOnly: true,
                modules: {
                    toolbar: false, // Disable toolbar for read-only mode
                },
            });
        }

        // Set Quill editor content
        quillView.root.innerHTML = information;
        document.getElementById('view_information').value = information;
    }

    // Attach the function to global scope for onclick usage
    window.viewGuide = viewGuide;

    // Clear modal fields when hidden
    $('#viewAyurvedicGuideModal').on('hidden.bs.modal', function () {
        if (quillView) {
            quillView.root.innerHTML = '';
            document.getElementById('view_information').value = '';
        }
        document.getElementById('view_ayurvedic_guide_id').value = '';
        document.getElementById('view_title').value = '';
        document.getElementById('view_description').value = '';
    });
});




</script>

<script>
    function editGuide(id, title, information, description) {
        // Set the values of the inputs in the modal
        document.getElementById('edit_ayurvedic_guide_id').value = id;
        document.getElementById('edit_title').value = title;
        document.getElementById('edit_information').value = information; // Update to 'edit_title'
        document.getElementById('edit_description').value = description;

        // Show the edit modal
        $('#editAyurvedicGuideModal').modal('show');
    }

    function confirmDelete(ayurvedaGuideId) {
        // Set the student ID in the hidden input field of the delete modal
        document.getElementById('ayurvedaGuideId').value = ayurvedaGuideId;

        // Show the delete modal
        $('#deleteAyurvedaGuideModal').modal('show');
    }

    function viewGuide(id, title, information, description) {
    document.getElementById('edit_ayurvedic_guide_id').value = id;
    document.getElementById('view_title').value = title;
    document.getElementById('view_information').value = information;
    document.getElementById('view_description').value = description;

    // Optionally set Quill content if Quill is initialized
    if (quillView) {
        quillView.root.innerHTML = information;
    }

    // Show the modal programmatically if necessary
    $('#viewAyurvedicGuideModal').modal('show');
}

</script>

@endpush

