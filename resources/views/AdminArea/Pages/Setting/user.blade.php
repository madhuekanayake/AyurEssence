@extends('AdminArea.Layout.main')

@section('Admincontainer')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">User Data Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addUserModal">
                            Add User <i class="fa fa-plus-circle ml-1"></i>
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Records</h4>
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
                                        <th>Phone No</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($user_roles as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ ucfirst($user->role) }}</td>
                                            <td>
                                                @if ($user->status == 1)
                                                    <span class="badge badge-pill badge-soft-success font-size-12 rounded-pill">Active</span>
                                                    <a href="{{ route('Setting.userRoleStatus', $user->id) }}"
                                                       class="text-danger ms-2">
                                                        <i class="fas fa-toggle-on fa-lg"></i>
                                                    </a>
                                                @else
                                                    <span class="badge badge-pill badge-soft-danger font-size-12 rounded-pill">Inactive</span>
                                                    <a href="{{ route('Setting.userRoleStatus', $user->id) }}"
                                                       class="text-primary ms-2">
                                                        <i class="fas fa-toggle-off fa-lg"></i>
                                                    </a>
                                                @endif
                                             </td>
                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                    onclick="editUser('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}', '{{ $user->phone }}', '{{ $user->role }}')">
                                                    <i class="fas fa-edit menu-icon"></i>
                                                </button>
                                                <button type="button" class="btn btn-link text-danger p-0"
                                                    onclick="confirmDelete('{{ $user->id }}')">
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

{{-- Add User Modal --}}
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addUserForm" action="{{ route('Setting.userRoleAdd') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <!-- Name -->
                        <div class="form-group col-md-6">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                        <!-- Email -->
                        <div class="form-group col-md-6">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Phone No -->
                        <div class="form-group col-md-6">
                            <label for="phone">Phone No <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone No" required>
                        </div>
                        <!-- Role -->
                        <div class="form-group col-md-6">
                            <label for="role">Role <span class="text-danger">*</span></label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="super admin">Super Admin</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <!-- Password -->
                        <div class="form-group col-md-6">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <!-- Buttons -->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">Add User</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>

            </div>
            </div>
        </div>
    </div>
</div>

{{-- Edit User Role Modal --}}
<div class="modal fade" id="edituserModal" tabindex="-1" role="dialog" aria-labelledby="edituserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edituserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editUserRoleForm" action="{{ route('Setting.userRoleUpdate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="edit_user_id">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edit_user_name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_user_name" name="name" placeholder="User Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_user_email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="edit_user_email" name="email" placeholder="User Email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_user_phone">Phone No <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_user_phone" name="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edit_user_role">Role <span class="text-danger">*</span></label>
                            <select class="form-control" id="edit_user_role" name="role" required>
                                <option value="super admin">Super Admin</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="edit_user_password">Password (Optional)</label>
                            <input type="password" class="form-control" id="edit_user_password" name="password" placeholder="Enter new password">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>




{{-- Delete User Modal --}}
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this user?</h5>
            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteUserForm" action="{{ route('Setting.userRoleDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash menu-icon"></i> Delete</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


@push('js')
    <script>
        function editUser(id, name, email, phone, role) {
    // Set the values of the inputs in the modal
    document.getElementById('edit_user_id').value = id;
    document.getElementById('edit_user_name').value = name;
    document.getElementById('edit_user_email').value = email;
    document.getElementById('edit_user_phone').value = phone;
    document.getElementById('edit_user_role').value = role;

    // Clear the password field (keep it empty to avoid showing the old password)
    document.getElementById('edit_user_password').value = '';

    // Show the edit modal
    $('#edituserModal').modal('show');
}


function confirmDelete(id) {
    // Set the user ID in the hidden input field of the delete modal
    document.getElementById('id').value = id;

    // Show the delete modal
    $('#deleteUserModal').modal('show');
}

    </script>
@endpush


@endsection
