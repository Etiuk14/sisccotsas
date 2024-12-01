<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description'];

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'module_permission');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission');
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_permission');
    }
}