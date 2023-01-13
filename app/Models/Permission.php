<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $guarded = [];
    // Get users by permission
    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
    // Get roles by permission
    public function roles() {
        return $this->belongsToMany('App\Models\Role');
    }
}
