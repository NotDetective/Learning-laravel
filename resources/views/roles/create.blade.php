@extends('layout')

@section('content')

<main class="flex flex-col items-center justify-center h-screen w-screen">
    <x-title title="Add role"/>
    <x-form action="{{route('role.store')}}" class="flex flex-col items-center h-1/3 justify-evenly">

        <x-form.input name="name" />

        <div class="flex flex-col h-1/2 flex-wrap justify-between">
            <x-form.checkbox :array="$permissions"/>
        </div>
        <x-button />
    </x-form>
</main>

@endsection
