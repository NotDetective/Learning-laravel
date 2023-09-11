@props(['title','name' ,'multiple' => false])

<label class="block mb-2 text-sm font-medium text-black " for="{{$name}}">{{$title}}</label>
<input
    class="block w-full text-sm text-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-black hover:file:bg-indigo-100"
    id="{{$name}}" name="{{$name}}" type="file" @if($multiple) multiple @endif>

<x-form.error name="{{$name}}"/>
