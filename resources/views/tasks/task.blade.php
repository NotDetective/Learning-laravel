@extends('layout')

@section('content')

<h1>{{$task->title}}</h1>

<p>{{$task->slug}}</p>

<p>{{$task->description}}</p>

<a href="/"><h1>Return</h1></a>

@if (auth()->check())
    <form method="POST" action="/tasks/{{$task->slug}}/comments">
        @csrf

        <input type="hidden" name="task_id" value="{{$task->id}}">

        <textarea name="body" cols="30" rows="10"></textarea>

        <button type="submit">add comment</button>

    </form>
@endif

@if ($comments->count())

    @foreach ($comments as $comment)
        <p>{{$comment->user->username}}</p>
        <p>Created {{$comment->created_at->diffForHumans()}}</p>
        <p>{{$comment->body}}</p>
    @endforeach
    
@else

    <p>No comments jet  be the first to add one</p>

@endif
@endsection

