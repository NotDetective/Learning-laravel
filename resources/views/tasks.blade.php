@extends('layout')

@section('content')

<h1>Task List</h1>

<form method="GET" action="#" name="searchForTask">
    <input type="text" name="search" placeholder="search for task">
</form>

<a href="/">
    <button>
        clear search
    </button>
</a>

@if (!$tasks->count() == 0)
    @foreach ( $tasks as $task)
    <a href="tasks/{{$task->slug}}">
        <h1>{{$task->title}}</h1>
    </a>

    <a href="/user/{{$task->user->username}}">
        <p>made by {{$task->user->username}}</p>
    </a>

    <p>{{$task->slug}}</p>
    @endforeach
@else

    <p>No task found</p>

@endif


@endsection