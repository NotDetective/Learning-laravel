@props(['contents' , 'title'])

<select class="px-4 text-center py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
    <option value="">{{$title}}</option>
    @foreach($contents as $content)
        <option value="lorem ipsum">lorem ipsum</option>
    @endforeach
</select>
