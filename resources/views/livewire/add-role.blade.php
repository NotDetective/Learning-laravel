<tr>
    <td class="relative py-4 pr-3 text-sm font-medium text-gray-900">
        {{ $user->username }}
        <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></div>
        <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
    </td>
    <td class=" px-3 py-4 text-sm text-gray-500 md:table-cell">{{ $user->email }}</td>
    @if(hasPermission('account_edit') && $user->id != auth()->id())
        <td>
            <div class="flex flex-wrap w-full" wire:key="{{ $user->id }}">
                <div>
                    @foreach($roles as $role)
                        <div class="ml-4">
                            <input type="checkbox"
                                   value="{{ $role->id }}"
                                   wire:model.live="checked"
                                   wire:click="addRole">
                            <label for="{{ $role->name }}">{{ $role->name }}</label>
                        </div>
                    @endforeach
                    <x-notification sessionName="updated"/>
                </div>
            </div>
        </td>
    @else
        <td>
            <div class="flex flex-wrap w-full">
                @foreach($user->roles as $role)
                    <span class="ml-4">{{ $role->name }}</span>
                @endforeach
            </div>
        </td>
    @endif
    @if(hasPermission('account_edit') && $user->id != auth()->id())
        <td class="relative py-4 pl-3 text-right text-sm font-medium">
            <a href="{{ route('account.edit-admin', $user->id) }}"
               class="text-indigo-600 hover:text-indigo-900">Edit
                user</a>
        </td>
    @endif
</tr>
