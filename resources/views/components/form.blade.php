@props(['action' , 'method' => "POST" , 'class' => "", 'name' => ""])

<form action="{{$action}}" class="{{$class}}" name="{{$name}}"
      method="{{ ($method == 'GET') ? 'GET' : 'POST' }}">
{{--      method="@if($method == 'GET') GET @else POST @endif">--}}
@csrf
@if(in_array($method , ['PUT' , 'PATCH' , 'DELETE']))
    @method($method)
@endif
{{$slot}}
</form>
