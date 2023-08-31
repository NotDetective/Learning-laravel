@extends('layout')

@section('content')

    <h1>{{$task->title}}</h1>

    <p>{{$task->slug}}</p>

    <p>{{$task->description}}</p>

    <x-redirect-button href="/">go back</x-redirect-button>

    @if($task->user_id == auth()->id())

        <x-redirect-button href="/tasks/{{$task->id}}/edit">edit task</x-redirect-button>

        <form action="/tasks/{{$task->id}}/delete" method="POST">
            @csrf
            @method('DELETE')
            <button>delete task</button>
        </form>

    @endif

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
            @if($comment->edited)
                <p>this commend has been edited!</p>
            @endif
            @if($comment->user_id == auth()->id())
                <a href="/tasks/{{$task->slug}}/comment/{{$comment->id}}">
                    <button>edit comment</button>
                </a>
                <form action="/tasks/{{$task->slug}}/comment/{{$comment->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>delete comment</button>
                </form>

            @endif

        @endforeach

    @else

        <p>No comments jet be the first to add one</p>

    @endif
@endsection

