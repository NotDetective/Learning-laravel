@extends('layout')

@section('content')

    <main class="flex flex-col items-center">
        <x-title title="Add permission"/>
        <x-form action="{{route('permission.store')}}" class="w-[300px]">

            <x-form.input name="name"/>

{{--            <x-form.input name="system_name"/>--}}
{{--            system name = $object + $action --}}
            <div class="flex w-full justify-evenly">
                <x-form.radio titleName="Object" inputName="object" :values="['user','task','role','permission']" onclick="addSystemName();"/>
                <x-form.radio titleName="Action" inputName="action" :values="['add','edit','delete']" onclick="addSystemName();"/>
            </div>
            <input type="hidden" name="system_name">
            <x-button />
            <x-form.error name="system_name"/>
        </x-form>
    </main>

    <script>
        const addSystemName = () => {
            const object = document.querySelector('input[name="object"]:checked').value;
            const action = document.querySelector('input[name="action"]:checked').value;
            const systemName = action + '_' + object;
            console.log(systemName);
            document.querySelector('input[name="system_name"]').value = systemName;
        }
    </script>
@endsection
