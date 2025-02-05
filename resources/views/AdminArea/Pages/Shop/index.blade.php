@extends('AdminArea.Layout.main')

@section('Admincontainer')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Sale Plant Table</h3>
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
                    <h4 class="card-title">Sale Plants Records</h4>
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
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Final Price</th>
                                            <th>Stock Quantity</th>
                                            <th>Images</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sale_plants as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->plantname }}</td>
                                                <td>{{ $item->category->categoryName ?? 'N/A' }}</td>
                                                <!-- Display category name -->
                                                <td>{{ $item->scientificName }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->discount }}</td>
                                                <td>{{ $item->finalPrice }}</td>
                                                <td>{{ $item->stockQuantity }}</td>


                                                <td>
                                                    <button type="button" class="btn btn-link text-primary p-0"
                                                        data-toggle="modal" data-target="#uploadImageModal"
                                                        onclick="openUploadImageModal('{{ $item->salePlantId }}')">
                                                        <i class="fas fa-plus-circle menu-icon"></i>
                                                    </button>

                                                    <a
                                                        href="{{ route('SalePlants.viewPlantImageAll', $item->salePlantId) }}">
                                                        <i class="fas fa-eye menu-icon"></i>

                                                    </a>

                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="editPlant('{{ $item->id }}', '{{ $item->plantname }}', '{{ $item->scientificName }}',
                                                    '{{ $item->plantCategoryId }}', '{{ $item->price }}', '{{ $item->stockQuantity }}',
                                                    '{{ $item->discount }}', '{{ $item->finalPrice }}', '{{ $item->plantingRequirements }}',
                                                    '{{ $item->maintenanceLevel }}', '{{ $item->description }}')">
                                                        <i class="fas fa-edit menu-icon"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-link text-danger p-0"
                                                        onclick="confirmDelete('{{ $item->id }}')">
                                                        <i class="fas fa-trash menu-icon"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="viewPlant('{{ $item->id }}', '{{ $item->plantname }}', '{{ $item->scientificName }}',
                                                    '{{ $item->plantCategoryId }}', '{{ $item->price }}', '{{ $item->stockQuantity }}',
                                                    '{{ $item->discount }}', '{{ $item->finalPrice }}', '{{ $item->plantingRequirements }}',
                                                    '{{ $item->maintenanceLevel }}', '{{ $item->description }}')">
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
                    <form action="{{ route('SalePlants.add') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="price">Price <span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Price"
                                    required oninput="calculateFinalPrice()">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="stockQuantity">Stock Quantity</label>
                                <textarea class="form-control" id="stockQuantity" name="stockQuantity" rows="2" placeholder="Stock Quantity"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="discount">Discount (%)</label>
                                <input type="number" class="form-control" id="discount" name="discount"
                                    placeholder="Discount" oninput="calculateFinalPrice()">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="finalPrice">Final Price (After Discount)</label>
                                <input type="text" class="form-control" id="finalPrice" name="finalPrice"
                                    placeholder="Final Price" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="plantName">Planting Requirements <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="plantingRequirements"
                                    name="plantingRequirements" placeholder="Planting Requirements" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="scientificName">Maintenance Level <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="maintenanceLevel" name="maintenanceLevel"
                                    placeholder="Maintenance Level" required>
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

    {{-- Edit Sale Plants --}}

    <div class="modal fade" id="editPlantModal" tabindex="-1" role="dialog" aria-labelledby="editPlantLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPlantLabel">Edit Plant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('SalePlants.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="edit_plant_id" name="id">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editPlantName">Plant Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="editPlantName" name="plantname"
                                    value="{{ $item->plantname }}" required pattern=".*\S.*"
                                    title="Whitespace-only input is not allowed.">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="editScientificName">Scientific Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="editScientificName" name="scientificName"
                                    value="{{ $item->scientificName }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editPlantCategoryId">Plant Category <span style="color: red;">*</span></label>
                                <select class="form-control" id="editPlantCategoryId" name="plantCategoryId" required>
                                    <option value="">-- Select Category --</option>
                                    @foreach ($plant_categories as $category)
                                        <option value="{{ $category->plantCategoryId }}"
                                            {{ $item->plantCategoryId == $category->plantCategoryId ? 'selected' : '' }}>
                                            {{ $category->categoryName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="editPrice">Price <span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="editPrice" name="price"
                                    value="{{ $item->price }}" required oninput="calculateFinalPrice()">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editStockQuantity">Stock Quantity <span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="editStockQuantity" name="stockQuantity"
                                    value="{{ $item->stockQuantity }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="editDiscount">Discount (%)</label>
                                <input type="number" class="form-control" id="editDiscount" name="discount"
                                    value="{{ $item->discount }}" oninput="calculateFinalPrice()">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editFinalPrice">Final Price (After Discount)</label>
                                <input type="text" class="form-control" id="editFinalPrice" name="finalPrice"
                                    value="{{ $item->finalPrice }}" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="editPlantingRequirements">Planting Requirements <span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="editPlantingRequirements"
                                    name="plantingRequirements" value="{{ $item->plantingRequirements }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="editMaintenanceLevel">Maintenance Level <span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="editMaintenanceLevel"
                                    name="maintenanceLevel" value="{{ $item->maintenanceLevel }}" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="editDescription">Description <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="editDescription" name="description" rows="3" required>{{ $item->description }}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
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
                    <h5 class="modal-title" id="viewPlantLabel">Edit Plant</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('SalePlants.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="view_plant_id" name="id">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="viewPlantName">Plant Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="viewPlantName" name="plantname"
                                    value="{{ $item->plantname }}" required pattern=".*\S.*"
                                    title="Whitespace-only input is not allowed."readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="viewScientificName">Scientific Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="viewScientificName" name="scientificName"
                                    value="{{ $item->scientificName }}" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="viewPlantCategoryId">Plant Category <span style="color: red;">*</span></label>
                                <select class="form-control" id="viewPlantCategoryId" name="plantCategoryId" disabled>
                                    <option value="">-- Select Category --</option>
                                    @foreach ($plant_categories as $category)
                                        <option value="{{ $category->plantCategoryId }}"
                                            {{ $item->plantCategoryId == $category->plantCategoryId ? 'selected' : '' }}>
                                            {{ $category->categoryName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="viewPrice">Price <span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="viewPrice" name="price"
                                    value="{{ $item->price }}" required oninput="calculateFinalPrice()"readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="viewStockQuantity">Stock Quantity <span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="viewStockQuantity" name="stockQuantity"
                                    value="{{ $item->stockQuantity }}" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="viewDiscount">Discount (%)</label>
                                <input type="number" class="form-control" id="viewDiscount" name="discount"
                                    value="{{ $item->discount }}" oninput="calculateFinalPrice()" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="viewFinalPrice">Final Price (After Discount)</label>
                                <input type="text" class="form-control" id="viewFinalPrice" name="finalPrice"
                                    value="{{ $item->finalPrice }}" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="viewPlantingRequirements">Planting Requirements <span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="viewPlantingRequirements"
                                    name="plantingRequirements" value="{{ $item->plantingRequirements }}" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="viewMaintenanceLevel">Maintenance Level <span
                                        style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="viewMaintenanceLevel"
                                    name="maintenanceLevel" value="{{ $item->maintenanceLevel }}" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="viewDescription">Description <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="viewDescription" name="description" rows="3" readonly>{{ $item->description }}</textarea>
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
                    <form id="deleteProductForm" action="{{ route('SalePlants.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="salePlantId">
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
                    <form action="{{ route('SalePlants.plantImageAdd') }}" method="POST" enctype="multipart/form-data" id="uploadImageForm">
                        @csrf
                        <input type="hidden" id="uploadsalePlantId" name="salePlantId">
                        <div class="form-group">
                            <label for="image">Select Image <span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="image" name="image" required accept="image/*">
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
        function openUploadImageModal(salePlantId) {
            document.getElementById('uploadsalePlantId').value = salePlantId;
        }
    </script>

    <script>
        function editPlant(id, plantname, scientificName, plantCategoryId, price, stockQuantity, discount, finalPrice,
            plantingRequirements, maintenanceLevel, description) {
            document.getElementById('edit_plant_id').value = id;
            document.getElementById('editPlantName').value = plantname;
            document.getElementById('editScientificName').value = scientificName;
            document.getElementById('editPlantCategoryId').value = plantCategoryId;
            document.getElementById('editPrice').value = price;
            document.getElementById('editStockQuantity').value = stockQuantity;
            document.getElementById('editDiscount').value = discount;
            document.getElementById('editFinalPrice').value = finalPrice;
            document.getElementById('editPlantingRequirements').value = plantingRequirements;
            document.getElementById('editMaintenanceLevel').value = maintenanceLevel;
            document.getElementById('editDescription').value = description;

            // Ensure modal opens
            $('#editPlantModal').modal('show');
        }



        function confirmDelete(salePlantId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('salePlantId').value = salePlantId;

            // Show the delete modal
            $('#deletePlanttModal').modal('show');
        }

        function viewPlant(id, plantname, scientificName, plantCategoryId, price, stockQuantity, discount, finalPrice,
            plantingRequirements, maintenanceLevel, description) {
            document.getElementById('view_plant_id').value = id;
            document.getElementById('viewPlantName').value = plantname;
            document.getElementById('viewScientificName').value = scientificName;
            document.getElementById('viewPlantCategoryId').value = plantCategoryId;
            document.getElementById('viewPrice').value = price;
            document.getElementById('viewStockQuantity').value = stockQuantity;
            document.getElementById('viewDiscount').value = discount;
            document.getElementById('viewFinalPrice').value = finalPrice;
            document.getElementById('viewPlantingRequirements').value = plantingRequirements;
            document.getElementById('viewMaintenanceLevel').value = maintenanceLevel;
            document.getElementById('viewDescription').value = description;

            // Ensure modal opens
            $('#viewPlantModal').modal('show');
        }
    </script>

    <script>
        function calculateFinalPrice() {
            let price = parseFloat(document.getElementById('price').value) || 0;
            let discount = parseFloat(document.getElementById('discount').value) || 0;

            let finalPrice = price - (price * discount / 100);
            document.getElementById('finalPrice').value = finalPrice.toFixed(2);
        }
    </script>
@endpush
