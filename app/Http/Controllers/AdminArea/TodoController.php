<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $task;

    public function __construct()
    {
        $this->task = new Todo();
    }

    public function index()
    {
        $response['tasks'] = $this->task->all();

        return view('AdminArea.Pages.Todo.index')->with($response);

    }

    public function store(Request $request)
    {
        $this->task->create($request->all());

        return redirect()->back();
    }
}
