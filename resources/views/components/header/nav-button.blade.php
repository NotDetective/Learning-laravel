@props(['active'=>false])

@php
    if ($active) $classes = "inline-flex items-center border-b-2 border-indigo-500 px-1 pt-1 text-sm font-medium text-gray-900";
    else $classes = "inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700";
@endphp

<a {{ $attributes->merge(['class' => $classes],['href' => '#']) }}
   class="inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium"
>
    {{ $slot }}
</a>
