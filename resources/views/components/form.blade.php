@props(['action' , 'method' => "POST" , 'class' => "", 'name' => "" , 'id' => ""])

<form action="{{$action}}" class="{{$class}}" name="{{$name}}" id="{{$id}}" enctype="multipart/form-data"
      method="{{ ($method == 'GET') ? 'GET' : 'POST' }}">
    @csrf
    @if(in_array($method , ['PUT' , 'PATCH' , 'DELETE']))
        @method($method)
    @endif
    {{$slot}}
</form>
