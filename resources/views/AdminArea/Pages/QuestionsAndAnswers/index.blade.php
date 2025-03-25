@extends('AdminArea.Layout.main')

@section('Admincontainer')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Q&A Data Table</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addQAModal">
                            Add Q&A <i class="fa fa-plus-circle ml-1"></i>
                        </button>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Q&A Records</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($questions_and_answers as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->question }}</td>
                                            <td>{{ $item->answer }}</td>
                                            <td>
                                                <button type="button" class="btn btn-link text-primary p-0 mr-2"
                                                    onclick="editQA('{{ $item->id }}', '{{ $item->question }}', '{{ $item->answer }}')">
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

{{-- Add Q&A Modal --}}
<div class="modal fade" id="addQAModal" tabindex="-1" role="dialog" aria-labelledby="addQALabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addQALabel">Add New Q&A</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('QuestionsAndAnswers.add') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="question">Question <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="question" name="question" required>
                    </div>
                    <div class="form-group">
                        <label for="answer">Answer <span style="color: red;">*</span></label>
                        <textarea class="form-control" id="answer" name="answer" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Edit Q&A Modal --}}
<div class="modal fade" id="editQAModal" tabindex="-1" role="dialog" aria-labelledby="editQALabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editQALabel">Edit Q&A</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editQAForm" action="{{ route('QuestionsAndAnswers.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="edit_qa_id">
                    <div class="form-group">
                        <label for="edit_question">Question <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="edit_question" name="question" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_answer">Answer <span style="color: red;">*</span></label>
                        <textarea class="form-control" id="edit_answer" name="answer" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Delete Modal --}}
<div class="modal fade" id="deleteQAModal" tabindex="-1" role="dialog" aria-labelledby="deleteQALabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" style="padding: 15px;">
                <div class="mb-2">
                    <img src="{{ asset('AdminArea/images/bin.gif') }}" alt="Delete Confirmation" width="80">
                </div>
                <h5>Are you sure you want to delete this Q&A?</h5>

            </div>
            <div class="modal-footer">
                <form id="deleteQAForm" action="{{ route('QuestionsAndAnswers.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="questionsAndAnswersId">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    function editQA(id, question, answer) {
        document.getElementById('edit_qa_id').value = id;
        document.getElementById('edit_question').value = question;
        document.getElementById('edit_answer').value = answer;
        $('#editQAModal').modal('show');
    }

    function confirmDelete(questionsAndAnswersId) {
        document.getElementById('questionsAndAnswersId').value = questionsAndAnswersId;
        $('#deleteQAModal').modal('show');
    }
</script>
@endpush
