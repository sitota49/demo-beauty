<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

     protected $fillable = [
        'transaction_date'
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class, 'cart_id');
    }
}
