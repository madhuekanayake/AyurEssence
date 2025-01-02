@extends('AdminArea.Layout.main')

@section('Admincontainer')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">Blog Management Table</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#addBlogModal">
                                Add Blog <i class="fa fa-plus-circle ml-1"></i>
                            </button>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Blog Management Records</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Guide Title</th>
                                            <th>Content</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $blog->id }}</td>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ Str::limit(strip_tags($blog->content), 50) }}</td>
                                                <td>{{ $blog->date }}</td>
                                                <td>{{ $blog->description }}</td>

                                                <td>
                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="addImage(
                                                            '{{ $blog->id }}',
                                                            '{{ $blog->blogId }}',

                                                        )">
                                                        <i class="fas fa-plus-circle menu-icon"></i>
                                                    </button>

                                                    <a href="{{ route('EducationalContent.viewBlogImageAll', $blog->blogId) }}">
                                                        <i class="fas fa-eye menu-icon"></i>


                                                    </a>

                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        onclick="editBlog(
                                                        '{{ $blog->id }}',
                                                        '{{ $blog->title }}',
                                                        '{{ $blog->content }}',
                                                        '{{ $blog->date }}',
                                                        '{{ $blog->description }}'
                                                    )">
                                                        <i class="fas fa-edit menu-icon"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-link text-danger p-0"
                                                        onclick="confirmDelete('{{ $blog->id }}')">
                                                        <i class="fas fa-trash menu-icon"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                        data-toggle="modal" data-target="#viewBlogModal"
                                                        onclick="viewBlog(
        '{{ $blog->id }}',
        '{{ $blog->title }}',
        '{{ $blog->content }}',
        '{{ $blog->date }}',
        '{{ $blog->description }}'
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

    {{-- Add Modal --}}
    <div class="modal fade" id="addBlogModal" tabindex="-1" role="dialog" aria-labelledby="addBlogLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBlogLabel">Add Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('EducationalContent.blogAdd') }}" method="POST" enctype="multipart/form-data" id="addBlogForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="title">Blog Title <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Blog Title" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="quillEditor">Content <span style="color: red;">*</span></label>
                                <div id="quillExample1" class="quill-container"></div>
                                <!-- Hidden input to store Quill content -->
                                <input type="hidden" id="content" name="content" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="date">Date <span style="color: red;">*</span></label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="description">Description <span style="color: red;">*</span></label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Blog Description" required></textarea>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
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
                <form action="{{ route('EducationalContent.blogImageAdd') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blogId" name="blogId">
                    <input type="hidden" id="id" name="id">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="image">File Upload <span style="color: red;">*</span></label>
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


    {{-- Edit Blog Modal --}}
<div class="modal fade" id="editBlogModal" tabindex="-1" role="dialog" aria-labelledby="editBlogLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBlogLabel">Edit Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('EducationalContent.blogUpdate') }}" method="POST" enctype="multipart/form-data" id="editBlogForm">
                    @csrf
                    <input type="hidden" name="id" id="edit_blog_id">

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="edit_blog_title">Blog Title <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="edit_blog_title" name="title" placeholder="Blog Title" required pattern=".*\S.*" title="Whitespace-only input is not allowed.">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_blog_quillEditor">Content <span style="color: red;">*</span></label>
                            <div id="edit_blog_quillEditor" class="quill-container" style="height: 200px;"></div>
                            <input type="hidden" id="edit_blog_content" name="content" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_blog_date">Date <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" id="edit_blog_date" name="publish_date" required>
                        </div>


                        <div class="form-group col-md-12">
                            <label for="edit_blog_description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="edit_blog_description" name="description" rows="3" placeholder="Blog Description" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

 {{-- View Blog Modal --}}
