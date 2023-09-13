@extends('layout')

@section('content')
    <main class="h-screen w-screen flex items-center justify-center">

        <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
            <div class="px-4 py-5 sm:px-6">
                <x-title title="make a account for new user"/>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <x-form :action="route('register.store-admin')" id="admin-add-user-form">
                    <x-form.input name="username"/>
                    <x-form.input name="email" type="email"/>
                    <x-form.input name="password" type="hidden" value="1234567890"/>
                </x-form>
            </div>
            <div class="px-4 py-4 sm:px-6">
                <x-button name="Add user" form="admin-add-user-form"/>
            </div>
        </div>

    </main>
@endsection
