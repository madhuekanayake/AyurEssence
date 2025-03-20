@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Portfolio Data Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addPortfolioModal">
                            Add Portfolio Image <i class="fa fa-plus-circle ml-1"></i>
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Portfolio Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Portfolio ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($portfolios as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Portfolio Image" width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                    onclick="editPortfolio('{{ $item->id }}', '{{ $item->title }}')">
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

{{-- Add Portfolio Modal --}}
<div class="modal fade" id="addPortfolioModal" tabindex="-1" role="dialog" aria-labelledby="addPortfolioLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPortfolioLabel">Add New Portfolio Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('SalePlants.portfolioAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">Title <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Portfolio Title" required>
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

{{-- Edit Portfolio Modal --}}
<div class="modal fade" id="editPortfolioModal" tabindex="-1" role="dialog" aria-labelledby="editPortfolioLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPortfolioLabel">Edit Portfolio Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editPortfolioForm" action="{{ route('SalePlants.portfolioUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="portfolioId" id="edit_portfolio_id">

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="edit_title">Title <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_title" name="title" placeholder="Portfolio Title" required>
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
<div class="modal fade" id="deletePortfolioModal" tabindex="-1" role="dialog" aria-labelledby="deletePortfolioLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this portfolio item?</h5>
            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deletePortfolioForm" action="{{ route('SalePlants.portfolioDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="portfolioId">
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
        function editPortfolio(id, title) {
            document.getElementById('edit_portfolio_id').value = id;
            document.getElementById('edit_title').value = title;
            $('#editPortfolioModal').modal('show');
        }

        function confirmDelete(portfolioId) {
            document.getElementById('portfolioId').value = portfolioId;
            $('#deletePortfolioModal').modal('show');
        }
    </script>
@endpush
