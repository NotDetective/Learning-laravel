<?php
function getUserPermissions()
{
    return Cache::rememberForever(auth()->user()->id, function () {
        return auth()->user()->roles()->with('permissions')->get()->pluck('permissions')->flatten()->pluck('system_name')->toArray();
    });
}

function hasPermission($permission)
{
    return in_array($permission, getUserPermissions());
}

