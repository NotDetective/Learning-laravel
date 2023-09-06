@extends('layout')

@section('content')

    <main class="flex flex-col items-center ">
        @foreach($roles as $role)
            <div class="flex items-center justify-center w-1/5">
                <x-title :title="$role->name" class="flex-1"/>
                <div class="flex items-center justify-center mt-9">
                    <a href="{{route('role.edit' , $role->id)}}">
                        <x-button name="edit Role"/>
                    </a>
                    <x-form :action="route('role.destroy' , $role->id)" method="DELETE">
                        <x-button name="delete Role"/>
                    </x-form>
                </div>
            </div>
        @endforeach
    </main>
@endsection
