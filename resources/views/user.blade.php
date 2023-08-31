@extends('layout')

@section('content')
    <h1>All tasks of user</h1>

    @foreach ($tasks as $task)
        <a href="tasks/{{ $task->slug }}">
            <h1>{{ $task->title }}</h1>
        </a>

        <a href="/user/{{ $task->user->username }}">
            <p>made by {{ $task->user->username }}</p>
        </a>

        <p>{{ $task->slug }}</p>
    @endforeach

    <x-redirect-button href="/">go back</x-redirect-button>
@endsection
