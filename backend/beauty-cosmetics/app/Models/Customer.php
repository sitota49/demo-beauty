<?php

namespace App\Models;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'phone_number',
        'payment_method'
    ];

    protected $primaryKey = 'customer_id';
    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'customer_id');
    }
    


}
