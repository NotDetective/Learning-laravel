@props(['name', 'title' ,'id', 'value' ,'checked' => false , 'selected' => null])


<div class="relative flex items-start pb-4 pt-3.5">
    <div class="min-w-0 flex-1 text-sm leading-6">
        <label for="{{$id}}" class="font-medium text-gray-900">{{$title}}</label>
    </div>
    <div class="ml-3 flex h-6 items-center">
        <input id="{{$id}}" name="{{$name}}" value="{{$value}}" type="checkbox"
               class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
               @if($selected != null)
                   @if(in_array($value, $selected))
                       checked
                  @endif
               @endif
               @if($checked) checked @endif>


    </div>
</div>
