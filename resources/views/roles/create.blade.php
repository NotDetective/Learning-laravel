@extends('layout')

@section('content')

<main class="flex flex-col items-center justify-center h-screen w-screen">
{{--    <x-title title="Add role"/>--}}
    <x-form action="{{route('role.store')}}" class="flex flex-col items-center h-1/3 justify-evenly">

        <x-form.input name="name" />

        <x-form.checkbox-field title="select with permissions this role has" name="permissions[]" :array="$permissions"/>

        <x-button />
    </x-form>
</main>

@endsection
