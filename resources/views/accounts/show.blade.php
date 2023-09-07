@extends('layout')

@section('content')

    <main class="h-screen w-screen">
        <div>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their
                            username, email and role.</p>
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
    </main>

@endsection
