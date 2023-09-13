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
        $task = Task::with('user')
            ->latest()
            ->filter(request(['search'])
            )->paginate(7)
            ->withQueryString();
        return view('tasks.tasks', [
            'tasks' => $task
        ]);
    }

    public function show(Task $task)
    {
        return view('tasks.task', [
            'task' => $task,
            'comments' => $task->comments()->with('user')->latest()->get(),
            'images' => $task->getMedia('images'),
            'files' => $task->getMedia('files'),
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskUpdateOrStoreRequest $request)
    {
        $task = Task::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => auth()->id(),
                'slug' => $slug = $request->title . '-' . auth()->id() . '-' . time() . '-' . rand(1, 1000000),
            ]
        );

        if ($request->hasFile('images')) {
            $task->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('images');
                });
        }

        if ($request->hasFile('files')) {
            $task->addMultipleMediaFromRequest(['files'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('files');
                });
        }

        return redirect()->route('tasks.show', $slug)->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        return view('tasks.update',
            [
                'task' => $task,
                'images' => $task->getMedia('images'),
                'files' => $task->getMedia('files'),
            ]);
    }

    public function update(Task $task, TaskUpdateOrStoreRequest $request)
    {
        $task->update(
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );

        if ($request->oldImages != null) {
            foreach ($request->oldImages as $oldImage) {
                $task->deleteMedia($oldImage);
            }
        }

        if ($request->hasFile('images')) {
            $task->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('images');
                });
        }

        if ($request->oldFiles != null){
            foreach ($request->oldFiles as $oldFile) {
                $task->deleteMedia($oldFile);

            }
        }

        if ($request->hasFile('files')) {
            $task->addMultipleMediaFromRequest(['files'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('files');
                });
        }


        return redirect()->route('tasks.show', $task->slug)->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/')->with('success', 'Task deleted successfully');
    }
}
