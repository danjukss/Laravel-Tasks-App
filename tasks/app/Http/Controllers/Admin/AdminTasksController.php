<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\Http\Requests\StoreTaskRequest;

class AdminTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('HasAdmin');
    }

    public function index()
    {
        $tasks = Task::orderBy('id', 'DESC')->get();
        return view('admin.tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        $user = $request->user();
        $user->tasks()->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $user->increment('task_count');
        $user->save();

        return redirect('admin/tasks')->withSuccess('Uzdevums veiksmīgi izveidots!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $tasks)
    {
        return view('admin.tasks.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTaskRequest $request, Task $tasks) {
        $tasks->name = $request->name;
        $tasks->save();
        return redirect()->back()->withSuccess('Uzdevums veiksmīgi labots!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $tasks) {
        $tasks->delete();
        $user = $request->user();
        $user->decrement('task_count');
        $user->save();
        return redirect()->back()->withSuccess('Uzdevums veiksmīgi izdzēsts!');

    }
}
