<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'document_number', 'phone', 'position'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admin_role');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'admin_permission');
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }

    public function hasPermission($permission)
    {
        return $this->permissions()->where('name', $permission)->exists();
    }

    public function assignRole($role)
    {
        return $this->roles()->syncWithoutDetaching(
            Role::where('name', $role)->firstOrFail()
        );
    }

    public function assignPermission($permission)
    {
        return $this->permissions()->syncWithoutDetaching(
            Permission::where('name', $permission)->firstOrFail()
        );
    }
}