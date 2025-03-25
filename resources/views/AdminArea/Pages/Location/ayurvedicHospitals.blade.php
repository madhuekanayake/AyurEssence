@extends('AdminArea.Layout.main')

@section('Admincontainer')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Ayurvedic Hospitals Table</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addAyurvedicHospitalModal">
                                Add Hospital Details <i class="fa fa-plus-circle ml-1"></i>
                            </button>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ayurvedic Hospitals Records</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="hospital-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Hospital Name</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ayurvedic_hospitals as $hospital)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $hospital->id }}</td>
                                                <td>{{ $hospital->name }}</td>
                                                <td>{{ $hospital->address }}</td>
                                                <td>{{ $hospital->email }}</td>

                                                <td>{{ $hospital->description }}</td>



                                                <td>
                                                    <button type="button" class="btn btn-link text-primary p-0"
                                                        data-toggle="modal" data-target="#uploadImageModal"
                                                        onclick="openUploadImageModal('{{ $hospital->ayurvedicHospitalId }}')">
                                                        <i class="fas fa-plus-circle menu-icon"></i>
                                                    </button>

                                                    <a
                                                        href="{{ route('Location.viewAyurvedicHospitalImageAll', $hospital->ayurvedicHospitalId) }}">
                                                        <i class="fas fa-eye menu-icon"></i>


                                                    </a>

                                                </td>




                                                <td>
                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="editHospital(
                                                        '{{ $hospital->id }}',
                                                        '{{ $hospital->name }}',
                                                        '{{ $hospital->address }}',
                                                        '{{ $hospital->email }}',
                                                        '{{ $hospital->phone }}',
                                                        '{{ $hospital->location }}',
                                                        '{{ $hospital->openTime }}',
                                                        '{{ $hospital->closeTime }}',
                                                        '{{ $hospital->openDays }}',
                                                        '{{ $hospital->description }}'
                                                    )">
                                                        <i class="fas fa-edit menu-icon"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-link text-danger p-0"
                                                        onclick="confirmDelete('{{ $hospital->id }}')">
                                                        <i class="fas fa-trash menu-icon"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="viewHospital(
                                                                            '{{ $hospital->id }}',
                                                                            '{{ $hospital->name }}',
                                                                            '{{ $hospital->address }}',
                                                                            '{{ $hospital->email }}',
                                                                            '{{ $hospital->phone }}',
                                                                            '{{ $hospital->location }}',
                                                                            '{{ $hospital->openTime }}',
                                                                            '{{ $hospital->closeTime }}',
                                                                            '{{ $hospital->openDays }}',
                                                                            '{{ $hospital->description }}'
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

    {{-- Add Ayurvedic Hospital Modal --}}
    <div class="modal fade" id="addAyurvedicHospitalModal" tabindex="-1" role="dialog"
        aria-labelledby="addAyurvedicHospitalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAyurvedicHospitalLabel">Add New Ayurvedic Hospital</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Location.ayurvedicHospitalAdd') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Hospital Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Hospital Name" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="address">Address <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Address" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Email <span style="color: red;">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone">Phone <span style="color: red;">*</span></label>
                                <input type="tel" class="form-control" id="phone" name="phone"
                                    placeholder="Phone Number" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="location">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Location" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="latitude">Latitude <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" readonly required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="longitude">Longitude <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" readonly required>
                            </div>

                            <!-- Add a Google Map for Selecting Location -->
                            <div id="map" style="width: 100%; height: 400px;"></div>

                            <div class="form-group col-md-6">
                                <label for="openTime">Opening Time <span style="color: red;">*</span></label>
                                <input type="time" class="form-control" id="openTime" name="openTime" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="closeTime">Closing Time <span style="color: red;">*</span></label>
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
                                    placeholder="Hospital Description" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Ayurvedic Hospital Modal --}}
    <div class="modal fade" id="editHospitalModal" tabindex="-1" role="dialog" aria-labelledby="editHospitalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editHospitalLabel">Edit Ayurvedic Hospital</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editHospitalForm" action="{{ route('Location.ayurvedicHospitalUpdate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="edit_hospital_id">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="edit_name">Hospital Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="edit_name" name="name"
                                    placeholder="Hospital Name" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_address">Address <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="edit_address" name="address"
                                    placeholder="Hospital Address" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_email">Email <span style="color: red;">*</span></label>
                                <input type="email" class="form-control" id="edit_email" name="email"
                                    placeholder="Hospital Email" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_phone">Phone <span style="color: red;">*</span></label>
                                <input type="tel" class="form-control" id="edit_phone" name="phone"
                                    placeholder="Phone Number" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_location">Location(URL) <span style="color: red;">*</span></label>
                                <input type="link" class="form-control" id="edit_location" name="location"
                                    placeholder="Location" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_openTime">Opening Time <span style="color: red;">*</span></label>
                                <input type="time" class="form-control" id="edit_openTime" name="openTime" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_closeTime">Closing Time <span style="color: red;">*</span></label>
                                <input type="time" class="form-control" id="edit_closeTime" name="closeTime"
                                    required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="edit_openDays">Open Days <span style="color: red;">*</span></label>
                                <select class="form-control" id="edit_openDays" name="openDays" required>
                                    <option value="Weekdays">Weekdays</option>
                                    <option value="Weekends">Weekends</option>
                                    <option value="All Days">All Days</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="edit_description">Description <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="edit_description" name="description" rows="3"
                                    placeholder="Hospital Description" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- View Ayurvedic Hospital Modal --}}
    <div class="modal fade" id="viewHospitalModal" tabindex="-1" role="dialog" aria-labelledby="viewHospitalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewHospitalLabel">View Ayurvedic Hospital</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="viewHospitalForm">
                        <input type="hidden" name="id" id="view_hospital_id">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="view_name">Hospital Name</label>
                                <input type="text" class="form-control" id="view_name" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="view_address">Address</label>
                                <input type="text" class="form-control" id="view_address" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="view_email">Email</label>
                                <input type="email" class="form-control" id="view_email" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="view_phone">Phone</label>
                                <input type="tel" class="form-control" id="view_phone" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="view_location">Location(URL)</label>
                                <input type="link" class="form-control" id="view_location" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="view_openTime">Opening Time</label>
                                <input type="time" class="form-control" id="view_openTime" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="view_closeTime">Closing Time</label>
                                <input type="time" class="form-control" id="view_closeTime" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="view_openDays">Open Days</label>
                                <input type="text" class="form-control" id="view_openDays" readonly>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="view_description">Description</label>
                                <textarea class="form-control" id="view_description" rows="3" readonly></textarea>
                            </div>
                        </div>

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteHospitalModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteHospitalLabel" aria-hidden="true">
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
                    <form id="deleteHospitalForm" action="{{ route('Location.ayurvedicHospitalDelete') }}"
                        method="POST">
                        @csrf
                        <input type="hidden" name="id" id="ayurvedicHospitalId"> <!-- Updated ID here -->
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i>
                            Delete</button>
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
                    <form action="{{ route('Location.ayurvedicHospitalImageAdd') }}" method="POST"
                        enctype="multipart/form-data" id="uploadImageForm">
                        @csrf
                        <input type="hidden" id="uploadayurvedicHospitalId" name="ayurvedicHospitalId">
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
        function openUploadImageModal(ayurvedicHospitalId) {
            document.getElementById('uploadayurvedicHospitalId').value = ayurvedicHospitalId;
        }
    </script>
    <script>
        // Function to populate and show the Edit Hospital Modal
        function editHospital(id, name, address, email, phone, location, openTime, closeTime, openDays, description) {
            // Set the values of the inputs in the modal
            document.getElementById('edit_hospital_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_address').value = address;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_phone').value = phone;
            document.getElementById('edit_location').value = location;
            document.getElementById('edit_openTime').value = openTime;
            document.getElementById('edit_closeTime').value = closeTime;
            document.getElementById('edit_openDays').value = openDays;
            document.getElementById('edit_description').value = description;

            // Show the edit modal
            $('#editHospitalModal').modal('show');
        }

        // Function to confirm delete action
        function confirmDelete(ayurvedicHospitalId) {
            // Set the hospital ID in the hidden input field of the delete modal
            document.getElementById('ayurvedicHospitalId').value = ayurvedicHospitalId;

            // Show the delete modal
            $('#deleteHospitalModal').modal('show');


        }

        function viewHospital(id, name, address, email, phone, location, openTime, closeTime, openDays, description) {
            // Set the values of the inputs in the modal
            document.getElementById('view_hospital_id').value = id;
            document.getElementById('view_name').value = name;
            document.getElementById('view_address').value = address;
            document.getElementById('view_email').value = email;
            document.getElementById('view_phone').value = phone;
            document.getElementById('view_location').value = location;
            document.getElementById('view_openTime').value = openTime;
            document.getElementById('view_closeTime').value = closeTime;
            document.getElementById('view_openDays').value = openDays;
            document.getElementById('view_description').value = description;

            // Show the modal
            $('#viewHospitalModal').modal('show');
        }
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addRoomToGrcModal = document.getElementById('addAyurvedicHospitalImageModal');
            addRoomToGrcModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Button that triggered the modal
                const ayurvedicHospitalId = button.getAttribute('data-ayurvedicHospitalId');


                // Update the modal's input fields
                addRoomToGrcModal.querySelector('#ayurvedicHospitalId').value = ayurvedicHospitalId;


            });
        });
    </script>

<script>
    function initMap() {
        var defaultLocation = { lat: 7.8731, lng: 80.7718 }; // Default to Sri Lanka
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: defaultLocation
        });

        var marker = new google.maps.Marker({
            position: defaultLocation,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function(event) {
            document.getElementById("latitude").value = event.latLng.lat();
            document.getElementById("longitude").value = event.latLng.lng();
        });

        // Auto-complete for the location field
        var input = document.getElementById('gardenLocation');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

            if (place.geometry.location) {
                marker.setPosition(place.geometry.location);
                map.setCenter(place.geometry.location);
                document.getElementById("latitude").value = place.geometry.location.lat();
                document.getElementById("longitude").value = place.geometry.location.lng();
            }
        });
    }
    </script>

    
@endpush
