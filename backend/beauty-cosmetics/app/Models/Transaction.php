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

    protected $primaryKey = 'transaction_id';
    

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}
