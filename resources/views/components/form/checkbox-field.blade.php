@props(['array', 'title' , 'name', 'checked' => false , 'selected' => null])

<h1>{{$title}}</h1>
<fieldset class="border-b border-t border-gray-200 mt-6">
    <div class="divide-y divide-gray-200">
        @foreach($array as $item)
            <x-form.checkbox :selected="$selected" :value="$item->id" :name="$name" :title="$item->name" :id="$item->id" :checked="$checked"/>
        @endforeach
    </div>
</fieldset>
