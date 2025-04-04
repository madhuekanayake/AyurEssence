@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Plant Category Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addPlantCategoryModal">
                            Add Plant Category <i class="fa fa-plus-circle ml-1"></i>
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
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plant_categories as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->categoryName }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Category Image" width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                    onclick="editPlantCategory('{{ $item->id }}', '{{ $item->categoryName }}', '{{ $item->description }}')">
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

{{-- Add Plant Category Modal --}}
<div class="modal fade" id="addPlantCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addPlantCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPlantCategoryLabel">Add New Plant Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('PlantManagement.plantCategoryAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">


                        <div class="form-group col-md-12">
                            <label for="categoryName">Category Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Category Name" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Category Description" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="image">File Upload <span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Product Category Modal --}}
<div class="modal fade" id="editPlantCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editPlantCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPlantCategoryLabel">Edit Plant Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editPlantCategoryForm" action="{{ route('PlantManagement.plantCategoryUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit_plant_category_id">

                    <div class="form-row">


                        <div class="form-group col-md-12">
                            <label for="edit_category_name">Category Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_category_name" name="categoryName" placeholder="Category Name" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_description" name="description" placeholder="Category Description" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_image">Update Image</label>
                            <input type="file" class="form-control" id="edit_image" name="image">
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
<div class="modal fade" id="deletePlantCategoryModal" tabindex="-1" role="dialog" aria-labelledby="deletePlantCategoryIdLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this plant category?</h5>

            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteGalleryForm" action="{{ route('PlantManagement.plantCategoryDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="plantCategoryId">
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
        function editPlantCategory(id, categoryName, description) {
    // Set the values of the inputs in the modal
    document.getElementById('edit_plant_category_id').value = id;
    document.getElementById('edit_category_name').value = categoryName;
    document.getElementById('edit_description').value = description;

    // Show the correct modal
    $('#editPlantCategoryModal').modal('show'); // Correct ID
}


        function confirmDelete(plantCategoryId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('plantCategoryId').value = plantCategoryId;

            // Show the delete modal
            $('#deletePlantCategoryModal').modal('show');
        }
    </script>
@endpush


