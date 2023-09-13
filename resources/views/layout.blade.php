<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task List</title>
    <link rel="shortcut icon" href="../../img/icon.png" type="image/x-icon">

    {{--frameworks--}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
<header>

    <nav class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex px-2 lg:px-0">
                    <div class="hidden lg:ml-6 lg:flex lg:space-x-8">
                        <x-header.nav-button :active="request()->is('/')" href="/">home</x-header.nav-button>
                        @auth
                            @if(hasPermission('task_add'))
                                <x-header.nav-button :active="request()->is('create')" href="/create">add task
                                </x-header.nav-button>
                            @endif
                            @if(hasPermission('permission_add'))
                                <x-header.nav-button :active="request()->route()->named('permission.create')"
                                                     :href="route('permission.create')">add permission
                                </x-header.nav-button>
                            @endif
                            @if(hasPermission('role_add'))
                                <x-header.nav-button :active="request()->route()->named('role.create')"
                                                     :href="route('role.create')">add role
                                </x-header.nav-button>
                            @endif
                            @if(hasPermission('permission_edit'))
                                <x-header.nav-button :active="request()->route()->named('role.show')"
                                                     :href="route('role.show')">edit roles
                                </x-header.nav-button>
                            @endif
                            @if(hasPermission('account_show'))
                                <x-header.nav-button :active="request()->route()->named('account.show')"
                                                     :href="route('account.show')">Edit accounts
                                </x-header.nav-button>
                            @endif
                        @endauth
                    </div>
                </div>
                <x-header.search-bar/>
                @auth
                    <div class="border-t border-gray-200 pb-3 pt-4 z-40" x-data="{ open: false }">
                        <button @click="open = ! open">
                            <div class="flex items-center px-4">
                                <div class="flex-shrink-0">
                                    <x-icon size="10" :profile="getProfile()"/>
                                </div>
                                <div class="ml-3">
                                    <div class="text-base font-medium text-gray-800">{{auth()->user()->username}}</div>
                                    <div class="text-base font-medium text-gray-800">{{auth()->user()->email}}</div>
                                </div>
                            </div>
                        </button>
                        <div class=" space-y-1 bg-white" x-show="open">
                            <a href="{{Route('account.edit' , auth()->id())}}"
                               class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Your
                                Profile</a>
                            <a href="/logout"
                               class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Sign
                                out</a>
                        </div>
                    </div>
                @endauth
                @guest
                    <x-header.nav-button :active="request()->is('login')" :href="route('sessions.create')">
                        login
                    </x-header.nav-button>
                    <x-header.nav-button :active="request()->is('register')"
                                         :href="route('register.create')">register
                    </x-header.nav-button>
                @endguest
            </div>
    </nav>
</header>

@yield('content')

<x-notification sessionName="success"/>

<script src="../../js/model.js"></script>
@livewireScripts
</body>

</html>
