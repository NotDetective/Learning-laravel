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

    @guest
        <a href="/register">
            <h1>register</h1>
        </a>

        <a href="/login">
            <h1>login</h1>
        </a>
    @endguest

    @auth
        <a href="/tasks">
            <h1>create task</h1>
        </a>

        <form action="/logout" method="POST">
            @csrf

            <button type="submit">Log Out</button>
        </form>
    @endauth


    @if ($tasks->count())
        @foreach ($tasks as $task)
            <a href="tasks/{{ $task->slug }}">
                <h1>{{ $task->title }}</h1>
            </a>

            <a href="/user/{{ $task->user->username }}">
                <p>made by {{ $task->user->username }}</p>
            </a>

            <p>{{ $task->slug }}</p>
        @endforeach
    @else
        <p>No task found</p>
    @endif

    {{ $tasks->links() }}

@endsection
