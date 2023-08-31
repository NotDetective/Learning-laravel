@extends('layout')

@section('content')
    <form method="POST" action="/create">
        @csrf

        <input type="text" name="title" placeholder="add title">
        @error('title')
            <p style="color: red;">{{ $errors->first('title') }}</p>
        @enderror

        <textarea name="description" cols="30" rows="10" placeholder="add a description"></textarea>

        @error('description')
            <p style="color: red;">{{ $errors->first('description') }}</p>
        @enderror

        <button type="submit">add task</button>

    </form>

    <x-redirect-button href="/">go back</x-redirect-button>
@endsection
