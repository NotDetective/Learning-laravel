<div>
    @if(!isset($task->completed_at) && auth()->check() && hasPermission('task_edit') && $task->user_id == auth()->id())
        <button
            class="border-green-600 bg-green-300 border-2 rounded mb-2 mt-6 pl-3 pr-3 pb-1 pt-1 hover:bg-green-400"
            wire:click="completeTask"
        >complete task</button>
    @elseif(isset($task->completed_at))
        <p>Completed!!</p>
    @endif


</div>
