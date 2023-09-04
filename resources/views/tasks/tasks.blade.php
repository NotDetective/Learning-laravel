@extends('layout')

@section('content')

    <main class="flex flex-col items-center mt-7">
        <x-title title="Tasks list"/>

        @if ($tasks->count())
            @foreach ($tasks as $task)
                    <x-task :task="$task" :index="true"/>
            @endforeach
        @else
            <h1 class="text-2xl text-indigo-500 mt-10">No task found</h1>
        @endif
    </main>

@endsection
