<div class="@if($deleted) hidden @endif">
    <x-comment-layout>
        <div class="w-full h-full ">
            <h1 class="text-xl pb-2">{{$comment->user->username}}</h1>

            <p class="">Posted: {{$comment->created_at->diffForHumans()}}</p>

            <div class="@if($show) hidden {{$show}} @endif">
                <div class="flex flex-col h-full w-full justify-between items-center">
                    <textarea wire:model="body"
                              class="border-2 border-indigo-500 rounded w-2/3 mb-6">{{$body}}</textarea>
                    <button wire:click="update"
                            class="bg-white border-indigo-500 border-2 rounded mb-2 pl-3 pr-3 pb-1 pt-1 hover:bg-gray-100">
                        update
                        comment
                    </button>
                    @error('comment')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="@if(!$show) hidden @endif">
                <p class="ml-3 mr-3 flex-1 text">{{$body}}</p>

                @if($comment->user_id == auth()->id())
                    <button wire:click="showFlip" class="border-2 border-indigo-500 rounded p-1 mt-10">edit your post
                    </button>

                    <button wire:click="delete({{$comment}})" class="border-2 border-indigo-500 rounded p-1 mt-10">
                        delete
                        your post
                    </button>
                @endif

                <p class="text-gray-400 text-sm">@if($comment->edited)
                        Edited
                    @endif</p>
            </div>
        </div>
    </x-comment-layout>
</div>
