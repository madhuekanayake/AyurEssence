@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Service Data Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addInfoModal">
                            Add Information <i class="fa fa-plus-circle ml-1"></i>
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Setting Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Logo</th>
                                        <th>Website Name</th>
                                        <th>E mail</th>
                                        <th>Contact Number1</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @php
    $hasActive = $settings->contains('status', 1);
@endphp
                                    @foreach ($settings as $setting)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($setting->logo)
                                                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="Setting Image" width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $setting->websiteName }}</td>
                                            <td>{{ $setting->email }}</td>
                                            <td>{{ $setting->contactNo1 }}</td>
                                            <td>
                                                @if ($setting->status == 1)
                                                    <span class="badge badge-pill badge-soft-success font-size-12 rounded-pill">Active</span>
                                                    <a href="{{ route('Setting.status', $setting->id) }}" class="text-danger ms-2">
                                                        <i class="fas fa-toggle-on fa-lg"></i>
                                                    </a>
                                                @else
                                                    <span class="badge badge-pill badge-soft-danger font-size-12 rounded-pill">Inactive</span>
                                                    <a href="{{ route('Setting.status', $setting->id) }}"
                                                       class="text-primary ms-2 {{ $hasActive ? 'disabled' : '' }}"
                                                       style="{{ $hasActive ? 'pointer-events: none; opacity: 0.5;' : '' }}">
                                                        <i class="fas fa-toggle-off fa-lg"></i>
                                                    </a>
                                                @endif
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                    onclick="editSettings('{{ $setting->id }}', '{{ $setting->websiteName }}', '{{ $setting->email }}', '{{ $setting->contactNo1 }}', '{{ $setting->contactNo2 }}', '{{ $setting->city }}', '{{ $setting->addressLine1 }}', '{{ $setting->addressLine2 }}', '{{ $setting->whatsappLink }}', '{{ $setting->instagramlink }}', '{{ $setting->facebookLink }}', '{{ $setting->linkedinLink }}', '{{ $setting->twitterLink }}')">
                                                    <i class="fas fa-edit menu-icon"></i>
                                                </button>
                                                <button type="button" class="btn btn-link text-danger p-0"
                                                    onclick="confirmDelete('{{ $setting->id }}')">
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


{{-- Add Information Modal --}}
<div class="modal fade" id="addInfoModal" tabindex="-1" role="dialog" aria-labelledby="addInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInfoLabel">Add New Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Setting.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="logo">Logo <span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="logo" name="logo" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="websiteName">Website Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="websiteName" name="websiteName" placeholder="Website Name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email <span style="color: red;">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contactNo1">Contact No 1 <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="contactNo1" name="contactNo1" placeholder="Contact Number 1" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="contactNo2">Contact No 2</label>
                            <input type="text" class="form-control" id="contactNo2" name="contactNo2" placeholder="Contact Number 2">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="addressLine1">Address Line 1 <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="addressLine1" name="addressLine1" placeholder="Address Line 1" required>
                        </div>

                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="addressLine2">Address Line 2</label>
                            <input type="text" class="form-control" id="addressLine2" name="addressLine2" placeholder="Address Line 2">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city">City <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="whatsappLink">WhatsApp Link</label>
                            <input type="url" class="form-control" id="whatsappLink" name="whatsappLink" placeholder="WhatsApp Profile Link">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="instagramLink">Instagram Link</label>
                            <input type="url" class="form-control" id="instagramLink" name="instagramLink" placeholder="Instagram Profile Link">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="facebookLink">Facebook Link</label>
                            <input type="url" class="form-control" id="facebookLink" name="facebookLink" placeholder="Facebook Profile Link">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="linkedinLink">LinkedIn Link</label>
                            <input type="url" class="form-control" id="linkedinLink" name="linkedinLink" placeholder="LinkedIn Profile Link">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="twitterLink">Twitter Link</label>
                            <input type="url" class="form-control" id="twitterLink" name="twitterLink" placeholder="Twitter Profile Link">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Settings Modal --}}
<div class="modal fade" id="editSettingsModal" tabindex="-1" role="dialog" aria-labelledby="editSettingsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSettingsLabel">Edit Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editSettingsForm" action="{{ route('Setting.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="edit_settings_id">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_logo">Logo</label>
                            <input type="file" class="form-control" id="edit_logo" name="logo">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_website_name">Website Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_website_name" name="websiteName" placeholder="Website Name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_email">Email <span style="color: red;">*</span></label>
                            <input type="email" class="form-control" id="edit_email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_contact_no1">Contact No 1 <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_contact_no1" name="contactNo1" placeholder="Contact No 1" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_contact_no2">Contact No 2</label>
                            <input type="text" class="form-control" id="edit_contact_no2" name="contactNo2" placeholder="Contact No 2">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_city">City <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_city" name="city" placeholder="City" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_address_line1">Address Line 1 <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_address_line1" name="addressLine1" placeholder="Address Line 1" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_address_line2">Address Line 2</label>
                            <input type="text" class="form-control" id="edit_address_line2" name="addressLine2" placeholder="Address Line 2">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_whatsapp_link">WhatsApp Link</label>
                            <input type="url" class="form-control" id="edit_whatsapp_link" name="whatsappLink" placeholder="WhatsApp Link">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_instagram_link">Instagram Link</label>
                            <input type="url" class="form-control" id="edit_instagram_link" name="instagramLink" placeholder="Instagram Link">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_facebook_link">Facebook Link</label>
                            <input type="url" class="form-control" id="edit_facebook_link" name="facebookLink" placeholder="Facebook Link">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_linkedin_link">LinkedIn Link</label>
                            <input type="url" class="form-control" id="edit_linkedin_link" name="linkedinLink" placeholder="LinkedIn Link">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_twitter_link">Twitter Link</label>
                            <input type="url" class="form-control" id="edit_twitter_link" name="twitterLink" placeholder="Twitter Link">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Delete Setting Modal --}}
<div class="modal fade" id="deleteSettingModal" tabindex="-1" role="dialog" aria-labelledby="deleteSettingLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this setting?</h5>
                <p id="settingName"></p> <!-- This will show the name of the setting to confirm deletion -->
            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteSettingForm" action="{{ route('Setting.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="settingId">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i> Delete</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


@push('js')
<script>
    function editSettings(id, websiteName, email, contactNo1, contactNo2, city, addressLine1, addressLine2, whatsappLink, instagramLink, facebookLink, linkedinLink, twitterLink) {
        // Set the values of the inputs in the modal
        document.getElementById('edit_settings_id').value = id;
        document.getElementById('edit_website_name').value = websiteName;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_contact_no1').value = contactNo1;
        document.getElementById('edit_contact_no2').value = contactNo2;
        document.getElementById('edit_city').value = city;
        document.getElementById('edit_address_line1').value = addressLine1;
        document.getElementById('edit_address_line2').value = addressLine2;
        document.getElementById('edit_whatsapp_link').value = whatsappLink;
        document.getElementById('edit_instagram_link').value = instagramLink;
        document.getElementById('edit_facebook_link').value = facebookLink;
        document.getElementById('edit_linkedin_link').value = linkedinLink;
        document.getElementById('edit_twitter_link').value = twitterLink;

        // Show the edit modal
        $('#editSettingsModal').modal('show');
    }


    function confirmDelete(settingId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('settingId').value = settingId;

            // Show the delete modal
            $('#deleteSettingModal').modal('show');
        }
</script>
@endpush


@endsection
