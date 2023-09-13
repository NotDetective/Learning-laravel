<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterUpdateOrStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(RegisterUpdateOrStoreRequest $request)
    {
        auth()->login(User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'remember_token' => Str::random(15),
        ]));

        return redirect('/')->with('success', 'Your account has been created.');
    }

    public function createAdmin()
    {
        return view('register.create-admin');
    }

    public function storeAdmin(RegisterUpdateOrStoreRequest $request)
    {


        $password = str::random(12);
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password,
        ]);

        $details = [
            'title' => 'There is a account created for you',
            'body' => 'There is a account created for you. Your password is ' . $password . ' Please login and change your password.',
        ];

        \Mail::to($request->email)->send(new \App\Mail\MyTestMail($details));

        return redirect()->route('account.show')->with('success', 'An email has been sent to ' . $request->email . ' with the password.');
    }
}
