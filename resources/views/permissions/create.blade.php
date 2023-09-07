@extends('layout')

@section('content')

    <main class="flex flex-col items-center">
        <x-title title="Add permission"/>
        <x-form action="{{route('permission.store')}}" class="w-[300px]">

            <x-form.input name="name"/>

            <x-form.input name="object"/>
            <x-form.input name="action"/>
            <input type="hidden" name="system_name">
            <x-button/>
            <x-form.error name="system_name"/>
        </x-form>
    </main>

    <script>
        const addSystemName = () => {
            const object = document.querySelector('input[name="object"]').value;
            const action = document.querySelector('input[name="action"]').value;
            const systemName = action + '_' + object;
            console.log(systemName);
            document.querySelector('input[name="system_name"]').value = systemName;
        }
        document.querySelector('input[name="object"]').addEventListener('change', addSystemName);
        document.querySelector('input[name="action"]').addEventListener('change', addSystemName);
    </script>
@endsection
