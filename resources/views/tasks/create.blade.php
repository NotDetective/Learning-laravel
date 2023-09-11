@extends('layout')

@section('content')
    <main class="flex flex-col min-h-screen items-center justify-center">
        <section class="w-full max-w-2xl">
            <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                <div class="px-4 py-5 sm:px-6">
                    <h1 class="mt-6 text-4xl text-indigo-500 font-bold">All tasks of user</h1>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <x-form :action="route('tasks.store')">
                        <x-form.input name="title"/>
                        <x-form.textarea name="description" class="mt-6 h-32"></x-form.textarea>
                        <x-form.file title="Upload some photos with it!" name="images[]" :multiple="true"/>

                        <x-button name="Add task"/>
                    </x-form>
                </div>
            </div>
        </section>
    </main>

@endsection
