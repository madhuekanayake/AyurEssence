@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Meeting And Event Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addMeetingEventModal">
                            Add Meeting And Event <i class="fa fa-plus-circle ml-1"></i>
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Meeting And Event Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Contact No</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($meeting_and_events as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->startDate }}</td>
                                            <td>{{ $item->endDate }}</td>
                                            <td>{{ $item->startTime }}</td>
                                            <td>{{ $item->endTime }}</td>
                                            <td>{{ $item->contactNo }}</td>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset('storage/' . $item->image) }}" alt="Meeting And Event Image" width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
    onclick="editMeetingAndEvent(
        '{{ $item->id }}',
        '{{ $item->title }}',
        '{{ $item->content }}',
        '{{ $item->startDate }}',
        '{{ $item->endDate }}',
        '{{ $item->startTime }}',
        '{{ $item->endTime }}',
        '{{ $item->contactNo }}',
        '{{ $item->description }}'
    )">
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
{{-- Add Meeting and Event Modal --}}
<div class="modal fade" id="addMeetingEventModal" tabindex="-1" role="dialog" aria-labelledby="addMeetingEventLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMeetingEventLabel">Add New Meeting or Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('EducationalContent.meetingAndEventAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="title">Title <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="content">Content <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="content" name="content" rows="3" placeholder="Enter content" required></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="startDate">Start Date <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" id="startDate" name="startDate" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="endDate">End Date <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" id="endDate" name="endDate" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="startTime">Start Time <span style="color: red;">*</span></label>
                            <input type="time" class="form-control" id="startTime" name="startTime" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="endTime">End Time <span style="color: red;">*</span></label>
                            <input type="time" class="form-control" id="endTime" name="endTime" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="contactNo">Contact Number <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="contactNo" name="contactNo" placeholder="Enter contact number" required pattern="^\+?[0-9]{10,15}$" title="Please enter a valid phone number.">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="image">Image Upload</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Meeting and Event Modal --}}
<div class="modal fade" id="editMeetingAndEvent" tabindex="-1" role="dialog" aria-labelledby="editMeetingEventLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMeetingEventLabel">Edit Meeting or Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editMeetingEventForm" action="{{ route('EducationalContent.meetingAndEventUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit_meeting_event_id">

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="edit_title">Title <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_title" name="title" placeholder="Enter title" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_content">Content <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_content" name="content" rows="3" placeholder="Enter content" required></textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="edit_startDate">Start Date <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" id="edit_startDate" name="startDate" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_endDate">End Date <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" id="edit_endDate" name="endDate" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="edit_startTime">Start Time <span style="color: red;">*</span></label>
                            <input type="time" class="form-control" id="edit_startTime" name="startTime" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_endTime">End Time <span style="color: red;">*</span></label>
                            <input type="time" class="form-control" id="edit_endTime" name="endTime" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_contactNo">Contact Number <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_contactNo" name="contactNo" placeholder="Enter contact number" required pattern="^\+?[0-9]{10,15}$" title="Please enter a valid phone number.">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_description" name="description" rows="3" placeholder="Enter description" required></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_image">Update Image</label>
                            <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
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
<div class="modal fade" id="deleteMeetingAndEventModal" tabindex="-1" role="dialog" aria-labelledby="deleteMeetingAndEventLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this gallery item?</h5>

            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteMeetingAndEventForm" action="{{ route('EducationalContent.meetingAndEventDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="meetingAndEventlId">
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
        function editMeetingAndEvent(id, title, content, startDate, endDate, startTime, endTime, contactNo, description) {
    

    // Set the values of the inputs in the modal
    document.getElementById('edit_meeting_event_id').value = id;
    document.getElementById('edit_title').value = title;
    document.getElementById('edit_content').value = content;
    document.getElementById('edit_startDate').value = startDate;
    document.getElementById('edit_endDate').value = endDate;
    document.getElementById('edit_startTime').value = startTime;
    document.getElementById('edit_endTime').value = endTime;
    document.getElementById('edit_contactNo').value = contactNo;
    document.getElementById('edit_description').value = description;

    // Show the edit modal
    $('#editMeetingAndEvent').modal('show');
}


        function confirmDelete(meetingAndEventlId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('meetingAndEventlId').value = meetingAndEventlId;

            // Show the delete modal
            $('#deleteMeetingAndEventModal').modal('show');
        }
    </script>
@endpush



