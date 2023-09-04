@extends('layout')

@section('content')
    <main class="flex flex-col h-screen items-center justify-evenly">
        <x-title title="Edit your comment!"/>
        <x-comment-layout>
            <x-form action="{{route('comment.update', [$task->slug , $comment->id])}}" method="PATCH"
            class="flex flex-col h-full items-center">

                <x-form.textarea name="body" :comment="$comment" class="flex-1 w-full">{{$comment->body}}</x-form.textarea>

                <x-button>update comment</x-button>
            </x-form>
            <x-form.error name="body"/>
        </x-comment-layout>
    </main>
@endsection
