@extends('layout')

@section('content')

    <main class="flex flex-col min-h-screen items-center">
        <x-title title="login"/>

        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                     alt="Your Company">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                    account</h2>
            </div>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <x-form action="{{route('sessions.store')}}" method="POST" class="space-y-6">
                    <x-form.input name="email" type="email" page="login"/>
                    <x-form.input name="password" type="password" page="login"/>
                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            login
                        </button>
                    </div>
                </x-form>
            </div>
        </div>
    </main>

@endsection
