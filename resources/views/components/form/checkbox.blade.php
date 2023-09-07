@props(['array' , 'selected' => [] , 'class'=> ''])

@foreach($array as $arrayItem)
    <div class="{{$class}}">
        <input type="checkbox" name="permissions[]" value="{{$arrayItem->id}}" @if(in_array($arrayItem->id, $selected)) checked="" @endif>
        <label for="{{$arrayItem->name}}">{{$arrayItem->name}}</label>
    </div>
@endforeach
