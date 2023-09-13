@extends('layout')

@section('content')

    <main class="flex flex-col items-center mt-7">

{{--        <div class="w-full md:w-2/3 shadow p-5 rounded-lg bg-white">--}}
{{--            <div class="flex items-center justify-between mt-4">--}}
{{--                <p class="font-medium">--}}
{{--                    Filters--}}
{{--                </p>--}}
{{--                <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">--}}
{{--                    Reset Filter--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            <div>--}}
{{--                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">--}}

{{--                    <x-dropdown title="Tags" :contents="[1,2,3,4,5]"/>--}}

{{--                    <x-filter-button name="Name"/>--}}

{{--                    <x-filter-button name="Status"/>--}}

{{--                    <x-filter-button name="Newest"/>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <x-title title="Tasks list"/>

        @if ($tasks->count())
            @foreach ($tasks as $task)
                <x-task :task="$task" :index="true"/>
            @endforeach
        @else
            <h1 class="text-2xl text-indigo-500 mt-10">No task found</h1>
        @endif

        {{ $tasks->links() }}
    </main>
@endsection
