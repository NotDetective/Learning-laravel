@extends('layout')

@section('content')

    <main class="h-screen flex items-center justify-center">

        <section class="bg-white drop-shadow-lg h-1/2 w-1/2 rounded-xl flex flex-col items-center">
            <div class="w-11/12 border-b-2 border-indigo-500 mb-2">
                <x-title title="Account"/>
            </div>
            <div class="flex flex-1 h-full w-full items-center justify-evenly">
                <div class="flex h-3/6 flex-col justify-between">
                    <div>
                        <p class="text-lg">Username: {{$user->username}}</p>
                        <button onclick="openModel('editUsername')">Change Username</button>
                        <x-form.error name="username"/>
                    </div>
                    <div>
                        <p class="text-lg">Email: {{$user->email}}</p>
                        <button onclick="openModel('editEmail')">Change Email</button>
                        <x-form.error name="email"/>
                    </div>
                    <div>
                        <p class="text-lg">Password: ●●●●●●●●●●</p>
                        <button onclick="openModel('editPassword')">Change Password</button>
                        <x-form.error name="password"/>
                    </div>
                </div>
                <div class="flex items-center flex-col">
                    <x-icon :profile="$profile" size="52" />
                    <button onclick="openModel('updateProfileModel')">Change Avatar</button>
                </div>
            </div>
            <div class="flex justify-end w-full mb-2">
                <button type="button" onclick="openModel('deactivate')"
                        class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                    Deactivate account
                </button>
            </div>
        </section>
    </main>


    <x-account.update-profile-model modelId="updateProfileModel" :user="$user"/>
        <x-account.edit-account-model modelId="editUsername" :action="route('account.updateUsername' , $user->id)" edit="username" formId="UpdateUsername"/>
        <x-account.edit-account-model modelId="editEmail" :action="route('account.updateEmail' , $user->id)" edit="email" formId="UpdateEmail"/>
        <x-account.edit-account-model modelId="editPassword" :action="route('account.updatePassword' , $user->id)" edit="password" formId="UpdatePassword"/>
        <x-account.deactivate-model modelId="deactivate" :user="$user"/>

@endsection
