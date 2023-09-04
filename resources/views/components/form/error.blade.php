@props(['name'])

@error($name)
<p class="text-red-600">{{ $errors->first($name) }}</p>
@enderror
