<?php

namespace App\Http\Controllers;

// use Egulias\EmailValidator\Parser\Comment;
use App\Models\Comment;
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
}
