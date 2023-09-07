@props(['user'=> false, 'edit_href'=> '#','delete_href' => '#' , 'task' => false])

@if($user)
    <div class="flex items-center justify-evenly w-full">
        @if(!$task || hasPermission('task_edit'))
            <a href="{{$edit_href}}">
                <x-button name="edit"/>
            </a>
        @endif
        @if(!$task || hasPermission('task_delete'))
            <x-form action="{{$delete_href}}" method="DELETE">
                <x-button name="delete"/>
            </x-form>
        @endif
    </div>
@endif
