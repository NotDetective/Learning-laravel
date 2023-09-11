<?php
function getUserPermissions()
{
    if (auth()->check()) {
        return Cache::rememberForever(auth()->user()->id, function () {
            return auth()->user()->roles()->with('permissions')->get()->pluck('permissions')->flatten()->pluck('system_name')->toArray();
        });
    }
    abort(403, 'You do not have the right permissions.');
}

function hasPermission($permission)
{
    return in_array($permission, getUserPermissions());
}

function getProfile()
{
    return Cache::rememberForever(auth()->user()->id . 'Profile', function () {
        return auth()->user()->getFirstMediaUrl('profile');
    });
}
