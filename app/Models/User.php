<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_users');
    }

    /**
     * Checks if User has access to $permissions.
     */

    // hasAccess(): kiểm tra xem người dùng có quyền thực hiện một hành động nào đó không.
    public function hasAccess(array $permissions) : bool
    {
        foreach($this->roles as $role)
        {
            if($role->hasAccess($permissions))
            {
                return true;
            }
        }
        return false;
    }
    // inRole(): kiểm tra xem một người dùng có thuộc về một chức danh nào đó không.
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }
}
