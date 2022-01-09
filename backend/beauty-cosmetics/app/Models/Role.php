<?php

namespace App\Models;
use App\Models\UserRole;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_name',
   
    ];

    protected $primaryKey = 'role_id';
    
    public function userRoles()
    {
        return $this->hasMany(UserRole::class, 'role_id');
    }
}
