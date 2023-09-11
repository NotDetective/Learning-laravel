@props(['name', 'class' => "" , 'placeholder' => ""])

<textarea name="{{$name}}"
{{ $attributes->merge(['class' => 'border-2 border-indigo-300 rounded flex-1 w-full mb-6 '.$class])}} placeholder="{{$placeholder}}"
>{{ $slot }}</textarea>

@error($name)
    <p class="text-red-600">{{ $errors->first($name) }}</p>
@enderror
