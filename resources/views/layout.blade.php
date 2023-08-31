<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
    <link rel="stylesheet" href="/basic-style.css">
</head>

<body>

    @if (session()->has('success'))
        <div>
            <p>{{ session('success') }}</p>
        </div>
    @endif


    <header>

    </header>

    @yield('content')

    <footer>

    </footer>

</body>

</html>
