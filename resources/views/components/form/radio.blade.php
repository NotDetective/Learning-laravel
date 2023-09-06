@props(['titleName' , 'inputName' , 'values', 'onclick' => null])

<div class="flex-col flex items-center">
    <h1 class="font-bold">{{$titleName}}</h1>
    @foreach($values as $value)
        <div>
            <input type="radio" name="{{$inputName}}" value="{{$value}}" @if($onclick) onclick="{{$onclick}}"@endif required>
            <label for="{{$inputName}}">{{$value}}</label>
        </div>
    @endforeach
</div>
