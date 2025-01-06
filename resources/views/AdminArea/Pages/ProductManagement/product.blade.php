@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Product Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addProductModal">
                            Add Products<i class="fa fa-plus-circle ml-1"></i>
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product Category Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Product Category</th>
                                        <th>Description</th>
                                        <th>Images</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->productName }}</td>
                                            <td>{{ $item->category->categoryName ?? 'N/A' }}</td> <!-- Display category name -->
                                            <td>{{ $item->description }}</td>
                                            

                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0"
                                                    data-toggle="modal" data-target="#uploadImageModal"
                                                    onclick="openUploadImageModal('{{ $item->productId }}')">
                                                    <i class="fas fa-plus-circle menu-icon"></i>
                                                </button>

                                                {{-- <a
                                                    href="{{ route('Location.viewAyurvedicHospitalImageAll', $item->productId) }}">
                                                    <i class="fas fa-eye menu-icon"></i>

                                                </a> --}}

                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                    onclick="editProduct('{{ $item->id }}', '{{ $item->productName }}', '{{ $item->productCategoryId }}','{{ $item->description }}')">
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

{{-- Add Product Modal --}}
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ProductManagement.productAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="productName">Product Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="categoryId">Product Category <span style="color: red;">*</span></label>
                            <select class="form-control" id="categoryId" name="productCategoryId" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($product_categories as $category)
                                    <option value="{{ $category->productCategoryId }}">{{ $category->categoryName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Product Description" required></textarea>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Edit Product Modal --}}
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductLabel">Edit New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ProductManagement.productUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit_product_id">

                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="edit_productName">Product Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_productName" name="productName" placeholder="Product Name" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_categoryId">Product Category <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_categoryId" name="productCategoryId" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($product_categories as $category)
                                    <option value="{{ $category->productCategoryId }}">{{ $category->categoryName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_description" name="description" rows="3" placeholder="Product Description" required></textarea>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this Product item?</h5>

            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteProductForm" action="{{ route('ProductManagement.productDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="productId">
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
            <h5 class="modal-title" id="uploadImageLabel">Upload Treatment Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('ProductManagement.productImageAdd') }}" method="POST" enctype="multipart/form-data"
                id="uploadImageForm">
                @csrf
                <input type="hidden" id="uploadproductId" name="productId">
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
    function openUploadImageModal(productId) {
    document.getElementById('uploadproductId').value = productId;
}

</script>

    <script>
        function editProduct(id, productName,productCategoryId, description) {
            // Set the values of the inputs in the modal
            document.getElementById('edit_product_id').value = id;
            document.getElementById('edit_productName').value = productName;  // Update to 'edit_title'
            document.getElementById('edit_categoryId').value = productCategoryId;
            document.getElementById('edit_description').value = description;

            // Show the edit modal
            $('#editProductModal').modal('show');
        }

        function confirmDelete(productId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('productId').value = productId;

            // Show the delete modal
            $('#deleteProductModal').modal('show');
        }
    </script>


@endpush
