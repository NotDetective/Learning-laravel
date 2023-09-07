@extends('layout')

@section('content')

    <main class="h-screen w-screen flex flex-col items-center justify-center">
        <x-title title="Edit account of user: {{$user->username}}"/>

        <x-form :action="route('account.update-admin' , $user->id)" method="PATCH">
            <x-form.input name="username" :value="$user->username"/>
            <x-form.input name="email" :value="$user->email"/>

            <x-button/>
        </x-form>
    </main>

@endsection
