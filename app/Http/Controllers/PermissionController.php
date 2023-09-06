<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionUpdateOrStoreRequest;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function create()
    {
        return view('permissions.create');
    }
    public function store(PermissionUpdateOrStoreRequest $request)
    {
        Permission::create([
            'name' => $request->name,
            'system_name' => $request->object . '_' . $request->action,
            'object' => $request->object,
            'action' => $request->action,
        ]);
        return redirect('/');
    }
}
