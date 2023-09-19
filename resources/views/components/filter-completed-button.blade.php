@props(['completed'])

<button wire:click="setCompleted"
        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 text-sm">
    <div class="flex">
        <p class="flex-1">Completed first</p>

        @if($completed === 0)
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                    <path d="M200-440v-80h560v80H200Z"/>
                </svg>
            </div>
        @else
            @if($completed === 1)
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path d="M480-345 240-585l56-56 184 184 184-184 56 56-240 240Z"/>
                    </svg>
                </div>
            @else
                <div class="rotate-180">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                        <path d="M480-345 240-585l56-56 184 184 184-184 56 56-240 240Z"/>
                    </svg>
                </div>
            @endif
        @endif

    </div>
</button>
