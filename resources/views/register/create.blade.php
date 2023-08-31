@extends('layout')

@section('content')
    <h1>register</h1>

    <form method="POST" action="/register">
        @csrf

        <input type="text" name="username" placeholder="username" id="username" required value="{{ old('username') }}">

        @error('username')
            <p style="color: red;">{{ $errors->first('username') }}</p>
        @enderror

        <input type="email" name="email" placeholder="email" id="email" required value="{{ old('email') }}">

        @error('email')
            <p style="color: red;">{{ $errors->first('email') }}</p>
        @enderror

        <input type="password" name="password" placeholder="password" id="password" required>

        @error('password')
            <p style="color: red;">{{ $errors->first('password') }}</p>
        @enderror



        <button type="submit">register</button>

    </form>

    <x-redirect-button href="/">no I dont want to make a account</x-redirect-button>

@endsection
