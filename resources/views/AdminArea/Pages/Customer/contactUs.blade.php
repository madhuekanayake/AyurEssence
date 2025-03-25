@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Contact Us Data Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">

                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Message Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contact_us as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phoneNo }}</td>
                                            <td>{{ $item->massage }}</td>
                                            <td>
                                                @if ($item->isReply)
                                                    <span class="badge badge-success">Replied</span>
                                                @else
                                                    <span class="badge badge-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-link text-danger p-0"
                                                    onclick="confirmDelete('{{ $item->id }}')">
                                                    <i class="fas fa-trash menu-icon"></i>
                                                </button>
                                                @if (!$item->isReply)
                                                <button type="button" class="btn btn-link text-primary p-0"
                                                data-toggle="modal" data-target="#replyModal"
                                                onclick="populateReplyModal('{{ $item->id }}', '{{ $item->email }}', '{{ $item->name }}')">
                                                <i class="fas fa-reply"></i> Reply
                                            </button>

                                                @endif
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



{{-- Delete Modal --}}
<div class="modal fade" id="deleteContactUsModal" tabindex="-1" role="dialog" aria-labelledby="deleteContactUsLabel" aria-hidden="true">
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
                <form id="deleteGalleryForm" action="{{ route('CustomerManagement.contactUsDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="contactUsId">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i> Delete</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel">Reply to Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="replyForm" method="POST" action="{{ route('ContactUs.reply') }}">
                @csrf
                <input type="text" name="id" id="id" hidden>
                <input type="text" name="email" id="email" hidden>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subject">Email Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message Body</label>
                        <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Send Reply</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

@push('js')
    <script>
        function confirmDelete(contactUsId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('contactUsId').value = contactUsId;

            // Show the delete modal
            $('#deleteContactUsModal').modal('show');
        }
    </script>
    <script>

function populateReplyModal(id, email, name, message) {
    // Populate modal fields
    document.getElementById('id').value = id;
    document.getElementById('email').value = email;
    document.getElementById('subject').value = `Reply to ${name}`;
    document.getElementById('message').value = message;


}


    </script>
@endpush
