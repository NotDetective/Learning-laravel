@extends('layout')

@section('content')

    <form action="/tasks/{{$task->slug}}/comment/{{$comment->id}}/edit" method="POST">
        @csrf
        @method('PATCH')

        <textarea name="body" cols="30" rows="10">{{$comment->body}}</textarea>

        <button type="submit">update comment</button>

    </form>

    @error('body')
    <p style="color: red;">{{ $errors->first('body') }}</p>
    @enderror

@endsection
