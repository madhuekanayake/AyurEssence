@extends('AdminArea.Layout.main')

@section('Admincontainer')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Herbal Garden Table</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addHerbalGardenModal">
                                Add Garden Details <i class="fa fa-plus-circle ml-1"></i>
                            </button>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Herbal Garden Records</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Garden Name</th>
                                            <th>Address</th>
                                            <th>E-mail</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($herbal_gardens as $garden)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $garden->id }}</td>

                                                <td>{{ $garden->gardenName }}</td>
                                                <td>{{ $garden->gardenAddress }}</td>
                                                <td>{{ $garden->gardenEmail }}</td>
                                                <td>{{ $garden->gardenDescription }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="addImage(
                                                            '{{ $garden->id }}',
                                                            '{{ $garden->gardenId }}',

                                                        )">
                                                        <i class="fas fa-plus-circle menu-icon"></i>
                                                    </button>

                                                    <a href="{{ route('Location.viewGardenImageAll', $garden->gardenId) }}">
                                                        <i class="fas fa-eye menu-icon"></i>


                                                    </a>

                                                </td>
                                                <td>

                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="editGarden(
                                                            '{{ $garden->id }}',
                                                            '{{ $garden->gardenName }}',
                                                            '{{ $garden->gardenAddress }}',
                                                            '{{ $garden->gardenPhone ?? '' }}',
                                                            '{{ $garden->gardenEmail }}',
                                                            '{{ $garden->gardenLocation ?? '' }}',
                                                            '{{ $garden->gardenOpenTime ?? '' }}',
                                                            '{{ $garden->gardenCloseTime ?? '' }}',
                                                            '{{ $garden->localTicketPrice ?? '' }}',
                                                            '{{ $garden->foreignTicketPrice ?? '' }}',
                                                            '{{ $garden->gardenOpenDays ?? '' }}',
                                                            '{{ $garden->gardenDescription ?? '' }}'
                                                        )">
                                                        <i class="fas fa-edit menu-icon"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-link text-danger p-0"
                                                        onclick="confirmDelete('{{ $garden->id }}')">
                                                        <i class="fas fa-trash menu-icon"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="viewGarden(
                                                            '{{ $garden->id }}',
                                                            '{{ $garden->gardenName }}',
                                                            '{{ $garden->gardenAddress }}',
                                                            '{{ $garden->gardenPhone ?? '' }}',
                                                            '{{ $garden->gardenEmail }}',
                                                            '{{ $garden->gardenLocation ?? '' }}',
                                                            '{{ $garden->gardenOpenTime ?? '' }}',
                                                            '{{ $garden->gardenCloseTime ?? '' }}',
                                                            '{{ $garden->localTicketPrice ?? '' }}',
                                                            '{{ $garden->foreignTicketPrice ?? '' }}',
                                                            '{{ $garden->gardenOpenDays ?? '' }}',
                                                            '{{ $garden->gardenDescription ?? '' }}'
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

    {{-- Add Herbal Garden Modal --}}
    <div class="modal fade" id="addHerbalGardenModal" tabindex="-1" role="dialog" aria-labelledby="addHerbalGardenLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addHerbalGardenLabel">Add Herbal Garden</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Location.herbalGardenAdd') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="gardenName">Garden Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="gardenName" name="gardenName"
                                    placeholder="Garden Name" required pattern=".*\S.*"
                                    title="Whitespace-only input is not allowed.">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="gardenAddress">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="gardenAddress" name="gardenAddress"
                                    placeholder="Garden Address" required>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="gardenPhone">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="gardenPhone" name="gardenPhone"
                                    placeholder="Phone Number" required pattern="[0-9]+"
                                    title="Enter a valid phone number.">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="gardenEmail">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="gardenEmail" name="gardenEmail"
                                    placeholder="Email" required>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="gardenLocation">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="gardenLocation" name="gardenLocation" placeholder="Location" required>
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
                                <label for="gardenOpenTime">Open Hours <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="gardenOpenTime" name="gardenOpenTime"
                                    required>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="gardenCloseTime">Close Hours <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="gardenCloseTime" name="gardenCloseTime"
                                    required>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="localTicketPrice">Local Ticket Price <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="localTicketPrice" name="localTicketPrice"
                                    placeholder="0.00" required min="0">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="foreignTicketPrice">Foreign Ticket Price <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="foreignTicketPrice"
                                    name="foreignTicketPrice" placeholder="0.00" required min="0">
                            </div>


                            <div class="form-group col-md-6">
                                <label for="gardenOpenDays">Open Days <span class="text-danger">*</span></label>
                                <select class="form-control" id="gardenOpenDays" name="gardenOpenDays" required>
                                    <option value="" disabled selected>Select Open Days</option>
                                    <option value="Weekdays">Weekdays</option>
                                    <option value="Weekends">Weekends</option>
                                </select>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="gardenDescription">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="gardenDescription" name="gardenDescription" rows="4"
                                    placeholder="Enter description here..." required></textarea>
                            </div>

                        </div>

                        <div class="form-row">
                            <button type="submit" class="btn btn-primary mr-2">Save</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Image Modal --}}
    <div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="addImageLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addImageLabel">Add New Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Location.gardenImageAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="gardenId" name="gardenId">
                    <input type="hidden" id="id" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="image">File Upload <span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Image Description"
                                required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


    {{-- Edit Herbal Garden Modal --}}
    <div class="modal fade" id="editHerbalGardenModal" tabindex="-1" role="dialog"
        aria-labelledby="editHerbalGardenLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editHerbalGardenLabel">Edit Herbal Garden</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Location.herbalGardenUpdate') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST') <!-- Ensures it's a PUT request -->
                        <input type="hidden" id="editGardenId" name="id"> <!-- Hidden field for garden ID -->

                        <div class="form-row">
                            <!-- Garden Name -->
                            <div class="form-group col-md-6">
                                <label for="editGardenName">Garden Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editGardenName" name="gardenName"
                                    placeholder="Garden Name" required>
                            </div>

                            <!-- Garden Address -->
                            <div class="form-group col-md-6">
                                <label for="editGardenAddress">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editGardenAddress" name="gardenAddress"
                                    placeholder="Garden Address" required>
                            </div>

                            <!-- Phone Number -->
                            <div class="form-group col-md-6">
                                <label for="editGardenPhone">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="editGardenPhone" name="gardenPhone"
                                    placeholder="Phone Number" required>
                            </div>

                            <!-- Email -->
                            <div class="form-group col-md-6">
                                <label for="editGardenEmail">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="editGardenEmail" name="gardenEmail"
                                    placeholder="Email" required>
                            </div>

                            <!-- Location -->
                            <div class="form-group col-md-6">
                                <label for="editGardenLocation">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editGardenLocation" name="gardenLocation"
                                    placeholder="Location" required>
                            </div>

                            <!-- Open Hours -->
                            <div class="form-group col-md-6">
                                <label for="editGardenOpenTime">Open Hours <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="editGardenOpenTime" name="gardenOpenTime"
                                    required>
                            </div>

                            <!-- Close Hours -->
                            <div class="form-group col-md-6">
                                <label for="editGardenCloseTime">Close Hours <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="editGardenCloseTime"
                                    name="gardenCloseTime" required>
                            </div>

                            <!-- Local Ticket Price -->
                            <div class="form-group col-md-6">
                                <label for="editLocalTicketPrice">Local Ticket Price <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="editLocalTicketPrice"
                                    name="localTicketPrice" placeholder="0.00" required min="0">
                            </div>

                            <!-- Foreign Ticket Price -->
                            <div class="form-group col-md-6">
                                <label for="editForeignTicketPrice">Foreign Ticket Price <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="editForeignTicketPrice"
                                    name="foreignTicketPrice" placeholder="0.00" required min="0">
                            </div>

                            <!-- Open Days -->
                            <div class="form-group col-md-6">
                                <label for="editGardenOpenDays">Open Days <span class="text-danger">*</span></label>
                                <select class="form-control" id="editGardenOpenDays" name="gardenOpenDays" required>
                                    <option value="Weekdays">Weekdays</option>
                                    <option value="Weekends">Weekends</option>
                                </select>
                            </div>

                            <!-- Description -->
                            <div class="form-group col-md-12">
                                <label for="editGardenDescription">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="editGardenDescription" name="gardenDescription" rows="4"
                                    placeholder="Enter description here..." required></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- View All Details --}}


    <div class="modal fade" id="ViewHerbalGardenModal" tabindex="-1" role="dialog"
        aria-labelledby="viewHerbalGardenLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewHerbalGardenLabel">Edit Herbal Garden</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Location.herbalGardenUpdate') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST') <!-- Ensures it's a PUT request -->
                        <input type="hidden" id="viewGardenId" name="id"> <!-- Hidden field for garden ID -->

                        <div class="form-row">
                            <!-- Garden Name -->
                            <div class="form-group col-md-6">
                                <label for="viewGardenName">Garden Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="viewGardenName" name="gardenName"
                                    placeholder="Garden Name" required readonly>
                            </div>

                            <!-- Garden Address -->
                            <div class="form-group col-md-6">
                                <label for="viewGardenAddress">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="viewGardenAddress" name="gardenAddress"
                                    placeholder="Garden Address" required readonly>
                            </div>

                            <!-- Phone Number -->
                            <div class="form-group col-md-6">
                                <label for="viewGardenPhone">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="viewGardenPhone" name="gardenPhone"
                                    placeholder="Phone Number" required readonly>
                            </div>

                            <!-- Email -->
                            <div class="form-group col-md-6">
                                <label for="viewGardenEmail">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="viewGardenEmail" name="gardenEmail"
                                    placeholder="Email" required readonly>
                            </div>

                            <!-- Location -->
                            <div class="form-group col-md-6">
                                <label for="viewGardenLocation">Location <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="viewGardenLocation" name="gardenLocation"
                                    placeholder="Location" required readonly>
                            </div>

                            <!-- Open Hours -->
                            <div class="form-group col-md-6">
                                <label for="viewGardenOpenTime">Open Hours <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="viewGardenOpenTime" name="gardenOpenTime"
                                    required readonly>
                            </div>

                            <!-- Close Hours -->
                            <div class="form-group col-md-6">
                                <label for="viewGardenCloseTime">Close Hours <span class="text-danger">*</span></label>
                                <input type="time" class="form-control" id="viewGardenCloseTime"
                                    name="gardenCloseTime" required readonly>
                            </div>

                            <!-- Local Ticket Price -->
                            <div class="form-group col-md-6">
                                <label for="viewLocalTicketPrice">Local Ticket Price <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="viewLocalTicketPrice"
                                    name="localTicketPrice" placeholder="0.00" required min="0" readonly>
                            </div>

                            <!-- Foreign Ticket Price -->
                            <div class="form-group col-md-6">
                                <label for="viewForeignTicketPrice">Foreign Ticket Price <span
                                        class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="viewForeignTicketPrice"
                                    name="foreignTicketPrice" placeholder="0.00" required min="0" readonly>
                            </div>

                            <!-- Open Days -->
                            <div class="form-group col-md-6">
                                <label for="viewGardenOpenDays">Open Days <span class="text-danger">*</span></label>
                                <select class="form-control" id="viewGardenOpenDays" name="gardenOpenDays" required disabled>
                                    <option value="Weekdays">Weekdays</option>
                                    <option value="Weekends">Weekends</option>
                                </select>
                            </div>


                            <!-- Description -->
                            <div class="form-group col-md-12">
                                <label for="viewGardenDescription">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="viewGardenDescription" name="gardenDescription" rows="4"
                                    placeholder="Enter description here..." required readonly></textarea>
                            </div>
                        </div>

                        <div class="form-row">

                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete  Modal --}}
    <div class="modal fade" id="deleteHerbalGardenModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteHerbalGardenLabel" aria-hidden="true">
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
                    <h5>Are you sure you want to delete this service item?</h5>

                </div>
                <div class="modal-footer" style="padding: 10px;">
                    <form id="deleteherbalGardenForm" action="{{ route('Location.herbalGardenDelete') }}"
                        method="POST">
                        @csrf
                        <input type="hidden" name="id" id="gardenId">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i>
                            Delete</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @push('js')
        <script>
            function editGarden(id, gardenName, gardenAddress,
                gardenPhone, gardenEmail, gardenLocation, gardenOpenTime, gardenCloseTime, localTicketPrice, foreignTicketPrice,
                gardenOpenDays, gardenDescription) {
                document.getElementById('editGardenId').value = id;
                document.getElementById('editGardenName').value = gardenName;
                document.getElementById('editGardenAddress').value = gardenAddress;
                document.getElementById('editGardenPhone').value = gardenPhone;
                document.getElementById('editGardenEmail').value = gardenEmail;
                document.getElementById('editGardenLocation').value = gardenLocation;
                document.getElementById('editGardenOpenTime').value = gardenOpenTime;
                document.getElementById('editGardenCloseTime').value = gardenCloseTime;
                document.getElementById('editLocalTicketPrice').value = localTicketPrice;
                document.getElementById('editForeignTicketPrice').value = foreignTicketPrice;
                document.getElementById('editGardenOpenDays').value = gardenOpenDays;
                document.getElementById('editGardenDescription').value = gardenDescription;

                $('#editHerbalGardenModal').modal('show');
            }

            function viewGarden(id, gardenName, gardenAddress,
                gardenPhone, gardenEmail, gardenLocation, gardenOpenTime, gardenCloseTime, localTicketPrice, foreignTicketPrice,
                gardenOpenDays, gardenDescription) {
                document.getElementById('viewGardenId').value = id;
                document.getElementById('viewGardenName').value = gardenName;
                document.getElementById('viewGardenAddress').value = gardenAddress;
                document.getElementById('viewGardenPhone').value = gardenPhone;
                document.getElementById('viewGardenEmail').value = gardenEmail;
                document.getElementById('viewGardenLocation').value = gardenLocation;
                document.getElementById('viewGardenOpenTime').value = gardenOpenTime;
                document.getElementById('viewGardenCloseTime').value = gardenCloseTime;
                document.getElementById('viewLocalTicketPrice').value = localTicketPrice;
                document.getElementById('viewForeignTicketPrice').value = foreignTicketPrice;
                document.getElementById('viewGardenOpenDays').value = gardenOpenDays;
                document.getElementById('viewGardenDescription').value = gardenDescription;

                $('#ViewHerbalGardenModal').modal('show');
            }

            function confirmDelete(gardenId) {
                // Set the student ID in the hidden input field of the delete modal
                document.getElementById('gardenId').value = gardenId;

                // Show the delete modal
                $('#deleteHerbalGardenModal').modal('show');
            }
        </script>

        <script>
            function addImage(id, gardenId) {
            // Set the values of the inputs in the modal
            document.getElementById('id').value = id;
            document.getElementById('gardenId').value = gardenId;  // Update to 'edit_title'

            // Show the edit modal
            $('#addImageModal').modal('show');
        }
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
@endsection
