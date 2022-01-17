<?php

namespace App\Http\Controllers\API\CustomerCartManagement;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Customer;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index(){
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();
        return response()->json($customer->activeCart(), 200);
    }
     public function createNewCart()
    {
        $cart = new Cart;
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();
        $cart->customer_id = $customer->customer_id;
        $cart->status = 'pending';
        $cart->cart_total = 0;
        $cart->save();
        return response()->json($cart, 201);
    }

    public function addItemToCart(Request $request){

        
        $fields = $request->validate([
            'product' => 'required',
            'quantity' => 'required|integer',
         
        ]);

        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();
        $cart= $customer->activeCart();
        $product = Product::where('product_id', $fields['product'])->first();
        $orderItem = new OrderItem;
        $orderItem->cart_id = $cart->cart_id;
        $orderItem->product_id = $product->product_id;
        if($fields['quantity'] > $product->stock){
             return response()->json([
            'message' => 'Sorry we don\'t have that much in stock, please try again later.',  
        ], 400);
        }
        $orderItem->quantity = $fields['quantity'];
        $orderItem->order_item_total = $product->unit_price * $orderItem->quantity;
        $orderItem ->save();
        $product->score = $product->score +  1 ;
        $product->save();
        return response()->json([
            'message' => 'Item added to cart successfully.',
            'product'=> $product,
            'orderItem' => $orderItem
        ], 201);
    }

      public function updateItemInCart(Request $request){

        
        $fields = $request->validate([
            'item' => 'required',
            'quantity' => 'required|integer',
         
        ]);

        $orderItem = OrderItem::where('order_item_id', $fields['item'])->first();
        $product = Product::where('product_id', $orderItem->product_id)->first();
         if($fields['quantity'] > $product->stock){
             return response()->json([
            'message' => 'Sorry we don\'t have that much in stock, please try again later.',  
        ], 400);
        }
        $orderItem->quantity = $fields['quantity'];
        $orderItem->order_item_total = $product->unit_price * $orderItem->quantity;
        $orderItem ->save();

        return response()->json([
            'message' => 'Item updated successfully.',
            'product'=> $product,
            'orderItem' => $orderItem
        ], 204);
    
    }

    public function removeItemFromCart(Request $request){
        $fields = $request->validate([
            'item' => 'required',
         
        ]);

        $orderItem = OrderItem::where('order_item_id', $fields['item'])->first();
        $orderItem->delete();

        return response()->json([
            'message' => 'Item removed successfully.',
           
        ], 200);
    }

    public function emptyCart(){
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();
        $cart= $customer->activeCart();
        foreach ($cart->orderItems as $key => $item) {
             $orderItem = OrderItem::where('order_item_id', $item->order_item_id)->first();
             $orderItem->delete();
        }
        
        return response()->json([
            'message' => 'Cart emptied successfully.',
           
        ], 200);
    }

    public function processCart(){
        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();
        $cart= $customer->activeCart();
        $transaction = new Transaction();
        $transaction->cart_id = $cart->cart_id;
        $transaction->transaction_date = now()->isoFormat('Y-M-D HH:mm:ss');

        foreach ($cart->orderItems as $key => $item) {
            $orderItem = OrderItem::where('order_item_id', $item->order_item_id)->first();
            $product = Product::where('product_id', $orderItem->product_id)->first();
            $cart-> cart_total = $cart->cart_total +  $orderItem->order_item_total ;
            $product-> stock = $product->stock - $orderItem->quantity;
            $product->save();
        }
        
        $cart->save();
        $transaction->save();

        return response()->json([
            'message' => 'Cart processed successfully.',
           
        ], 200);

    }

    

}
