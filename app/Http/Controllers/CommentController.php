<?php

namespace App\Http\Controllers;

// use Egulias\EmailValidator\Parser\Comment;
use App\Http\Requests\CommentUpdateOrStoreRequest;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
    public function store(Task $task,CommentUpdateOrStoreRequest $request)
    {
        $task->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('tasks.show', $task->slug)->with('success', 'Comment created successfully');
    }

    public function edit(Task $task, Comment $comment)
    {
        return view('comment.edit', [
            'task' => $task,
            'comment' => $comment,
        ]);
    }

    public function update(Task $task, Comment $comment)
    {
        $attributes = request()->validate([
            'body' => 'required',
        ]);
        $attributes['edited'] = true;

        $comment->update($attributes);

        return redirect('/')->with('success', 'Comment updated successfully');
    }

    public function destroy(Task $task, Comment $comment)
    {
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully');
    }
}
