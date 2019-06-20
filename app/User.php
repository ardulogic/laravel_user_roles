<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param string|array $roles
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasOneOfRoles($roles) ||
                abort(401, 'This action is unauthorized.');
        }

        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }

    /**
     * Check one role
     * @param string $role
     */
    public function hasOneOfRoles($roles)
    {
        foreach ($roles as $role) {
            if ($this->hasRole($role)){
                return true;
            }
        }

        return false;
    }

    /**
     * Check one role
     * @param string $role
     */
    public function hasRole($role)
    {
        $user_role =  $this->role()->first()->name;

        return $user_role === $role;
    }



    public function role() {

        // Column which stores the id of role
        // is assumed to be <lowercase class name>_id
        return $this->belongsTo(Role::class);
    }

}
