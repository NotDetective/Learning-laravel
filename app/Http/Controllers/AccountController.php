<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionUpdateOrStoreRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function show()
    {
        return view('accounts.show', [
            'roles' => Role::all(),
            'users' => User::with('roles')->get(),
        ]);
    }

    //cache niet vergeten!!


    public function edit()
    {
        return view('accounts.edit');
    }

    public function update(SessionUpdateOrStoreRequest $request)
    {
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            auth()->user()->update([
                'email' => $request->new_email,
                'password' => $request->new_password
            ]);

            return redirect('/')->with('success', 'Your account has been updated!');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }
}
