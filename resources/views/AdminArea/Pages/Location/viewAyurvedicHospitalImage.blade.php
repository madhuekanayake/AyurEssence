@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Ayurvedic Hospital Data Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='{{ route('Location.ayurvedicHospitalAll') }}'">
                            <i class="fa fa-arrow-left mr-1"></i> Back
                        </button>

                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ayurvedic Hospital Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>

                                        <th>Image</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ayurvedic_hospital_images as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>

                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="AyurvedicHospital Image" width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            
                                            <td>
                                                {{-- <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                    onclick="editImage('{{ $item->id }}', '{{ $item->title }}', '{{ $item->description }}')">
                                                    <i class="fas fa-edit menu-icon"></i>
                                                </button> --}}
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

{{-- Delete Image Modal --}}
<div class="modal fade" id="deleteImageModal" tabindex="-1" role="dialog"
aria-labelledby="deleteImageLabel" aria-hidden="true">
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
            <h5>Are you sure you want to delete this image?</h5>

        </div>
        <div class="modal-footer" style="padding: 10px;">
            <form id="deleteImageForm" action="{{ route('Location.viewAyurvedicHospitalImageDelete') }}"
                method="POST">
                @csrf
                <input type="hidden" name="id" id="ayurvedicHospitalImageId">
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i>
                    Delete</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

@push('js')
    <script>

        function confirmDelete(ayurvedicHospitalImageId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('ayurvedicHospitalImageId').value = ayurvedicHospitalImageId;

            // Show the delete modal
            $('#deleteImageModal').modal('show');
        }
    </script>
@endpush
