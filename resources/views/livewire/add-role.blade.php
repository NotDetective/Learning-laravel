<div>
    @foreach($roles as $role)
        <div class="ml-4">
            <input type="checkbox"
                   value="{{$role->id}}"
                   wire:model.live="checked"
                   wire:click="addRole">
            <label for="{{$role->name}}">{{$role->name}}</label>
        </div>
    @endforeach
    <x-notification sessionName="updated"/>
</div>
