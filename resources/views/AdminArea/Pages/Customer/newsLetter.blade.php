@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Newsletter Data Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sendEmailModal">
                            Send Email <i class="fa fa-plus-circle ml-1"></i>
                        </button>

                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Newsletter Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table ">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>

                                        <th>Email</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news_letters as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>

                                            <td>{{ $item->email }}</td>

                                            <td>

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

<!-- Send Email Modal -->
<div class="modal fade" id="sendEmailModal" tabindex="-1" role="dialog" aria-labelledby="sendEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendEmailModalLabel">Send Bulk Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ContactUs.sendBulkEmail') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="emailSubject">Email Subject</label>
                        <input type="text" name="subject" id="emailSubject" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="emailMessage">Email Body</label>
                        <textarea name="message" id="emailMessage" rows="5" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send Email</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>




{{-- Delete Modal --}}
<div class="modal fade" id="deleteNewsLetterModal" tabindex="-1" role="dialog" aria-labelledby="deleteNewsLetterLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this info?</h5>

            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteGalleryForm" action="{{ route('CustomerManagement.newsLetterDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="newsLetterId">
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
        function confirmDelete(newsLetterId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('newsLetterId').value = newsLetterId;

            // Show the delete modal
            $('#deleteNewsLetterModal').modal('show');
        }
    </script>
@endpush







