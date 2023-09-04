@props(['title' , 'class' => ""])

<h1 {{$attributes->merge(['class' => 'mt-6 text-4xl text-indigo-500 font-bold '.$class])}}
>{{$title}}</h1>
