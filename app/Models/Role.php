<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];
    // Get users by role
    public function users() {
        return $this->belongsToMany('App\Models\User');
    }
    // Get permissions by role
    public function permissions() {
        return $this->belongsToMany('App\Models\Permission');
    }
}
