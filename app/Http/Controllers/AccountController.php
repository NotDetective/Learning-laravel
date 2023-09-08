<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionUpdateOrStoreRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function show()
    {
        return view('accounts.show');
    }

    public function addRole(User $user, Request $request)
    {
//        dd($request->all());
        $user->roles()->sync($request->permissions);
        cache()->forget(auth()->user()->id);
        return back()->with('success', 'Role has been added!');

    }

    public function editAdmin(User $user)
    {
        return view('accounts.edit-admin', [
            'user' => $user,
        ]);
    }

    public function updateAdmin(User $user, Request $request)
    {
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        return redirect()->route('account.show')->with('success', 'User has been updated!');
    }

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
