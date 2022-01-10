<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'product_name',
        'description',
        'unit_price',
        'stock',
        'score',
        'image',
    ];

    protected $primaryKey = 'product_id';
    
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
