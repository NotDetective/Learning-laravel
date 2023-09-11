@extends('layout')

@section('content')

    <main class="flex flex-col min-h-screen items-center justify-center mt-6">
        <section class="w-full max-w-2xl">
            <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
                <div class="px-4 py-5 sm:px-6">
                    <h1 class="mt-6 text-4xl text-indigo-500 font-bold">All tasks of user</h1>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <x-form :action="route('tasks.update', $task->id)" method="PATCH">
                        <x-form.input name="title" :value="$task->title"/>
                        <x-form.textarea name="description" class="mt-6 h-32">{{$task->description}}</x-form.textarea>

                        <x-form.checkbox-field :array="$images" name="oldImages[]" title="select to remove images"/>

                        <x-form.file title="Upload some photos with it!" name="images[]" :multiple="true"/>

                        <x-form.checkbox-field :array="$files" name="oldFiles[]" title="select to remove files"/>

                        <x-form.file title="Upload some files with it!" name="files[]" :multiple="true"/>

                        <x-button name="Add task"/>
                    </x-form>
                </div>
            </div>
        </section>
    </main>

@endsection
