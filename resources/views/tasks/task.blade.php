@extends('layout')

@section('content')

<h1>{{$task->title}}</h1>

<p>{{$task->slug}}</p>

<p>{{$task->description}}</p>

<a href="/"><h1>Return</h1></a>

@endsection

