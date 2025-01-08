@extends('AdminArea.Layout.main')

@section('Admincontainer')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Plant Table</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addPlantModal">
                                Add Plants<i class="fa fa-plus-circle ml-1"></i>
                            </button>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Plant Category Records</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Plant Name</th>
                                            <th>Plant Category</th>
                                            <th>Scientific Name</th>
                                            <th>Availability</th>
                                            <th>Description</th>
                                            <th>Images</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($plants as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->plantname }}</td>
                                                <td>{{ $item->category->categoryName ?? 'N/A' }}</td>
                                                <!-- Display category name -->
                                                <td>{{ $item->scientificName }}</td>
                                                <td>{{ $item->availability }}</td>
                                                <td>{{ $item->description }}</td>


                                                <td>
                                                    <button type="button" class="btn btn-link text-primary p-0"
                                                        data-toggle="modal" data-target="#uploadImageModal"
                                                        onclick="openUploadImageModal('{{ $item->plantId }}')">
                                                        <i class="fas fa-plus-circle menu-icon"></i>
                                                    </button>

                                                    <a
                                                    href="{{ route('PlantManagement.viewPlantImageAll', $item->plantId) }}">
                                                    <i class="fas fa-eye menu-icon"></i>

                                                </a>

                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="editPlant('{{ $item->id }}', '{{ $item->plantname }}','{{ $item->scientificName }}', '{{ $item->plantCategoryId }}','{{ $item->availability }}','{{ $item->growthRequirements }}','{{ $item->geographicalDistribution }}','{{ $item->partUsed }}','{{ $item->traditionalUses }}','{{ $item->modernUses }}','{{ $item->toxicityInformation }}','{{ $item->associatedDiseases }}','{{ $item->medicalUses }}','{{ $item->description }}')">
                                                        <i class="fas fa-edit menu-icon"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-link text-danger p-0"
                                                        onclick="confirmDelete('{{ $item->id }}')">
                                                        <i class="fas fa-trash menu-icon"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="viewPlant('{{ $item->id }}', '{{ $item->plantname }}','{{ $item->scientificName }}', '{{ $item->plantCategoryId }}','{{ $item->availability }}','{{ $item->growthRequirements }}','{{ $item->geographicalDistribution }}','{{ $item->partUsed }}','{{ $item->traditionalUses }}','{{ $item->modernUses }}','{{ $item->toxicityInformation }}','{{ $item->associatedDiseases }}','{{ $item->medicalUses }}','{{ $item->description }}')">
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

    </div>

    {{-- Add Plant Modal --}}
    <div class="modal fade" id="addPlantModal" tabindex="-1" role="dialog" aria-labelledby="addPlantLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPlantLabel">Add New Plant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('PlantManagement.plantAdd') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="plantName">Plant Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="plantName" name="plantname"
                                    placeholder="Plant Name" required pattern=".*\S.*"
                                    title="Whitespace-only input is not allowed.">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="scientificName">Scientific Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="scientificName" name="scientificName"
                                    placeholder="Scientific Name" required>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="plantCategoryId">Plant Category <span style="color: red;">*</span></label>
                                <select class="form-control" id="plantCategoryId" name="plantCategoryId" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach ($plant_categories as $category)
                                        <option value="{{ $category->plantCategoryId }}">{{ $category->categoryName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="availability">Availability <span style="color: red;">*</span></label>
                                <select class="form-control" id="availability" name="availability" required>
                                    <option value="">-- Select Availability --</option>
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                        </div>



                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="growthRequirements">Growth Requirements</label>
                                <textarea class="form-control" id="growthRequirements" name="growthRequirements" rows="2"
                                    placeholder="Growth Requirements"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="geographicalDistribution">Geographical Distribution</label>
                                <textarea class="form-control" id="geographicalDistribution" name="geographicalDistribution" rows="2"
                                    placeholder="Geographical Distribution"></textarea>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="partUsed">Part Used</label>
                                <input type="text" class="form-control" id="partUsed" name="partUsed"
                                    placeholder="Part Used">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="traditionalUses">Traditional Uses</label>
                                <textarea class="form-control" id="traditionalUses" name="traditionalUses" rows="2"
                                    placeholder="Traditional Uses"></textarea>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="modernUses">Modern Uses</label>
                                <textarea class="form-control" id="modernUses" name="modernUses" rows="2" placeholder="Modern Uses"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="toxicityInformation">Toxicity Information</label>
                                <textarea class="form-control" id="toxicityInformation" name="toxicityInformation" rows="2"
                                    placeholder="Toxicity Information"></textarea>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="associatedDiseases">Associated Diseases</label>
                                <textarea class="form-control" id="associatedDiseases" name="associatedDiseases" rows="2"
                                    placeholder="Associated Diseases"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="medicalUses">Medical Uses <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="medicalUses" name="medicalUses" rows="2" placeholder="Medical Uses"
                                    required></textarea>
                            </div>
                        </div>


                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="description">Description <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Plant Description"
                                    required></textarea>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Edit Plant Modal --}}
    <div class="modal fade" id="editPlantModal" tabindex="-1" role="dialog" aria-labelledby="editPlantLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPlantLabel">Add New Plant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('PlantManagement.plantUpdate') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="edit_plant_id">
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="edit_plantName">Plant Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="edit_plantName" name="edit_plantname"
                                    placeholder="Plant Name" required pattern=".*\S.*"
                                    title="Whitespace-only input is not allowed.">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_scientificName">Scientific Name <span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="edit_scientificName"
                                    name="edit_scientificName" placeholder="Scientific Name" required>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="edit_plantCategoryId">Plant Category <span
                                        style="color: red;">*</span></label>
                                <select class="form-control" id="edit_plantCategoryId" name="edit_plantCategoryId"
                                    required>
                                    <option value="">-- Select Category --</option>
                                    @foreach ($plant_categories as $category)
                                        <option value="{{ $category->plantCategoryId }}">{{ $category->categoryName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_availability">Availability <span style="color: red;">*</span></label>
                                <select class="form-control" id="edit_availability" name="edit_availability" required>
                                    <option value="">-- Select Availability --</option>
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="edit_growthRequirements">Growth Requirements</label>
                                <textarea class="form-control" id="edit_growthRequirements" name="edit_growthRequirements" rows="2"
                                    placeholder="Growth Requirements"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_geographicalDistribution">Geographical Distribution</label>
                                <textarea class="form-control" id="edit_geographicalDistribution" name="edit_geographicalDistribution"
                                    rows="2" placeholder="Geographical Distribution"></textarea>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="edit_partUsed">Part Used</label>
                                <input type="text" class="form-control" id="edit_partUsed" name="edit_partUsed"
                                    placeholder="Part Used">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_traditionalUses">Traditional Uses</label>
                                <textarea class="form-control" id="edit_traditionalUses" name="edit_traditionalUses" rows="2"
                                    placeholder="Traditional Uses"></textarea>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="edit_modernUses">Modern Uses</label>
                                <textarea class="form-control" id="edit_modernUses" name="edit_modernUses" rows="2"
                                    placeholder="Modern Uses"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_toxicityInformation">Toxicity Information</label>
                                <textarea class="form-control" id="edit_toxicityInformation" name="edit_toxicityInformation" rows="2"
                                    placeholder="Toxicity Information"></textarea>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="edit_associatedDiseases">Associated Diseases</label>
                                <textarea class="form-control" id="edit_associatedDiseases" name="edit_associatedDiseases" rows="2"
                                    placeholder="Associated Diseases"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_medicalUses">Medical Uses <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="edit_medicalUses" name="edit_medicalUses" rows="2"
                                    placeholder="Medical Uses" required></textarea>
                            </div>
                        </div>


                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="edit_description">Description <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="edit_description" name="edit_description" rows="3"
                                    placeholder="Plant Description" required></textarea>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- View Plant Modal --}}
    <div class="modal fade" id="viewPlantModal" tabindex="-1" role="dialog" aria-labelledby="viewPlantLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewPlantLabel">Add New Plant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('PlantManagement.plantUpdate') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="view_plant_id">
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="view_plantName">Plant Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="view_plantName" name="view_plantname"
                                    placeholder="Plant Name" pattern=".*\S.*"
                                    title="Whitespace-only input is not allowed." readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="view_scientificName">Scientific Name <span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="view_scientificName"
                                    name="view_scientificName" placeholder="Scientific Name" readonly>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="view_plantCategoryId">Plant Category <span
                                        style="color: red;">*</span></label>
                                <select class="form-control" id="view_plantCategoryId" name="view_plantCategoryId"
                                    disabled>
                                    <option value="">-- Select Category --</option>
                                    @foreach ($plant_categories as $category)
                                        <option value="{{ $category->plantCategoryId }}">{{ $category->categoryName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="view_availability">Availability <span style="color: red;">*</span></label>
                                <select class="form-control" id="view_availability" name="view_availability" disabled>
                                    <option value="">-- Select Availability --</option>
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="view_growthRequirements">Growth Requirements</label>
                                <textarea class="form-control" id="view_growthRequirements" name="view_growthRequirements" rows="2"
                                    placeholder="Growth Requirements" readonly></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="view_geographicalDistribution">Geographical Distribution</label>
                                <textarea class="form-control" id="view_geographicalDistribution" name="view_geographicalDistribution"
                                    rows="2" placeholder="Geographical Distribution" readonly></textarea>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="view_partUsed">Part Used</label>
                                <input type="text" class="form-control" id="view_partUsed" name="view_partUsed"
                                    placeholder="Part Used" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="view_traditionalUses">Traditional Uses</label>
                                <textarea class="form-control" id="view_traditionalUses" name="view_traditionalUses" rows="2"
                                    placeholder="Traditional Uses" readonly></textarea>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="view_modernUses">Modern Uses</label>
                                <textarea class="form-control" id="view_modernUses" name="view_modernUses" rows="2" placeholder="Modern Uses"
                                    readonly></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="view_toxicityInformation">Toxicity Information</label>
                                <textarea class="form-control" id="view_toxicityInformation" name="view_toxicityInformation" rows="2"
                                    placeholder="Toxicity Information" readonly></textarea>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="view_associatedDiseases">Associated Diseases</label>
                                <textarea class="form-control" id="view_associatedDiseases" name="view_associatedDiseases" rows="2"
                                    placeholder="Associated Diseases" readonly></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="view_medicalUses">Medical Uses <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="view_medicalUses" name="view_medicalUses" rows="2"
                                    placeholder="Medical Uses" readonly></textarea>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="view_description">Description <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="view_description" name="view_description" rows="3"
                                    placeholder="Plant Description" readonly></textarea>
                            </div>
                        </div>

                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="deletePlanttModal" tabindex="-1" role="dialog" aria-labelledby="deletePlanttLabel"
        aria-hidden="true">
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
                    <h5>Are you sure you want to delete this Plant?</h5>

                </div>
                <div class="modal-footer" style="padding: 10px;">
                    <form id="deleteProductForm" action="{{ route('PlantManagement.plantDelete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="plantId">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i>
                            Delete</button>
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
            <h5 class="modal-title" id="uploadImageLabel">Upload Plant Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('PlantManagement.plantImageAdd') }}" method="POST" enctype="multipart/form-data"
                id="uploadImageForm">
                @csrf
                <input type="hidden" id="uploadplantId" name="plantId">
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
        function openUploadImageModal(plantId) {
            document.getElementById('uploadplantId').value = plantId;
        }
    </script>

    <script>
        function editPlant(id, plantname, scientificName, plantCategoryId, availability, growthRequirements,
            geographicalDistribution, partUsed, traditionalUses, modernUses, toxicityInformation, associatedDiseases,
            medicalUses, description) {
            // Set the values of the inputs in the modal
            document.getElementById('edit_plant_id').value = id;
            document.getElementById('edit_plantName').value = plantname; // Update to 'edit_title'
            document.getElementById('edit_scientificName').value = scientificName;
            document.getElementById('edit_plantCategoryId').value = plantCategoryId;
            document.getElementById('edit_availability').value = availability;
            document.getElementById('edit_growthRequirements').value = growthRequirements;
            document.getElementById('edit_geographicalDistribution').value = geographicalDistribution;
            document.getElementById('edit_partUsed').value = partUsed;
            document.getElementById('edit_traditionalUses').value = traditionalUses;
            document.getElementById('edit_modernUses').value = modernUses;
            document.getElementById('edit_toxicityInformation').value = toxicityInformation;
            document.getElementById('edit_associatedDiseases').value = associatedDiseases;
            document.getElementById('edit_medicalUses').value = medicalUses;
            document.getElementById('edit_description').value = description;

            // Show the edit modal
            $('#editPlantModal').modal('show');
        }

        function confirmDelete(plantId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('plantId').value = plantId;

            // Show the delete modal
            $('#deletePlanttModal').modal('show');
        }

        function viewPlant(id, plantname, scientificName, plantCategoryId, availability, growthRequirements,
            geographicalDistribution, partUsed, traditionalUses, modernUses, toxicityInformation, associatedDiseases,
            medicalUses, description) {
            // Set the values of the inputs in the modal
            document.getElementById('view_plant_id').value = id;
            document.getElementById('view_plantName').value = plantname; // Update to 'edit_title'
            document.getElementById('view_scientificName').value = scientificName;
            document.getElementById('view_plantCategoryId').value = plantCategoryId;
            document.getElementById('view_availability').value = availability;
            document.getElementById('view_growthRequirements').value = growthRequirements;
            document.getElementById('view_geographicalDistribution').value = geographicalDistribution;
            document.getElementById('view_partUsed').value = partUsed;
            document.getElementById('view_traditionalUses').value = traditionalUses;
            document.getElementById('view_modernUses').value = modernUses;
            document.getElementById('view_toxicityInformation').value = toxicityInformation;
            document.getElementById('view_associatedDiseases').value = associatedDiseases;
            document.getElementById('view_medicalUses').value = medicalUses;
            document.getElementById('view_description').value = description;

            // Show the edit modal
            $('#viewPlantModal').modal('show');
        }
    </script>
@endpush
