<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class EditComment extends Component
{

    public $task;

    public $comment;

    public $body;

    public $show = true;

    public $deleted = false;

    public function mount()
    {
        $this->body = $this->comment->body;
    }
    public function showFlip()
    {
        $this->show = !$this->show;
    }

    public function update()
    {
        $this->comment->update([
            'body' => $this->body,
            'edited' => true,
        ]);
        $this->showFlip();
        session()->flash('success', 'Comment updated successfully');
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        $this->deleted = true;
        return redirect(request()->header('Referer'))->with('success', 'Comment deleted successfully');
    }

    public function render()
    {
        return view('livewire.edit-comment', [
            'comment' => Comment::where('id', $this->comment->id)->first(),
        ]);
    }
}
