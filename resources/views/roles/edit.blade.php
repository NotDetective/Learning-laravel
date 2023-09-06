@extends('layout')

@section('content')
<main class="flex flex-col items-center justify-center h-screen w-screen">
    <x-title title="edit role: {{$role->name}}"/>
    <x-form action="{{route('role.update' , $role->id)}}" method="PATCH" class="flex flex-col items-center h-1/3 justify-evenly">

        <x-form.input name="name" value="{{$role->name}}"/>

        <x-form.checkbox :array="$permissions" :selected="$selectedPermissions"/>

        <x-button/>
    </x-form>
</main>

@endsection
