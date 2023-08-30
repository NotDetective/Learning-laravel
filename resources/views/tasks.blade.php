@extends('layout')

@section('content')

<h1>Task List</h1>

@foreach ( $tasks as $task)
    <p>id of task is: {{$task->id}}</p>

    <a href="tasks/{{$task->slug}}">
        <h1>{{$task->title}}</h1>
    </a>

    <a href="/user/{{$task->user->username}}">
        <p>made by {{$task->user->username}}</p>
    </a>

    <p>{{$task->slug}}</p>
@endforeach

@endsection