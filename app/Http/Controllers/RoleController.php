<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleUpdateOrStoreRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function show()
    {
        return view('roles.show', [
            'roles' => Role::all(),
        ]);
    }

    public function create()
    {
        return view('roles.create', [
            'permissions' => Permission::all(),
        ]);
    }

    public function store(RoleUpdateOrStoreRequest $request)
    {

        $role = Role::create([
            'name' => $request->name,
        ]);

        $role->permissions()->sync($request->permissions ?? []);
        return redirect('/');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', [
            'role' => $role,
            'selectedPermissions' => $role->permissions->pluck('id')->toArray(),
            'permissions' => Permission::all(),
        ]);
    }

    public function update(RoleUpdateOrStoreRequest $request, Role $role)
    {
        cache()->forget(auth()->user()->id);
        $role->update([
            'name' => $request->name,
        ]);
        $role->permissions()->sync($request->permissions ?? []);
        return redirect('/');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect('/')->with('success', 'Role deleted!');
    }

}
