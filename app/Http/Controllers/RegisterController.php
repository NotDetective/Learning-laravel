<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterUpdateOrStoreRequest;
use Illuminate\Routing\Controller;

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
        ]));

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
