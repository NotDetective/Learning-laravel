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

    public function edit(User $user)
    {
        return view('accounts.edit', [
            'user' => $user,
            'profile' => $user->getFirstMediaUrl('profile'),
        ]);
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

    public function updateUsername(Request $request)
    {
        $attributes = request()->validate([
            'password' => 'required',
            'new_username' => ['required', 'max:255'],
        ]);
        if (auth()->attempt([
            'email' => auth()->user()->email,
            'password' => $request->password,
        ])) {
            auth()->user()->update([
                'username' => $request->new_username,
            ]);

            return redirect()->route('account.edit', auth()->user()->id)->with('success', 'Your username has been updated!');
        }

        return back()
            ->withInput()
            ->withErrors(['username' => 'Your provided credentials could not be verified.']);
    }

    public function updateEmail(Request $request)
    {
        $attributes = request()->validate([
            'password' => 'required',
            'new_email' => ['required', 'max:255', 'different:email', 'unique:users,email'],
        ]);

        if (auth()->attempt([
            'email' => auth()->user()->email,
            'password' => $request->password
        ])) {
            auth()->user()->update([
                'email' => $request->new_email
            ]);

            return redirect()->route('account.edit', auth()->user()->id)->with('success', 'Your email has been updated!');
        }

        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }


    public function updatePassword(Request $request)
    {
        $attributes = request()->validate([
            'password' => 'required',
            'new_password' => ['required', 'min:7', 'max:255', 'different:password'],
        ]);

        if (auth()->attempt([
            'email' => auth()->user()->email,
            'password' => $request->password
        ])) {
            auth()->user()->update([
                'password' => $request->new_password
            ]);

            return redirect()->route('account.edit', auth()->user()->id)->with('success', 'Your password has been updated!');
        }

        return back()
            ->withInput()
            ->withErrors(['password' => 'Your provided credentials could not be verified.']);
    }

    public function updateProfile(Request $request)
    {
        if ($request->hasFile('image')){
            auth()->user()->addMediaFromRequest('image')->toMediaCollection('profile');
            Cache::forget(auth()->user()->id . 'Profile');
            return redirect()->route('account.edit', auth()->user()->id)->with('success', 'Your profile has been updated!');
        }
        return redirect()
            ->route('account.edit', auth()->user()->id)
            ->withInput()
            ->withErrors(['image' => 'Your provided credentials could not be verified.']);
    }

    public function destroy(User $user)
    {
        auth()->logout();
        $user->delete();
        return redirect('/')->with('success', 'Account has been deleted, Goodbye!');
    }

}
