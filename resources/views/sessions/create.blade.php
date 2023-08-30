@extends('layout')

@section('content')

<form method="POST" action="/login">
    @csrf

    <input type="email" name="email" id="email" placeholder="email" required value="{{ old('email')}}">

    @error('email')

        <p style="color: red;">{{$errors->first('email')}}</p>
        
    @enderror

    <input type="password" name="password" id="password" placeholder="password" required>

    <button type="submit">login</button>

</form>

@endsection