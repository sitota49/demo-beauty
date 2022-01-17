<?php

namespace App\Http\Controllers\API\ProductManagement;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
      public function index()
    {
        return response()->json(Category::orderBy('category_name')->get());
    }

    public function products($category_id)
    {
        return response()->json(Product::where('category_id', $category_id)->orderBy('created_at')->get());
    }
}
