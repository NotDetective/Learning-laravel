<div class="w-full h-full">
    <div class="flex flex-col h-full w-full justify-between items-center">
        <textarea name="body" wire:model.live="comment"
                  class="border-2 border-indigo-500 rounded flex-1 w-2/3 mb-6 "
                  placeholder="Quick thing of something to say!"></textarea>
        <button wire:click="save"
                class="bg-white border-indigo-500 border-2 rounded mb-2 pl-3 pr-3 pb-1 pt-1 hover:bg-gray-100">Add
            comment
        </button>
        @error('comment')
        <p class="text-red-600">{{$message}}</p>
        @enderror
    </div>
</div>
