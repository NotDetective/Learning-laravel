@props(['task' => $task])

<a href="{{route('tasks.show', $task->slug)}}">
    <section
        class="flex flex-col items-center justify-evenly mt-7 bg-gray-200 w-[500px] h-24 rounded border-2 border-gray-300 hover:bg-gray-300">
        <div class="flex flex-col items-center">
            <h1 class="font-bold text-2xl text-indigo-500">{{ $task->title }}</h1>
            <a href="{{route('user', $task->user->username)}}">
                <p class="text-xl">made by {{ $task->user->username }}</p>
            </a>
        </div>
    </section>
</a>
