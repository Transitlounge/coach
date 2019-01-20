<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Show Task App
     *
     */
    public function app()
    {
        $tasks = Task::orderBy('created_at', 'desc')->with(['user'])->get();

        return view('tasks.app', compact('tasks'));
    }    


    /**
     * Show Task Dashboard
     *
     */
    public function dashboard()
    {
        return view('tasks.dashboard', [
            'tasks' => Task::orderBy('created_at', 'desc')->get()
        ]);
    }    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where(['user_id' => auth()->user()->id])->get();
 
        return response()->json([
  
            'tasks'    => $tasks,
  
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $val = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $task = new Task;
        $task->user_id = auth()->user()->id;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();

        //auth()->user()->tasks()->save(new Task($task));

        // auth()->user()->publish(new Task($task));

        return redirect(route('tasks.dashboard'));

        // return response()->json([
        //     'task'    => $task,
        //     'message' => 'Success'
        // ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $val = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $task->name = request('name');
        $task->description = request('description');
        $task->save();
        return response()->json([
            'message' => 'Task updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        // Task::findOrFail($task->id)->delete();
        return redirect('/tasks/dashboard');

 
        // return response()->json([
        //     'message' => 'Task deleted successfully!'
        // ], 200);
    }
}
