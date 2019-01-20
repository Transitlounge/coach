<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }
 
    public function show(Task $task)
    {
        return Task::find($task);
    }

    public function store(Request $request)
    {
        //return Task::create($request->all());
        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    public function update(Request $request, Task $task)
    {
      $task->update($request->all());
      return response()->json($task, 200);
    }

    public function delete(Task $task)
    {
        $Task->delete();
        return response()->json(null, 204);
    }
}
