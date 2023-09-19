<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
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

    public $completed = 0;

    public function render()
    {
        $task = Task::with('user');
        if ($this->completed == 1) {
            $task->whereNotNull('completed_at');
        }elseif ($this->completed == 2){
            $task->whereNull('completed_at');
        }
        $task->search(['title', 'description'], $this->search)
            ->orderBy($this->column, $this->directionToString());
        return view('livewire.task-filters', [
            'tasks' => $task->paginate(10),
        ]);
    }

    public function resetFilters()
    {
        $this->reset(['search', 'column', 'direction', 'completed']);
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

        if ($this->column !== $column) {
            $this->direction = true;
        } else {
            $this->flipDirection();
        }
        $this->column = $column;
    }

    public function setCompleted()
    {
        if ($this->completed == 2) {
            $this->completed = 0;
            return;
        }
        $this->completed ++;
    }

    public function getCompletedProperty()
    {
        return $this->completed ? 'DESC' : 'ACS';
    }
}

