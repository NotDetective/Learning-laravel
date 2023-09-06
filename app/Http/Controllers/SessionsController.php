<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\SessionUpdateOrStoreRequest;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store(SessionUpdateOrStoreRequest $request)
    {
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome Back!');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

}
