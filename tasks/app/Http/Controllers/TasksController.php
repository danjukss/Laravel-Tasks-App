<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Controllers\Controller;
use App\Task;
use Auth;
use DB;
use Carbon\Carbon;
use App\User;

class TasksController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => 'index']);
    }

	public function index() {
		$tasks = Task::orderBy('id', 'desc')->paginate(2);

		return view('tasks.index', ['tasks' => $tasks]);
	}

    public function create() {
    	return view('tasks.create');
    }

    public function store(StoreTaskRequest $request) {
        $user = $request->user();

		$last_id = $user->tasks()->create([
			'name' => $request->name,
			'description' => $request->description,
		])->id;
        
		$user->increment('task_count');
		$user->save();

        $user->last_activity()->create([
            'type' => 'task',
            'place_id' => $last_id
        ]);

        $user->save();

		return redirect('/');
    }

    public function edit(Task $tasks) {
    	return view('tasks.edit', compact('tasks'));
    }

    public function update(StoreTaskRequest $request, $id) {
        $task = auth()->user()->tasks()->find($id);

    	$task->update([
            'name' => $request->name
            ]);

    	$task->save();
    	return redirect()->back()->withSuccess('Izdevās!');
    }

    public function destroy(Request $request, $id) {
    	$task = Task::find($id);
    	$task->delete();

        $user = $request->user();
        $user->decrement('task_count');
        $user->save();

    	return redirect('/');
    }

    public function my() {
        $this->middleware('auth');
        $user = Auth::user();
        $tasks = $user->tasks;

        return view('tasks.my', compact('tasks'));
    }
}
