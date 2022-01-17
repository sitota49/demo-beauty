<?php

namespace App\Http\Controllers\API\ProductManagement;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::orderBy('created_at', 'desc')->with('category')->get());
    }

    public function show($id)
    {
        return response()->json(Product::where('product_id', $id)->with('category')->first());
    }

    public function getFeaturedProducts()
    {
        return response()->json(Product::orderBy('score', 'desc')->with('category')->limit(5)->get());
    }
    
}
