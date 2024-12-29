@extends('AdminArea.Layout.main')
@section('Admincontainer')

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">My Todo List</h1>
        </div>
        <div class="col-lg-12 mt-5">
            <form action="{{ url('store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input class="form-control" name="title" type="text" name="task" placeholder="Enter Task" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-12 mt-5">
            <div>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tittle</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $task->title }}</td>
                            <td>
                                @if ($task->done == 0)
                                <span class="badge bg-warning">Not Completed</span>

                                @else
                                    <span class="badge bg-success">Completed</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i>
                                </a>

                                <a href="{{ route('todo.done', $task->id) }}" class="btn btn-success"><i class="fas fa-check-circle"></i>
                                </a>

                                <a href="javascript:void(0)" class="btn btn-info"><i class="fas fa-edit" data-toggle="modal" data-target="#taskEdit"></i>
                                </a>
                            </td>
                          </tr>
                        @endforeach


                    </tbody>
                  </table>


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="taskEdit" tabindex="-1" role="dialog" aria-labelledby="taskEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="taskEditLabel">Main Task Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="taskEditContent">

        </div>

      </div>
    </div>
  </div>

@endsection

@push('css')
<style>
    .page-title {
        padding-top: 10vh;
        font-size: 3rem;
        color: #4fbf4f;
    }
</style>
@endpush
