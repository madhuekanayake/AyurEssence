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
                                            {{-- <td>
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
                                            </td> --}}
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
</script>

@endpush

