@extends('layout')

@section('content')

    {{--    @foreach($roles as $role)--}}
    {{--        {{$role->name}}--}}
    {{--    @endforeach--}}

    {{--    <x-form action="">--}}
    {{--        @foreach($users as $user)--}}
    {{--            <p>{{$user->username}}</p>--}}
    {{--        @endforeach--}}
    {{--    </x-form>--}}

    <main class="h-screen w-screen">
        <div>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their
                            name, email and role.</p>
                    </div>
                    {{--                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">--}}
                    {{--                    <button type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add user</button>--}}
                    {{--                </div>--}}
                </div>
            </div>
            <div class="mt-8 flow-root overflow-hidden">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <table class="w-full text-left">
                        <thead class="bg-white">
                        <tr>
                            <th scope="col"
                                class="relative isolate py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                Name
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
                            {{--                        @dd($user->roles)--}}
                            <tr>
                                <td class="relative py-4 pr-3 text-sm font-medium text-gray-900">
                                    {{$user->username}}
                                    <div class="absolute bottom-0 right-full h-px w-screen bg-gray-100"></div>
                                    <div class="absolute bottom-0 left-0 h-px w-screen bg-gray-100"></div>
                                </td>
                                <td class=" px-3 py-4 text-sm text-gray-500 md:table-cell">{{$user->email}}</td>
                                {{--                            $user->roles()->get()->name--}}
                                <td>
                                    <x-form.checkbox :array="$roles"/>
                                </td>
                                <td class="relative py-4 pl-3 text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
