<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <main class="flex flex-col items-center mt-7">

        <div class="w-full md:w-2/3 shadow p-5 rounded-lg bg-white">
            <div class="flex items-center justify-between mt-4">
                <p class="font-medium">
                    Filters
                </p>
                <button wire:click="resetFilters"
                        class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                    Reset Filter
                </button>
            </div>

            <div>
                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">

{{--                    <x-dropdown title="Tags" :contents="[1,2,3,4,5]"/>--}}

                    <x-filter-button name="Title" column="title" :currentColumn="$column" :direction="$direction"/>

                    <x-filter-button name="Due Date" column="due_date" :currentColumn="$column" :direction="$direction"/>

                    <div>
                        <div class="relative flex justify-center ">
                            <input wire:model.live="search" type="text" placeholder="search for task" name="search" id="search" class="block w-full h-full rounded-md border-0 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                                <kbd class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">Search</kbd>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <x-title title="Tasks list"/>

        @if ($tasks)
            @foreach ($tasks as $task)
                <x-task :task="$task" :index="true"/>
            @endforeach
        @else
            <h1 class="text-2xl text-indigo-500 mt-10">No task found</h1>
        @endif

        {{ $tasks->links() }}

    </main>
</div>
