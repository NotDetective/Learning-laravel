@extends('layout')

@section('content')

    <main class="mt-12 flex flex-col justify-around items-center flex-shrink-0">

        <div class="flex justify-evenly w-screen">
            <x-task :task="$task"/>
        </div>

        @if($images != null)
            <x-task-media>
                @foreach($images as $image)
                    <img class="mt-3 w-[280px] h-[180px]" src="{{$image->getUrl()}}" alt="task-image">
                @endforeach
            </x-task-media>
        @endif

        @if($files != null)
            <x-task-media>
                @foreach($files as $file)
                    <a href="{{$file->getUrl()}}" class="mt-3 w-[280px] h-[180px]">
                        <div
                            class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                            <div class="p-4">
                                <div class="flex items-center">
                                    <div class="flex w-0 flex-1 justify-between">
                                        <p class="w-0 flex-1 text-sm font-medium text-gray-900">{{$file->file_name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </x-task-media>
        @endif

        <section class="min-h-screen">
            <x-title title="Comments!" class="text-indigo-500 text-3xl font-bold mt-6 pb-3 text-center ml-1 mr-1"/>
            @auth
                <x-comment-layout>
                    <livewire:add-comment :task="$task"/>
                </x-comment-layout>
            @endauth
            @if ($comments->count())

                @foreach ($comments as $comment)
                    <livewire:edit-comment :comment="$comment" :task="$task"/>
                @endforeach

            @else
                <h1 class="text-2xl text-indigo-500 mt-10">There are no comments yet be the first to post one</h1>
            @endif
        </section>
    </main>
@endsection

