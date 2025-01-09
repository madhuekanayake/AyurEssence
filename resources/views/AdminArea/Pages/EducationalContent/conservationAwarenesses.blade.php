@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Conservation Awarenesses Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addconservationAwarenessModal">
                            Add Conservation Awarenesses  <i class="fa fa-plus-circle ml-1"></i>
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Conservation Awarenesses Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Endangered Status</th>
                                        <th>Sustainable Harvesting</th>
                                        <th>Reforestation Projects</th>
                                        <th>Biodiversity Importance</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($conservation_awarenesses as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->endangeredStatus }}</td>
                                            <td>{{ $item->sustainableHarvesting }}</td>
                                            <td>{{ $item->reforestationProjects }}</td>
                                            <td>{{ $item->biodiversityImportance }}</td>



                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                onclick="editConservationAwarenesses('{{ $item->id }}', '{{ $item->endangeredStatus }}', '{{ $item->sustainableHarvesting }}', '{{ $item->reforestationProjects }}', '{{ $item->biodiversityImportance }}')">
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

</div>

{{-- Add Conservation Awareness Modal --}}
<div class="modal fade" id="addconservationAwarenessModal" tabindex="-1" role="dialog" aria-labelledby="addconservationAwarenessLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addconservationAwarenessLabel">Add ConservationAwareness Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('EducationalContent.conservationAwarenessAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="endangeredStatus">Endangered Status <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="endangeredStatus" name="endangeredStatus" rows="3" placeholder="Endangered Status" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="sustainableHarvesting">Sustainable Harvesting <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="sustainableHarvesting" name="sustainableHarvesting" rows="3" placeholder="Sustainable Harvesting" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="reforestationProjects">Reforestation Projects <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="reforestationProjects" name="reforestationProjects" rows="3" placeholder="Reforestation Projects" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="biodiversityImportance">Biodiversity Importance <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="biodiversityImportance" name="biodiversityImportance" rows="3" placeholder="Biodiversity Importance" required></textarea>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Edit Conservation Awareness Modal --}}
<div class="modal fade" id="editConservationAwarenessModal" tabindex="-1" role="dialog" aria-labelledby="editConservationAwarenessLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editConservationAwarenessLabel">Edit Conservation Awareness Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('EducationalContent.conservationAwarenessUpdate') }}" method="POST">
                    @csrf

                    <input type="hidden" name="id" id="edit_conservationAwarenessId">
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="edit_endangeredStatus">Endangered Status <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_endangeredStatus" name="endangeredStatus" rows="3" placeholder="Endangered Status" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_sustainableHarvesting">Sustainable Harvesting <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_sustainableHarvesting" name="sustainableHarvesting" rows="3" placeholder="Sustainable Harvesting" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_reforestationProjects">Reforestation Projects <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_reforestationProjects" name="reforestationProjects" rows="3" placeholder="Reforestation Projects" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_biodiversityImportance">Biodiversity Importance <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_biodiversityImportance" name="biodiversityImportance" rows="3" placeholder="Biodiversity Importance" required></textarea>
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
<div class="modal fade" id="deleteConservationAwarenessModal" tabindex="-1" role="dialog" aria-labelledby="deleteConservationAwarenessLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this Conservation Awareness ?</h5>

            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteConservationAwarenessForm" action="{{ route('EducationalContent.conservationAwarenessDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="conservationAwarenessesId">
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
        function editConservationAwarenesses(id, endangeredStatus, sustainableHarvesting, reforestationProjects, biodiversityImportance) {
    // Set the values of the inputs in the modal
    document.getElementById('edit_conservationAwarenessId').value = id;
    document.getElementById('edit_endangeredStatus').value = endangeredStatus;
    document.getElementById('edit_sustainableHarvesting').value = sustainableHarvesting;
    document.getElementById('edit_reforestationProjects').value = reforestationProjects; // Corrected ID
    document.getElementById('edit_biodiversityImportance').value = biodiversityImportance;

    // Show the edit modal
    $('#editConservationAwarenessModal').modal('show');
}


        function confirmDelete(conservationAwarenessesId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('conservationAwarenessesId').value = conservationAwarenessesId;

            // Show the delete modal
            $('#deleteConservationAwarenessModal').modal('show');
        }
    </script>
@endpush

