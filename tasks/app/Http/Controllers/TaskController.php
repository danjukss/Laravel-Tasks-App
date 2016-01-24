<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Controllers\Controller;
use App\Tasks;
use Auth;

class TaskController extends Controller
{
	public function index(Request $request) {
		$tasks = Tasks::orderBy('id', 'desc')->paginate(2);
		
		
		return view('tasks.index', ['tasks' => $tasks]);
	}

    public function create() {
        $this->middleware('auth');
    	return view('tasks.create');
    }

    public function store(StoreTaskRequest $request) {
        $this->middleware('auth');

		$request->user()->tasks()->create([
			'name' => $request->name,
			'description' => $request->description,
		]);

		$user = $request->user();
		$user->increment('task_count');

		$user->save();

		return redirect('/');

    	
    }

    public function edit($id) {
        $this->middleware('auth');
    	$task = auth()->user()->tasks()->find($id);
    	
    	return view('tasks.edit', ['task' => $task]);
    }

    public function update(StoreTaskRequest $request, $id) {
        $this->middleware('auth');

    	$task = auth()->user()->tasks()->find($id);


    	$task->update([
            'name' => $request->name
            ]);

    	$task->save();
    	return redirect()->back()->withSuccess('Izdevās!');
    }

    public function destroy(Request $request, $id) {

    	$task = Tasks::find($id);

    	$task->delete();

        $user = $request->user();
        $user->decrement('task_count');

        $user->save();

    	return redirect('/');
    }

    public function my() {
        $this->middleware('auth');
        $user = Auth::user();
        $tasks = $user->allTasks;

        return view('tasks.my', ['tasks' => $tasks]);
    }
}
