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
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->gender }}</td>


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
                                            {{-- <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                    onclick="editSpecialization('{{ $item->id }}', '{{ $item->specializationName }}', '{{ $item->description }}')">
                                                    <i class="fas fa-edit menu-icon"></i>
                                                </button>
                                                <button type="button" class="btn btn-link text-danger p-0"
                                                    onclick="confirmDelete('{{ $item->id }}')">
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
                    <div class="form-row">
                        <!-- Name -->
                        <div class="form-group col-md-6">
                            <label for="name">Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>
                        <!-- Email -->
                        <div class="form-group col-md-6">
                            <label for="email">Email <span style="color: red;">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- Phone Number -->
                        <div class="form-group col-md-6">
                            <label for="phoneNo">Phone Number <span style="color: red;">*</span></label>
                            <input type="tel" class="form-control" id="phoneNo" name="phoneNo" placeholder="Phone Number" required pattern="[0-9]{10}" title="Enter a valid 10-digit phone number.">
                        </div>
                        <!-- Gender -->
                        <div class="form-group col-md-6">
                            <label for="gender">Gender <span style="color: red;">*</span></label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- Profile Picture -->
                        <div class="form-group col-md-6">
                            <label for="profilePicture">Profile Picture <span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="profilePicture" name="profilePicture" required>
                        </div>
                        <!-- Specialization -->

                        <div class="form-group col-md-6">
                            <label for="specializationId">Specialization <span class="text-danger">*</span></label>
                            <select class="form-control" id="specializationId" name="specializationId" required>
                                <option value="">-- Select Specialization --</option>
                                @foreach ($specialzations as $specialization)
                                    <option value="{{ $specialization->specializationId }}">{{ $specialization->specializationName }}</option>
                                @endforeach
                            </select>
                        </div>

                    <div class="form-row">
                        <!-- Years of Experience -->
                        <div class="form-group col-md-6">
                            <label for="yearsOfExperience">Years of Experience <span style="color: red;">*</span></label>
                            <input type="number" class="form-control" id="yearsOfExperience" name="yearsOfExperience" placeholder="Years of Experience" required>
                        </div>
                        <!-- Qualification -->
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

                    <div class="form-row">
                        <!-- Registration Number -->
                        <div class="form-group col-md-6">
                            <label for="registerNo">Registration Number <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="registerNo" name="registerNo" placeholder="Registration Number" required>
                        </div>
                        <!-- Workplace Name -->
                        <div class="form-group col-md-6">
                            <label for="workplaceName">Workplace Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="workplaceName" name="workplaceName" placeholder="Workplace Name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- Available Days -->
                        <div class="form-group col-md-6">
                            <label for="availableDays">Available Days <span style="color: red;">*</span></label>
                            <select class="form-control" id="availableDays" name="availableDays" required>
                                <option value="" disabled selected>Select Open Days</option>
                                    <option value="Weekdays">Weekdays</option>
                                    <option value="Weekends">Weekends</option>
                            </select>
                        </div>
                        <!-- Consultation Start Time -->
                        <div class="form-group col-md-3">
                            <label for="consultationStartTime">Start Time <span style="color: red;">*</span></label>
                            <input type="time" class="form-control" id="consultationStartTime" name="consultationStartTime" required>
                        </div>
                        <!-- Consultation End Time -->
                        <div class="form-group col-md-3">
                            <label for="consultationEndTime">End Time <span style="color: red;">*</span></label>
                            <input type="time" class="form-control" id="consultationEndTime" name="consultationEndTime" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- Description -->
                        <div class="form-group col-md-12">
                            <label for="description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Brief Description about the Doctor" required></textarea>
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
