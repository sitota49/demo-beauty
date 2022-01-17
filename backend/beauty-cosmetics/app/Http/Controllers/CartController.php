<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;


class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function index()
    {
         $carts = Cart::with(['customer.user'])->get();
    
        return view('order_management.carts.index')->with([
            'carts' => $carts
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
         $cart = Cart::where('cart_id', $id)->with([
             'orderItems',
             'customer',
             'customer.user', 
             'orderitems.product.category'
             ])->first();
        return view('order_management.carts.show')->with([
           
            'cart'=> $cart
        ]);;
    }


    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