<div class="modal fade" id="viewBlogModal" tabindex="-1" role="dialog" aria-labelledby="viewBlogLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewBlogLabel">Edit Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('EducationalContent.blogUpdate') }}" method="POST" enctype="multipart/form-data" id="editBlogForm">
                    @csrf
                    <input type="hidden" name="id" id="view_blog_id">

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="edit_blog_title">Blog Title <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="view_blog_title" name="title" placeholder="Blog Title" required pattern=".*\S.*" title="Whitespace-only input is not allowed." readonly>
                        </div>


                        <div class="form-group col-md-12">
                            <label for="view_quillExample">Content</label>
                            <div id="view_quillExample" class="quill-container" style="height: 200px; border: 1px solid #ced4da;"></div>
                        </div>


                        <div class="form-group col-md-12">
                            <label for="edit_blog_date">Date <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" id="view_blog_date" name="publish_date" required readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edit_blog_description">Description <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="view_blog_description" name="description" rows="3" placeholder="Blog Description" required readonly></textarea>
                        </div>
                    </div>

                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="deleteBlogModal" tabindex="-1" role="dialog" aria-labelledby="deleteBlogLabel" aria-hidden="true">
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
                <h5>Are you sure you want to delete this Blog?</h5>

            </div>
            <div class="modal-footer" style="padding: 10px;">
                <form id="deleteBlogForm" action="{{ route('EducationalContent.blogDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="blogId">
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
    document.addEventListener('DOMContentLoaded', function () {
        const quill = new Quill('#quillExample1', {
            theme: 'snow'
        });

        const form = document.getElementById('addBlogForm');
        form.addEventListener('submit', function () {
            // Copy Quill content to the hidden input field
            document.getElementById('content').value = quill.root.innerHTML;
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        let quillEditBlog = null;

        $('#editBlogModal').on('shown.bs.modal', function () {
            // Initialize Quill editor if not already initialized
            if (!quillEditBlog) {
                quillEditBlog = new Quill('#edit_blog_quillEditor', {
                    theme: 'snow',
                    placeholder: 'Enter blog content here...',
                    modules: {
                        toolbar: [
                            ['bold', 'italic', 'underline'], // Text styling
                            [{ list: 'ordered' }, { list: 'bullet' }], // Lists
                            ['link', 'image'], // Media
                            ['clean'], // Clear formatting
                        ],
                    },
                });

                // Sync Quill content with the hidden input
                quillEditBlog.on('text-change', function () {
                    document.getElementById('edit_blog_content').value = quillEditBlog.root.innerHTML.trim(); // Use trimmed HTML
                });
            }

            // Reset Quill content when the modal is shown
            const contentInput = document.getElementById('edit_blog_content');
            quillEditBlog.root.innerHTML = contentInput.value || '';
        });

        $('#editBlogModal').on('hidden.bs.modal', function () {
            // Clear the Quill editor content when the modal is hidden
            if (quillEditBlog) {
                quillEditBlog.root.innerHTML = '';
                document.getElementById('edit_blog_content').value = '';
            }
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
    let quillView = null;

    function viewBlog(id, title, content, date, description) {
        // Populate the fields with the provided data
        document.getElementById('view_blog_id').value = id;
        document.getElementById('view_blog_title').value = title;
        document.getElementById('view_blog_date').value = date;
        document.getElementById('view_blog_description').value = description;

        // Ensure Quill editor is initialized
        if (!quillView) {
            quillView = new Quill('#view_quillExample', {
                theme: 'snow',
                readOnly: true,
                modules: {
                    toolbar: false, // Disable toolbar for read-only mode
                },
            });
        }

        // Set Quill editor content
        quillView.root.innerHTML = typeof content === 'string' ? content : content.innerHTML;
    }

    // Attach the function to global scope for onclick usage
    window.viewBlog = viewBlog;

    // Clear modal fields when hidden
    $('#viewBlogModal').on('hidden.bs.modal', function () {
        if (quillView) {
            quillView.root.innerHTML = '';
        }
        document.getElementById('view_blog_id').value = '';
        document.getElementById('view_blog_title').value = '';
        document.getElementById('view_blog_date').value = '';
        document.getElementById('view_blog_description').value = '';
    });
});


</script>


<script>

function editBlog(id, title, content, date, description) {
        // Set the values of the inputs in the modal
        document.getElementById('edit_blog_id').value = id;
        document.getElementById('edit_blog_title').value = title;
        document.getElementById('edit_blog_content').value = content; // Sync Quill content
        document.getElementById('edit_blog_date').value = date;
        document.getElementById('edit_blog_description').value = description;

        // Show the edit modal
        $('#editBlogModal').modal('show');
    }

    function viewBlog(id, title, content, date, description) {
        // Set the values of the inputs in the modal
        document.getElementById('view_blog_id').value = id;
        document.getElementById('view_blog_title').value = title;
        document.getElementById('view_blog_content').value = content; // Sync Quill content
        document.getElementById('view_blog_date').value = date;
        document.getElementById('view_blog_description').value = description;

        // Show the edit modal
        $('#viewBlogModal').modal('show');
    }

    function confirmDelete(blogId) {
        // Set the student ID in the hidden input field of the delete modal
        document.getElementById('blogId').value = blogId;

        // Show the delete modal
        $('#deleteBlogModal').modal('show');
    }
</script>

<script>
    function addImage(id, blogId) {
    // Set the values of the inputs in the modal
    document.getElementById('id').value = id;
    document.getElementById('blogId').value = blogId;  // Update to 'edit_title'

    // Show the edit modal
    $('#addImageModal').modal('show');
}
</script>

@endpush
