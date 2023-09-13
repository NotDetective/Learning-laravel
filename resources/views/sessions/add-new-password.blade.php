<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enter new password</title>
    <link rel="shortcut icon" href="../../img/icon.png" type="image/x-icon">

    @vite('resources/css/app.css')

</head>
<body>

<main class="h-screen w-screen flex items-center justify-center">

    <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:px-6">
            <x-title title="Add a new password to continue"/>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <x-form :action="route('sessions.store-new-user')" id="sessions.store-new-user">
                <x-form.input name="password" type="password"/>
            </x-form>
        </div>
        <div class="px-4 py-4 sm:px-6">
            <x-button name="Add new password" form="sessions.store-new-user"/>
        </div>
    </div>

</main>

</body>
</html>
