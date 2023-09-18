<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;
use function Symfony\Component\Translation\t;


class TaskFilters extends Component
{
    use WithPagination;

    public $timesLoaded = 0;

    public $search = '';

    public $column = 'created_at';

    public $direction = false;

    public $completed = false;

    public $task = [];

    public function render()
    {
        $this->task = Task::with('user')->search(['title', 'description'], $this->search)->orderBy($this->column, $this->directionToString())->get();
        return view('livewire.task-filters',[
            'tasks' => $this->task,
        ]);
    }

    public function resetFilters()
    {
        $this->reset(['column', 'direction', 'completed']);
        $this->search = '';
    }

    public function directionToString()
    {
        return $this->direction ? 'ASC' : 'DESC';
    }

    public function flipDirection()
    {
        $this->direction = !$this->direction;

    }

    public function toggleCompleted()
    {
        $this->completed = !$this->completed;
    }

    public function setOrder($column)
    {
        $this->timesLoaded++;

        if ($this->column !== $column){
            $this -> direction = true;
        }
        else{
            $this->flipDirection();
        }
        $this->column = $column;
    }

}
