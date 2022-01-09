<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'description',
        'unit_price',
        'stock',
        'score',
        'image',
    ];
    
    
    public function category()
    {
        return $this->hasOne(Category::class, 'category_id');
    }

}
