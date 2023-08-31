@extends('layout')

@section('content')

    <form method="POST" action="/tasks/{{$task->id}}/update">
        @csrf
        @method('PATCH')

        <input type="text" name="title" placeholder="title" value="{{$task->title}}">
        @error('title')
            <p style="color: red;">{{ $errors->first('title') }}</p>
        @enderror

        <textarea name="description" cols="30" rows="10"  placeholder="add a description">{{$task->description}}</textarea>

        @error('description')
            <p style="color: red;">{{ $errors->first('description') }}</p>
        @enderror

        <button type="submit">update task</button>

    </form>
@endsection
