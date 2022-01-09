<?php

namespace App\Models;
use App\Models\UserRole;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function hasRole($role_name)
    {
        // $user_roles = UserRole::where('user_id', Auth::user()->user_id)->get();
        $user_roles = Auth::user()->user_roles;

        if(count($user_roles) > 0) {
            $has_role = false;
            foreach($user_roles as $user_role)
            {
                $role_id = $user_role->role_id;
                $role = Role::find($role_id);
                if($role != null) {
                    if($role->name == $role_name) {
                        $has_role = true;
                    }
                }
            }
            return $has_role;
        } else {
            return false;
        }
    }

    public function userRoles()
    {
        return $this->hasMany(UserRole::class, 'user_id');
    }


}
