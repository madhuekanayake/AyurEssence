@extends('AdminArea.Layout.main')
@section('Admincontainer')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Data Table</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addStudentModal">
                                Add Student <i class="fa fa-plus-circle ml-1"></i>
                            </button>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Student Records</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Grade</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->id }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->age }}</td>
                                                <td>{{ $student->grade }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->phone }}</td>
                                                <td>
                                                    @if ($student->image)
                                                        <img src="{{ asset('uploads/student/' . $student->image) }}"
                                                            alt="Student Image" width="50" height="50">
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="editStudent('{{ $student->id }}', '{{ $student->name }}', '{{ $student->age }}', '{{ $student->grade }}', '{{ $student->email }}', '{{ $student->phone }}')">
                                                        <i class="fas fa-edit menu-icon"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-link text-danger p-0"
                                                        onclick="confirmDelete('{{ $student->id }}')">
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

    {{-- Add Modal --}}
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentLabel">Add New Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('Student.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                    required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="age">Age <span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="Age"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="grade">Grade <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="grade" name="grade" placeholder="Grade"
                                    required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email <span style="color: red;">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone"
                                    required pattern="^(08|07)[0-9]{8}$" maxlength="10"
                                    title="Please enter a 10-digit phone number starting with 08 or 07" inputmode="numeric">
                            </div>
                            <div class="form-group col-md-12">
                                <label>File Upload <span style="color: red;">*</span></label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- Edit Modal --}}
    <div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="editStudentLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStudentLabel">Edit Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editStudentForm" action="{{ route('Student.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="edit_student_id">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="edit_name">Name <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="edit_name" name="name" placeholder="Name"
                                    required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit_age">Age <span style="color: red;">*</span></label>
                                <input type="number" class="form-control" id="edit_age" name="age" placeholder="Age" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit_grade">Grade <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="edit_grade" name="grade" placeholder="Grade"
                                    required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit_email">Email <span style="color: red;">*</span></label>
                                <input type="email" class="form-control" id="edit_email" name="email" placeholder="Email"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="edit_phone">Phone <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="edit_phone" name="phone" placeholder="Phone"
                                    required pattern="^(08|07)[0-9]{8}$" maxlength="10"
                                    title="Please enter a 10-digit phone number starting with 08 or 07" inputmode="numeric">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="edit_image">Update Image</label>
                                <input type="file" class="form-control" id="edit_image" name="image">
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

    <div class="modal fade" id="deleteStudentModal" tabindex="-1" role="dialog" aria-labelledby="deleteStudentLabel"
        aria-hidden="true">
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
                    <h5>Are you sure you want to delete this student record?</h5>
                </div>
                <div class="modal-footer" style="padding: 10px;">
                    <form id="deleteStudentForm" action="{{ route('Student.delete') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="studentId">
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
        function editStudent(id, name, age, grade, email, phone) {
            document.getElementById('edit_student_id').value = id;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_age').value = age;
            document.getElementById('edit_grade').value = grade;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_phone').value = phone;
            $('#editStudentModal').modal('show');
        }

        function confirmDelete(studentId) {
            // Set the student ID in the hidden input field of the delete modal
            document.getElementById('studentId').value = studentId;

            // Show the delete modal
            $('#deleteStudentModal').modal('show');
        }
    </script>
@endpush
