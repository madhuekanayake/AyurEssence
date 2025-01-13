@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Doctors Data Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addDoctorModal">
                            Add Doctors <i class="fa fa-plus-circle ml-1"></i>
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Doctor Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Doctor Name</th>
                                        <th>E mail</th>
                                        <th>Gender</th>
                                        <th>Profile Picture</th>
                                        <th>Specialization</th>
                                        <th>Workplace Name</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->workplaceName }}</td>
                                            <td>{{ $item->qualification }}</td>


                                            <td>
                                                @if ($item->profilePicture)
                                                    <img src="{{ asset('storage/' . $item->profilePicture) }}" alt="Doctor Image" width="100">
                                                @else
                                                    No profilePicture
                                                @endif
                                            </td>
                                            <td>{{ $item->specialzations->specializationName ?? 'N/A' }}</td>

                                            <td>{{ $item->workplaceName }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                <button
                                                type="button"
                                                class="btn btn-link text-primary p-0 mr-2"
                                                onclick="editDoctor(
                                                    '{{ $item->id }}',
                                                    '{{ $item->name }}',
                                                    '{{ $item->email }}',
                                                    '{{ $item->phoneNo }}',
                                                    '{{ $item->gender }}',
                                                    '{{ $item->profilePicture }}',
                                                    '{{ $item->specializationId }}',
                                                    '{{ $item->yearsOfExperience }}',
                                                    '{{ $item->qualification }}',
                                                    '{{ $item->registerNo }}',
                                                    '{{ $item->workplaceName }}',
                                                    '{{ $item->availableDays }}',
                                                    '{{ $item->consultationStartTime }}',
                                                    '{{ $item->consultationEndTime }}',
                                                    '{{ $item->description }}'
                                                )"
                                            >
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

{{-- Add Doctor Modal --}}

<div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDoctorLabel">Add New Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('DoctorManagement.doctorAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Row 1: Name and Email -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email <span style="color: red;">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                        </div>
                    </div>

                    <!-- Row 2: Phone Number and Gender -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="phoneNo">Phone Number <span style="color: red;">*</span></label>
                            <input type="tel" class="form-control" id="phoneNo" name="phoneNo" placeholder="Phone Number" required pattern="[0-9]{10}" title="Enter a valid 10-digit phone number.">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gender">Gender <span style="color: red;">*</span></label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 3: Profile Picture and Specialization -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="profilePicture">Profile Picture <span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="profilePicture" name="profilePicture" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="specializationId">Specialization <span class="text-danger">*</span></label>
                            <select class="form-control" id="specializationId" name="specializationId" required>
                                <option value="">-- Select Specialization --</option>
                                @foreach ($specialzations as $specialization)
                                    <option value="{{ $specialization->specializationId }}">{{ $specialization->specializationName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Row 4: Years of Experience and Qualification -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="yearsOfExperience">Years of Experience <span style="color: red;">*</span></label>
                            <input type="number" class="form-control" id="yearsOfExperience" name="yearsOfExperience" placeholder="Years of Experience" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="qualification">Qualification <span style="color: red;">*</span></label>
                            <select class="form-control" id="qualification" name="qualification" required>
                                <option value="" disabled selected>Select Qualification</option>
                                <option value="BAMS">BAMS</option>
                                <option value="MD in Ayurveda">MD in Ayurveda</option>
                                <option value="PhD in Ayurveda">PhD in Ayurveda</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 5: Registration Number and Workplace Name -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="registerNo">Registration Number <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="registerNo" name="registerNo" placeholder="Registration Number" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="workplaceName">Workplace Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="workplaceName" name="workplaceName" placeholder="Workplace Name" required>
                        </div>
                    </div>

                    <!-- Row 6: Available Days and Consultation Times -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="availableDays">Available Days <span style="color: red;">*</span></label>
                            <select class="form-control" id="availableDays" name="availableDays" required>
                                <option value="" disabled selected>Select Open Days</option>
                                <option value="Weekdays">Weekdays</option>
                                <option value="Weekends">Weekends</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="consultationStartTime">Start Time <span style="color: red;">*</span></label>
                            <input type="time" class="form-control" id="consultationStartTime" name="consultationStartTime" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="consultationEndTime">End Time <span style="color: red;">*</span></label>
                            <input type="time" class="form-control" id="consultationEndTime" name="consultationEndTime" required>
                        </div>
                    </div>

                    <!-- Row 7: Description -->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Brief Description about the Doctor" required></textarea>
                        </div>
                    </div>

                    <!-- Row 8: Buttons -->
                    <div class="form-row">
                        <div class="form-group col-md-12 text-left">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Doctor Modal --}}

