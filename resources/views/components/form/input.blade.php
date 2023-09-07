@props(['name', 'type' => 'text', 'id'=> '', 'page' => '', 'task' => '' , 'value' => null])


@if(in_array($page, ['login', 'register']))
    <div>
        <label for="{{$name}}" class="block text-sm font-medium leading-6 text-gray-900">{{$name}}</label>
        <div class="mt-2">
            <input type="{{$type}}" name="{{$name}}" placeholder="{{$name}}" id="{{$id}}" required
                   value="{{ old($name) }}"
                   class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

        </div>

    </div>
@else
    <div class="sm:col-span-4">
        <label for="{{$name}}" class="block text-sm font-medium leading-6 text-gray-900">{{$name}}</label>
        <div class="mt-2">
            <div
                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                <input id="{{$id}}" type="{{$type}}" name="{{$name}}" placeholder="{{$name}}"
                       value="@if(old($name)){{old($name)}}@else{{ $value }}@endif"
                       class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
            </div>
        </div>
    </div>
@endif



<x-form.error :name="$name"/>
