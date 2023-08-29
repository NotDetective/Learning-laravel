@extends('layout')

@section('content')

<h1>Task List</h1>

@foreach ( $tasks as $task)
    <h1>{{$task->title}}</h1>
@endforeach

@endsection