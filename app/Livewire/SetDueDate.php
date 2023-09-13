<?php

namespace App\Livewire;

use Livewire\Component;

class SetDueDate extends Component
{
    public $task;

    public $dueDate;
    public function render()
    {
        return view('livewire.set-due-date');
    }

    public function setDueDate()
    {
        $this->task->due_date = $this->dueDate;
        $this->task->save();
    }
}