<div class="modal fade" id="editDoctorModal" tabindex="-1" role="dialog" aria-labelledby="editDoctorLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDoctorLabel">Edit Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('DoctorManagement.doctorUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit_doctor_id">
                    <!-- Row 1: Name and Email -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_name">Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_name" name="edit_name" placeholder="Full Name" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_email">Email <span style="color: red;">*</span></label>
                            <input type="email" class="form-control" id="edit_email" name="edit_email" placeholder="Email Address" required>
                        </div>
                    </div>

                    <!-- Row 2: Phone Number and Gender -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_phoneNo">Phone Number <span style="color: red;">*</span></label>
                            <input type="tel" class="form-control" id="edit_phoneNo" name="edit_phoneNo" placeholder="Phone Number" required pattern="[0-9]{10}" title="Enter a valid 10-digit phone number.">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_gender">Gender <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_gender" name="edit_gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 3: Profile Picture and Specialization -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_profilePicture">Profile Picture <span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="edit_profilePicture" name="edit_profilePicture" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_specializationId">Specialization <span class="text-danger">*</span></label>
                            <select class="form-control" id="edit_specializationId" name="edit_specializationId" required>
                                <option value="">-- Select Specialization --</option>
                                @foreach ($specialzations as $specialization)
                                    <option value="{{ $specialization->specializationId }}">{{ $specialization->specializationName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Row 4: Years of Experience and Qualification -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_yearsOfExperience">Years of Experience <span style="color: red;">*</span></label>
                            <input type="number" class="form-control" id="edit_yearsOfExperience" name="edit_yearsOfExperience" placeholder="Years of Experience" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_qualification">Qualification <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_qualification" name="edit_qualification" required>
                                <option value="" disabled selected>Select Qualification</option>
                                <option value="BAMS">BAMS</option>
                                <option value="MD in Ayurveda">MD in Ayurveda</option>
                                <option value="PhD in Ayurveda">PhD in Ayurveda</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 5: Registration Number and Workplace Name -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_registerNo">Registration Number <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_registerNo" name="edit_registerNo" placeholder="Registration Number" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="workplaceName">Workplace Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_workplaceName" name="edit_workplaceName" placeholder="Workplace Name" required>
                        </div>
                    </div>

                    <!-- Row 6: Available Days and Consultation Times -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_availableDays">Available Days <span style="color: red;">*</span></label>
                            <select class="form-control" id="edit_availableDays" name="edit_availableDays" required>
                                <option value="" disabled selected>Select Open Days</option>
                                <option value="Weekdays">Weekdays</option>
                                <option value="Weekends">Weekends</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="edit_consultationStartTime">Start Time <span style="color: red;">*</span></label>
                            <input type="time" class="form-control" id="edit_consultationStartTime" name="edit_consultationStartTime" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="edit_consultationEndTime">End Time <span style="color: red;">*</span></label>
                            <input type="time" class="form-control" id="edit_consultationEndTime" name="edit_consultationEndTime" required>
                        </div>
                    </div>

                    <!-- Row 7: Description -->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="edit_description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_description" name="edit_description" rows="3" placeholder="Brief Description about the Doctor" required></textarea>
                        </div>
                    </div>

                    <!-- Row 8: Buttons -->
                    <div class="form-row">
                        <div class="form-group col-md-12 text-left">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="deleteDoctorModal" tabindex="-1" role="dialog" aria-labelledby="deleteDoctorLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this doctor info?</h5>

            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteGalleryForm" action="{{ route('DoctorManagement.doctorDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="doctorId">
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
        function editDoctor(id, name, email, phoneNo, gender, profilePicture, specializationId, yearsOfExperience, qualification, registerNo, workplaceName, availableDays, consultationStartTime, consultationEndTime, description) {
    // Set the values of the inputs in the modal
    document.getElementById('edit_doctor_id').value = id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_phoneNo').value = phoneNo;
    document.getElementById('edit_gender').value = gender;
    // Remove setting the value for profile picture as it's a file input
    //document.getElementById('edit_profilePicture').value = profilePicture;
    document.getElementById('edit_specializationId').value = specializationId;
    document.getElementById('edit_yearsOfExperience').value = yearsOfExperience;
    document.getElementById('edit_qualification').value = qualification;
    document.getElementById('edit_registerNo').value = registerNo;
    document.getElementById('edit_workplaceName').value = workplaceName;
    document.getElementById('edit_availableDays').value = availableDays;
    document.getElementById('edit_consultationStartTime').value = consultationStartTime;
    document.getElementById('edit_consultationEndTime').value = consultationEndTime;
    document.getElementById('edit_description').value = description;

    // Show the edit modal
    $('#editDoctorModal').modal('show');
}


        function confirmDelete(doctorId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('doctorId').value = doctorId;

            // Show the delete modal
            $('#deleteDoctorModal').modal('show');
        }
    </script>
@endpush
