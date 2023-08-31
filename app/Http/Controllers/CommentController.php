<?php

namespace App\Http\Controllers;

// use Egulias\EmailValidator\Parser\Comment;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
    public function store()
    {

        $attributes = request()->validate([
            'body' => 'required',
            'task_id' => ['required', 'exists:tasks,id'],
        ]);

        $attributes = [
            'body' => request('body'),
            'user_id' => auth()->id(),
            'task_id' => request('task_id'),
        ];

        Comment::create($attributes);

        return back();
    }

    public function edit(Task $task, Comment $comment)
    {
        return view('comment.edit',[
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
