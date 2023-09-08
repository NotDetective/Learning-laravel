<?php

namespace App\Livewire;

use Livewire\Component;

class AddComment extends Component
{

    public $task;

    #[Rule('required|min:3')]
    public $comment;

    public function render()
    {
        return view('livewire.add-comment');
    }

    public function save()
    {
        $this->validate([
            'comment' => 'required',
        ]);
        $this->task->comments()->create([
            'body' => $this->comment,
            'user_id' => auth()->id(),
        ]);
        return redirect(request()->header('Referer'))->with('success', 'Comment created successfully');
    }
}
