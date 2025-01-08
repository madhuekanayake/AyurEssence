@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Plant Deseases Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addDiseaseModal">
                            Add Plant Deseases<i class="fa fa-plus-circle ml-1"></i>
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Plant Deseases Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Diseases Name</th>
                                        <th>Symptoms</th>
                                        <th>Impact</th>
                                        <th>Cause</th>
                                        <th>Treatment</th>
                                        <th>PlantsAffected</th>
                                        <th>Images</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plant_diseases as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->diseasesName }}</td>
                                            <td>{{ $item->symptoms }}</td>
                                            <td>{{ $item->impact }}</td>
                                            <td>{{ $item->cause }}</td>
                                            <td>{{ $item->treatment }}</td>
                                            <td>{{ $item->plantsAffected }}</td>


                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0"
                                                    data-toggle="modal" data-target="#uploadImageModal"
                                                    onclick="openUploadImageModal('{{ $item->diseasesId }}')">
                                                    <i class="fas fa-plus-circle menu-icon"></i>
                                                </button>

                                                <a
                                                    href="{{ route('PlantManagement.ViewPlantDiseasesImageAll', $item->diseasesId) }}">
                                                    <i class="fas fa-eye menu-icon"></i>

                                                </a>

                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                    onclick="editPlantDiseases('{{ $item->id }}', '{{ $item->diseasesName }}', '{{ $item->symptoms }}','{{ $item->impact }}','{{ $item->cause }}','{{ $item->treatment }}','{{ $item->plantsAffected }}')">
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

{{-- Add Disease Modal --}}
<div class="modal fade" id="addDiseaseModal" tabindex="-1" role="dialog" aria-labelledby="addDiseaseLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDiseaseLabel">Add New Disease</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('PlantManagement.plantDiseasesAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="diseasesName">Disease Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="diseasesName" name="diseasesName" placeholder="Disease Name" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="symptoms">Symptoms <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="symptoms" name="symptoms" rows="3" placeholder="Symptoms" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="impact">Impact <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="impact" name="impact" rows="3" placeholder="Impact" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="cause">Cause <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="cause" name="cause" rows="3" placeholder="Cause" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="treatment">Treatment <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="treatment" name="treatment" rows="3" placeholder="Treatment" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="plantsAffected">Plants Affected <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="plantsAffected" name="plantsAffected" rows="3" placeholder="Plants Affected" required></textarea>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Disease Modal --}}
<div class="modal fade" id="editDiseaseModal" tabindex="-1" role="dialog" aria-labelledby="editDiseaseLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDiseaseLabel">Edit New Disease</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('PlantManagement.plantDiseasesUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit_plant_diseases_id">
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="edit_diseasesName">Disease Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_diseasesName" name="edit_diseasesName" placeholder="Disease Name" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_symptoms">Symptoms <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_symptoms" name="edit_symptoms" rows="3" placeholder="Symptoms" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_impact">Impact <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_impact" name="edit_impact" rows="3" placeholder="Impact" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_cause">Cause <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_cause" name="edit_cause" rows="3" placeholder="Cause" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_treatment">Treatment <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_treatment" name="edit_treatment" rows="3" placeholder="Treatment" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_plantsAffected">Plants Affected <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_plantsAffected" name="edit_plantsAffected" rows="3" placeholder="Plants Affected" required></textarea>
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
<div class="modal fade" id="deleteDiseaseseModal" tabindex="-1" role="dialog" aria-labelledby="deleteDiseaseseLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this Plant Diseasese ?</h5>

            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteDiseaseseForm" action="{{ route('PlantManagement.plantDiseasesDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="diseasesId">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i> Delete</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
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
            <h5 class="modal-title" id="uploadImageLabel">Upload Plant Diseases Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('PlantManagement.plantDiseasesImageAdd') }}" method="POST" enctype="multipart/form-data"
                id="uploadImageForm">
                @csrf
                <input type="hidden" id="uploaddiseasesId" name="diseasesId">
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
    function openUploadImageModal(diseasesId) {
        document.getElementById('uploaddiseasesId').value = diseasesId;
    }
</script>
    <script>
        function editPlantDiseases(id, diseasesName, symptoms,impact,cause,treatment,plantsAffected) {
            // Set the values of the inputs in the modal
            document.getElementById('edit_plant_diseases_id').value = id;
            document.getElementById('edit_diseasesName').value = diseasesName;  // Update to 'edit_title'
            document.getElementById('edit_symptoms').value = symptoms;
            document.getElementById('edit_impact').value = impact;
            document.getElementById('edit_cause').value = cause;
            document.getElementById('edit_treatment').value = treatment;
            document.getElementById('edit_plantsAffected').value = plantsAffected;


            // Show the edit modal
            $('#editDiseaseModal').modal('show');
        }

        function confirmDelete(diseasesId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('diseasesId').value = diseasesId;

            // Show the delete modal
            $('#deleteDiseaseseModal').modal('show');
        }
    </script>
@endpush

