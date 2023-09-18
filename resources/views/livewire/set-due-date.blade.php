<div>
    @if(!isset($task->due_date) && auth()->check() && hasPermission('task_edit') && $task->user_id == auth()->id())
        <div class="flex items-center flex-col">
            <input type="date" min="{{today()->format('Y-m-d')}}" wire:model.live="dueDate">

            <button wire:click="setDueDate">set due date</button>
        </div>
    @else
    @endif
    <p class="pb-3">Due be for: {{ \Carbon\Carbon::parse($task->due_date)->diffForHumans() }}</p>



</div>
