<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use App\Models\Permission;

class PermissionHelper
{
    public static function can($menuKey)
    {
        if (!Auth::check()) return false;

        $groupId = Auth::user()->group_id;

        return Permission::where('group_id', $groupId)
            ->where('group_parent_id', $menuKey)
            ->where('active', 1)
            ->exists();
    }
}