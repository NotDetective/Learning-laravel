@extends('layout')

@section('content')
    <main class="flex flex-col min-h-screen items-center">
        <h1 class="mt-6 text-4xl text-indigo-500 font-bold">All tasks of user</h1>

        <x-task-form action="/create" method="POST"/>
    </main>


@endsection
