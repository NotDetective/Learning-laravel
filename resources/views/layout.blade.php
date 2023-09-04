<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
    @vite('resources/css/app.css')
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
                            <x-header.nav-button :active="request()->is('create')" href="/create">add task</x-header.nav-button>
                            <x-header.logout/>
                        @endauth
                        @guest
                            <x-header.nav-button :active="request()->is('login')" href="{{route('sessions.create')}}">login</x-header.nav-button>
                            <x-header.nav-button :active="request()->is('register')" href="{{route('register.create')}}">register</x-header.nav-button>
                        @endguest
                    </div>
                </div>
                <x-header.search-bar/>
            </div>
        </div>
    </nav>
</header>


@yield('content')

<footer>
    @if (session()->has('success'))
        <div>
            <p>{{ session('success') }}</p>
        </div>
    @endif
</footer>

</body>

</html>
