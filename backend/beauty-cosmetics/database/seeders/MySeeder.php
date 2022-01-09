<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
class MySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdministratorRole = new Role;
        $superAdministratorRole->name = 'Super Administrator';
        $superAdministratorRole->save();

        $customerRole = new Role;
        $customerRole->name = 'Customer';
        $customerRole->save();
     
        $superAdministratorUser = new User;
        $superAdministratorUser->name = 'Super Administrator';
        $superAdministratorUser->email = 'superadmin@gmail.com';
        $superAdministratorUser->password = Hash::make('superadmin');
        $superAdministratorUser->save();

      
        $superAdministratorRole = Role::where('name', 'Super Administrator')->first();

        $superAdministratorUserRole = new UserRole;
        $superAdministratorUserRole->user_id = $superAdministratorUser->id;
        $superAdministratorUserRole->role_id = $superAdministratorRole->role_id;
        $superAdministratorUserRole->save();

        $customerUser = new User;
        $customerUser->name = 'Customer';
        $customerUser->email = 'customer@gmail.com';
        $customerUser->password = Hash::make('12345678');
        $customerUser->save();

        $customerRole = Role::where('name', 'Customer')->first();

        $customerUserRole = new UserRole;
        $customerUserRole->user_id = $customerUser->id;
        $customerUserRole->role_id = $customerRole->role_id;
        $customerUserRole->save();

        $customer = new Customer;
        $customer->user_id = $customerUser->id;
        $customer->address = 'Addis Ababa';
        $customer->phone_number = '+251911111111';
        $customer->payment_method = 'Cash';
        $customer->save();

        $categoryOne = new Category;
        $categoryOne->category_name = 'Facial';
        $categoryOne->description = 'Prodcuts for the face';
        $categoryOne->save();

        $categoryTwo = new Category;
        $categoryTwo->category_name = 'Nail Polish';
        $categoryTwo->description = 'Colors for your nails';
        $categoryTwo->save();

        $productOne = new Product;
        $productOne->category_id = $categoryOne->id;
        $productOne->product_name = "Cleanser";
        $productOne->description = "For dry skin";
        $productOne->unit_price =79.0;
        $productOne->stock = 138;
        $productOne->score =0;
        $productOne->save();

        $productTwo = new Product;
        $productTwo->category_id = $categoryTwo->id;
        $productTwo->product_name = "Matt Brown";
        $productTwo->description = "Suttle shade of brown";
        $productTwo->unit_price =19.0;
        $productTwo->stock = 38;
        $productTwo->score =0;
        $productTwo->save();

        // $cart = new Cart;
        // $cart->customer_id = $customer->id;
        // $cart->status = 'pending';
        // $cart->cart_total=0;
        
        // $orderItem1 = new OrderItem;
        // $orderItem1->cart_id = $cart->id;
        // $orderItem1->product_id = $productOne->id;
        // $orderItem1->quantity = 2;
        // $orderItem1->order_item_total = $productOne->unit_price * $orderItem1->quantity;
        // $orderItem1 ->save();
        // $productOne->score = $productOne->score +  1 ;
        // $productOne->save();
       

        // $orderItem2 = new OrderItem;
        // $orderItem2->cart_id = $cart->id;
        // $orderItem2->product_id = $productTwo->id;
        // $orderItem2->quantity = 3;
        // $orderItem2->order_item_total = $productTwo->unit_price * $orderItem2->quantity;
        // $orderItem2 ->save();
        // $productTwo->score = $productTwo->score +1 ;
        // $productTwo->save();

        // $cart-> cart_total = $cart->cart_total +  $orderItem1->order_item_total ;
        // $cart-> cart_total = $cart->cart_total +  $orderItem2->order_item_total ;
        // $cart->save();

        // $transaction = new Transaction();
        // $transaction->cart_id = $cart->id;
        // $transaction->transaction_date =  $transaction->created_at;





    }
}
