<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'order_item_total',

    ];

    protected $primaryKey = 'role_id';


    public function cart()
    {
        return $this->hasOne(Cart::class, 'cart_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id');
    }
}
