<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskUpdateOrStoreRequest;
use App\Models\Comment;
use \App\Models\User;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.tasks', [
            'tasks' => Task::with('user')->latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }

    public function show(Task $task)
    {
        return view('tasks.task', [
            'task' => $task,
            'comments' => $task->comments()->with('user')->latest()->get()
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskUpdateOrStoreRequest $request)
    {
        Task::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => auth()->id(),
                'slug' => $slug = $request->title . '-' . auth()->id() . '-' . time() . '-' . rand(1, 1000000),
            ]
        );
        return redirect()->route('tasks.show', $slug)->with('success', 'Task created successfully');
    }

    public function edit(Task $task){
        return view('tasks.update',
        [
            'task' => $task
        ]);
    }

    public function update(Task $task,TaskUpdateOrStoreRequest $request){
        $task->update(
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );
        return redirect()->route('tasks.show', $task->slug)->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task){
        $task->delete();
        return redirect('/')->with('success', 'Task deleted successfully');
    }
}
