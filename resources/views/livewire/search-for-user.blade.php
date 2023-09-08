<div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their
                    username, email and role.</p>
            </div>
            <div>
                <label for="search" class="block text-sm font-medium leading-6 text-gray-900">search for user</label>
                <div class="relative mt-2 flex items-center">
                    <input type="text" wire:model.live="search" placeholder="username"
                           class="block w-full rounded-md border-0 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8 flow-root overflow-hidden">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <table class="w-full text-left">
                <thead class="bg-white">
                <tr>
                    <th scope="col"
                        class="relative isolate py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                        Username
                        <div
                            class="absolute inset-y-0 right-full -z-10 w-screen border-b border-b-gray-200"></div>
                        <div class="absolute inset-y-0 left-0 -z-10 w-screen border-b border-b-gray-200"></div>
                    </th>
                    <th scope="col"
                        class=" px-3 py-3.5 text-left text-sm font-semibold text-gray-900 md:table-cell">Email
                    </th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Role</th>

                    <th scope="col" class="relative py-3.5 pl-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <x-admin-account-panel :user="$user" :roles="$roles"/>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
