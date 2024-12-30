@extends('AdminArea.Layout.main')

@section('Admincontainer')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Local Pharmacies Table</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addPharmacyModal">
                                Add Pharmacy Details <i class="fa fa-plus-circle ml-1"></i>
                            </button>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pharmacy Records</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="pharmacy-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>E-mail</th>
                                            <th>Phone No</th>

                                            <th>Open Time</th>
                                            <th>Close Time</th>
                                            <th>Open Days</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($local_pharmacies as $pharmacy)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pharmacy->id }}</td>
                                                <td>{{ $pharmacy->name }}</td>
                                                <td>{{ $pharmacy->address }}</td>
                                                <td>{{ $pharmacy->email }}</td>
                                                <td>{{ $pharmacy->phoneNo }}</td>

                                                <td>{{ $pharmacy->openTime }}</td>
                                                <td>{{ $pharmacy->closeTime }}</td>
                                                <td>{{ $pharmacy->openDays }}</td>

                                                <td>
                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="editPharmacy(
                                                        '{{ $pharmacy->id }}',
                                                        '{{ $pharmacy->name }}',
                                                        '{{ $pharmacy->address }}',
                                                        '{{ $pharmacy->email }}',
                                                        '{{ $pharmacy->phoneNo }}',
                                                        '{{ $pharmacy->location }}',
                                                        '{{ $pharmacy->openTime }}',
                                                        '{{ $pharmacy->closeTime }}',
                                                        '{{ $pharmacy->openDays }}',
                                                        '{{ $pharmacy->description }}'
                                                    )">
                                                        <i class="fas fa-edit menu-icon"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-link text-danger p-0"
                                                        onclick="confirmDelete('{{ $pharmacy->id }}')">
                                                        <i class="fas fa-trash menu-icon"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="viewPharmacy(
        '{{ $pharmacy->id }}',
        '{{ $pharmacy->name }}',
        '{{ $pharmacy->address }}',
        '{{ $pharmacy->email }}',
        '{{ $pharmacy->phoneNo }}',
        '{{ $pharmacy->location }}',
        '{{ $pharmacy->openTime }}',
        '{{ $pharmacy->closeTime }}',
        '{{ $pharmacy->openDays }}',
        '{{ $pharmacy->description }}'
    )">
                                                        <i class="fas fa-arrow-right menu-icon"></i>
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

    {{-- Add Pharmacy Modal --}}
    <div class="modal fade" id="addPharmacyModal" tabindex="-1" role="dialog" aria-labelledby="addPharmacyLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPharmacyLabel">Add New Pharmacy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Location.localPharmacyAdd') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Pharmacy Name" required pattern=".*\S.*"
                                    title="Whitespace-only input is not allowed.">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="address">Address <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Pharmacy Address" required pattern=".*\S.*"
                                    title="Whitespace-only input is not allowed.">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">E-mail <span style="color: red;">*</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Pharmacy Email" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phoneNo">Phone No <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="phoneNo" name="phoneNo"
                                    placeholder="Pharmacy Phone No" required pattern="\d+"
                                    title="Please enter a valid phone number.">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="location">Location <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="location" name="location"
                                    placeholder="Pharmacy Location" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="openTime">Open Time <span style="color: red;">*</span></label>
                                <input type="time" class="form-control" id="openTime" name="openTime" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="closeTime">Close Time <span style="color: red;">*</span></label>
                                <input type="time" class="form-control" id="closeTime" name="closeTime" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="openDays">Open Days <span style="color: red;">*</span></label>
                                <select class="form-control" id="openDays" name="openDays" required>
                                    <option value="Weekdays">Weekdays</option>
                                    <option value="Weekends">Weekends</option>
                                    <option value="All Days">All Days</option>
                                </select>
                            </div>



                            <div class="form-group col-md-12">
                                <label for="description">Description <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                    placeholder="Pharmacy Description" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Local Pharmacy Modal --}}
    <div class="modal fade" id="editPharmacyModal" tabindex="-1" role="dialog" aria-labelledby="editPharmacyLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPharmacyLabel">Edit Pharmacy Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editPharmacyForm" action="{{ route('Location.localPharmacyUpdate') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="edit_pharmacy_id">

                        <div class="form-row">
                            <!-- Pharmacy Name and Email -->
                            <div class="form-group col-md-6">
                                <label for="edit_name">Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="edit_name" name="name"
                                    placeholder="Pharmacy Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit_email">Email <span style="color: red;">*</span></label>
                                <input type="email" class="form-control" id="edit_email" name="email"
                                    placeholder="Pharmacy Email" required>
                            </div>

                            <!-- Pharmacy Address -->
                            <div class="form-group col-md-6">
                                <label for="edit_address">Address <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="edit_address" name="address" placeholder="Pharmacy Address" required></textarea>
                            </div>

                            <!-- Phone Number and Location -->
                            <div class="form-group col-md-6">
                                <label for="edit_phoneNo">Phone Number <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="edit_phoneNo" name="phoneNo"
                                    placeholder="Phone Number" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit_location">Location <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="edit_location" name="location"
                                    placeholder="Pharmacy Location" required>
                            </div>

                            <!-- Opening and Closing Times -->
                            <div class="form-group col-md-6">
                                <label for="edit_openTime">Opening Time <span style="color: red;">*</span></label>
                                <input type="time" class="form-control" id="edit_openTime" name="openTime" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit_closeTime">Closing Time <span style="color: red;">*</span></label>
                                <input type="time" class="form-control" id="edit_closeTime" name="closeTime"
                                    required>
                            </div>

                            <!-- Open Days -->
                            <div class="form-group col-md-6">
                                <label for="edit_openDays">Open Days <span style="color: red;">*</span></label>
                                <select class="form-control" id="edit_openDays" name="openDays" required>
                                    <option value="Weekdays">Weekdays</option>
                                    <option value="Weekends">Weekends</option>
                                    <option value="All Days">All Days</option>
                                </select>
                            </div>

                            <!-- Description -->
                            <div class="form-group col-md-12">
                                <label for="edit_description">Description <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="edit_description" name="description" placeholder="Pharmacy Description" required></textarea>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- View Local Pharmacy Modal --}}
    <div class="modal fade" id="viewPharmacyModal" tabindex="-1" role="dialog" aria-labelledby="viewPharmacyLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewPharmacyLabel">Edit Pharmacy Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="viewPharmacyForm" action="{{ route('Location.localPharmacyUpdate') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="view_pharmacy_id">

                        <div class="form-row">
                            <!-- Pharmacy Name and Email -->
                            <div class="form-group col-md-6">
                                <label for="view_name">Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="view_name" name="name"
                                    placeholder="Pharmacy Name" required readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="view_email">Email <span style="color: red;">*</span></label>
                                <input type="email" class="form-control" id="view_email" name="email"
                                    placeholder="Pharmacy Email" required readonly>
                            </div>

                            <!-- Pharmacy Address -->
                            <div class="form-group col-md-6">
                                <label for="view_address">Address <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="view_address" name="address" placeholder="Pharmacy Address" required readonly></textarea>
                            </div>

                            <!-- Phone Number and Location -->
                            <div class="form-group col-md-6">
                                <label for="view_phoneNo">Phone Number <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="view_phoneNo" name="phoneNo"
                                    placeholder="Phone Number" required readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="view_location">Location <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="view_location" name="location"
                                    placeholder="Pharmacy Location" required readonly>
                            </div>

                            <!-- Opening and Closing Times -->
                            <div class="form-group col-md-6">
                                <label for="view_openTime">Opening Time <span style="color: red;">*</span></label>
                                <input type="time" class="form-control" id="view_openTime" name="openTime" required
                                    readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="view_closeTime">Closing Time <span style="color: red;">*</span></label>
                                <input type="time" class="form-control" id="view_closeTime" name="closeTime" required
                                    readonly>
                            </div>

                            <!-- Open Days -->
                            <div class="form-group col-md-6">
                                <label for="view_openDays">Open Days <span style="color: red;">*</span></label>
                                <select class="form-control" id="view_openDays" name="openDays" required disabled>
                                    <option value="Weekdays">Weekdays</option>
                                    <option value="Weekends">Weekends</option>
                                    <option value="All Days">All Days</option>
                                </select>
                            </div>

                            <!-- Description -->
                            <div class="form-group col-md-12">
                                <label for="view_description">Description <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="view_description" name="description" placeholder="Pharmacy Description" required
                                    readonly></textarea>
                            </div>
                        </div>

                        <!-- Buttons -->

                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="deletePharmacyModal" tabindex="-1" role="dialog"
        aria-labelledby="deletePharmacyLabel" aria-hidden="true">
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
                    <h5>Are you sure you want to delete this Ayurvedic Hospital item?</h5>
                </div>
                <div class="modal-footer" style="padding: 10px;">
                    <form id="deletePharmacyForm" action="{{ route('Location.localPharmacyDelete') }}"
                        method="POST">
                        @csrf
                        <input type="hidden" name="id" id="localPharmacyId"> <!-- Updated ID here -->
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
        function editPharmacy(id, name, address, email, phoneNo, location, openTime, closeTime, openDays, description) {
            // Set the values of the inputs in the modal
            document.getElementById('edit_pharmacy_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_address').value = address;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_phoneNo').value = phoneNo; // Fixed the ID
            document.getElementById('edit_location').value = location;
            document.getElementById('edit_openTime').value = openTime;
            document.getElementById('edit_closeTime').value = closeTime;
            document.getElementById('edit_openDays').value = openDays;
            document.getElementById('edit_description').value = description;

            // Show the edit modal
            $('#editPharmacyModal').modal('show');
        }

        // Function to confirm delete action
        function confirmDelete(localPharmacyId) {
            // Set the hospital ID in the hidden input field of the delete modal
            document.getElementById('localPharmacyId').value = localPharmacyId;

            // Show the delete modal
            $('#deletePharmacyModal').modal('show');


        }

        function viewPharmacy(id, name, address, email, phoneNo, location, openTime, closeTime, openDays, description) {
            // Set the values of the inputs in the modal
            document.getElementById('view_pharmacy_id').value = id;
            document.getElementById('view_name').value = name;
            document.getElementById('view_address').value = address;
            document.getElementById('view_email').value = email;
            document.getElementById('view_phoneNo').value = phoneNo;
            document.getElementById('view_location').value = location;
            document.getElementById('view_openTime').value = openTime;
            document.getElementById('view_closeTime').value = closeTime;
            document.getElementById('view_openDays').value = openDays;
            document.getElementById('view_description').value = description;

            // Show the modal
            $('#viewPharmacyModal').modal('show');
        }
    </script>
@endpush
