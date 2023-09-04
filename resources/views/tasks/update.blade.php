@extends('layout')

@section('content')

    <main class="flex flex-col min-h-screen items-center">

        <x-task-form :task="$task" action="{{route('tasks.update', $task->id)}}" method="PATCH"/>
    </main>

@endsection
