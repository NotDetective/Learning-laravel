@extends('layout')

@section('content')

    <main class="mt-12 flex flex-col justify-around items-center flex-shrink-0">

        <x-task :task="$task"/>

        <section class="min-h-screen">
            <x-title title="Comments!" class="text-indigo-500 text-3xl font-bold mt-6 pb-3 text-center ml-1 mr-1"/>
            @auth
                <x-comment-layout>
                    <x-form method="POST" :action="route('tasks.comments.store', $task->slug)" name=""
                            class="flex flex-col h-full w-full justify-between items-center">
                        <x-form.textarea name="body" placeholder="Quick thing of something to say!"/>
                        <x-button name="Add Comment"/>
                    </x-form>
                </x-comment-layout>
            @endauth
            @if ($comments->count())

                @foreach ($comments as $comment)
                    <x-comment-layout>
                        <x-comment-context :comment="$comment" :task="$task"/>
                    </x-comment-layout>
                @endforeach

            @else
                <h1 class="text-2xl text-indigo-500 mt-10">There are no comments yet be the first to post one</h1>
            @endif
        </section>
    </main>
@endsection

