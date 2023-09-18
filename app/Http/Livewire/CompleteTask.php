<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CompleteTask extends Component
{

    public $task;

    public function render()
    {
        return view('livewire.complete-task');
    }

    public function completeTask()
    {
        $this->task->update([
            'completed_at' => now()
        ]);
//        $this->emit('taskCompleted');
    }
}
