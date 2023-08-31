<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
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

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);


        $attributes = [
            'title' => $attributes['title'],
            'description' => $attributes['description'],
            'user_id' => auth()->id(),
            'slug' => $attributes['title'] . '-' . auth()->id() . '-' . time() . '-' . rand(1, 1000000),
        ];



        Task::create($attributes);

        return redirect('/');
    }

    public function edit(Task $task){
        return view('tasks.update',
        [
            'task' => $task
        ]);
    }

    public function update(Task $task){
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $task->update($attributes);
        return redirect('/')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task){
        $task->delete();
        return redirect('/')->with('success', 'Task deleted successfully');
    }
}
