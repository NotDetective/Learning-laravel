@extends('layout')

@section('content')

<main class="h-screen flex items-center justify-center">
    <x-form action="{{route('account.update', auth()->id())}}" method="PATCH" name="change email" class="w-[600px]">
        <x-form.input name="email" type="email"/>
        <x-form.input name="password" type="password"/>
        <x-form.input name="new_email" type="email"/>
        <x-form.input name="new_password" type="password"/>


        <x-button name="change email"/>
    </x-form>
</main>

@endsection
