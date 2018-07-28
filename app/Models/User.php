<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Boolean;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Users Table
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
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
     * The attributes that should be cast to native types
     *
     * @var array
     */
    protected $casts = [
        'active'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Relation between Roles and Users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Check if the user has relation with a specific role
     *
     * @param $role
     *
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->roles()->where(['name' => $role])->first() ? true : false;
    }

    /**
     * Depending on the type of variable that is passed to this method, it looks for if the user has a relationship
     * with one or more roles.
     *
     * @param $roles
     *
     * @return bool
     */
    public function hasAnyRole($roles): Boolean
    {
        switch (gettype($roles)) {

            case 'array':
                foreach ($roles as $role) {
                    if ($this->hasRole($role)) {
                        return true;
                    }
                }
                break;

            case 'string':
                if ($this->hasRole($roles)) {
                    return true;
                }
                break;

            default:
                return false;
        }
    }

    /**
     * Password encryption on create/update the User
     *
     * @param null $password
     */
    public function setPasswordAttribute($password = null)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
