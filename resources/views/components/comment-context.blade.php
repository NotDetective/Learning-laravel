@props(['comment', 'task'])

<h1 class="text-xl pb-2">{{$comment->user->username}}</h1>

<p class="">Posted: {{$comment->created_at->diffForHumans()}}</p>

<p class="ml-3 mr-3 flex-1 text">{{$comment->body}}</p>


<x-author-buttons edit_href="{{route('comment.edit', [$task->slug, $comment->id])}}"
                  delete_href="{{route('comment.destroy', [$task->slug, $comment->id])}}"
                  :user="$comment->user_id == auth()->id()"/>

@if($comment->user_id != auth()->id())
    <x-edited-text :edited="$comment->edited"/>
@endif

