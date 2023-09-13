<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\http\Requests\SessionUpdateOrStoreRequest;
use Illuminate\Support\Str;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store(SessionUpdateOrStoreRequest $request)
    {
        cache()->flush();
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            if (auth()->user()->getRememberToken() == null) {
                session(['new_user' => true]);
                return redirect()->route('sessions.edit-new-user');
            }
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

    public function editNewUserPassword()
    {
        return view('sessions.add-new-password');

    }

    public function storeNewUserPassword(Request $request)
    {
        $attributes = request()->validate([
            'password' => ['required', 'min:7', 'max:255'],
        ]);

        auth()->user()->update([
            'password' => $request->password,
            'remember_token' => str::random(15),
        ]);

        return redirect('/')->with('success', 'Your password has been updated!');

    }

}
