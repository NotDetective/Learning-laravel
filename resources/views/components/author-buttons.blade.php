@props(['user'=> false, 'edit_href'=> '#','delete_href' => '#'])

@if($user)
    <div class="flex items-center justify-evenly w-full">
        <a href="{{$edit_href}}">
            <x-button name="edit"/>
        </a>
        <x-form action="{{$delete_href}}" method="DELETE">
            <x-button name="delete"/>
        </x-form>
    </div>
@endif
