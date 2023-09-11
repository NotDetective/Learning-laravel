@extends('layout')

@section('content')
    <main class="flex flex-col items-center justify-center h-screen w-screen">
        
        <x-form action="{{route('role.update' , $role->id)}}" method="PATCH"
                class="flex flex-col items-center h-1/3 justify-evenly">

            <x-form.input name="name" value="{{$role->name}}"/>

            <x-form.checkbox-field title="select with permissions this role has" name="permissions[]"
                                   :array="$permissions" :selected="$selectedPermissions"/>

            <x-button/>
        </x-form>
    </main>

@endsection
