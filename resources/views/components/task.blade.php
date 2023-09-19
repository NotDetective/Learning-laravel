@props(['task', 'index' => false])

<section>
    <div class="drop-shadow bg-white w-[700px] max-h-[500px] flex flex-col items-center rounded-2xl mb-12">
        <a href="{{route('tasks.show' ,$task->slug)}}">
            <x-title title="{{$task->title}}"/>
        </a>

        @if($index && $task->user != null)
            <a href="{{route('user', $task->user->username)}}">
                <p class="pb-3">Author: {{$task->user->username}}</p>
            </a>
        @endif

        <p class="pb-3">{{$task->slug}}</p>

        <p class="pb-3 flex-1 text-center w-3/4 text-lg">{{$task->description}}</p>

        @if($index)
            @if($task->completed_at)
                <p class="pb-3">Completed !</p>
            @else
                <p class="pb-3">Not Completed Yet</p>
            @endif

            @if($task->due_date != null)
                <p class="pb-3">Due be for: {{ \Carbon\Carbon::parse($task->due_date)->diffForHumans() }}</p>
            @endif

        @else
            <div class="flex w-2/4 justify-between">
                <livewire:complete-task :task="$task"/>

                <livewire:set-due-date :task="$task"/>
            </div>
        @endif

        <p>Created: {{$task->created_at->diffForHumans()}}</p>
        @if($task->user_id == auth()->id())
            <div class="w-1/3 mb-3">
                <x-author-buttons edit_href="{{route('tasks.edit', $task->id)}}"
                                  delete_href="{{route('tasks.destroy', $task->id)}}"
                                  :user="$task->user_id == auth()->id()" :task="true"/>
            </div>
        @endif
    </div>
</section>
