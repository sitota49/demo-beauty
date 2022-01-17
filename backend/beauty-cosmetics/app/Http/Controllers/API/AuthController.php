<?php

namespace App\Http\Controllers\API;

use App\Models\Role;
use App\Models\User;
use App\Models\Customer;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:6',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'payment_method'=> 'required|string',
        ]);

        // Create new user
        $user = new User;
        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->password = bcrypt($fields['password']);
        $user->save();



    
        $customer = new Customer;
        $customer->user_id = $user->id;
        $customer->address = isset($fields['address']) ? $fields['address'] : "";
        $customer->phone_number = isset($fields['phone_number']) ? $fields['phone_number'] : "";
        $customer->payment_method = isset($fields['payment_method']) ? $fields['payment_method'] : "";
        $customer->save();

        $customerRole = Role::where('name', 'Customer')->first();
        if($customerRole) {
            $userRole = new UserRole;
            $userRole->user_id = $user->id;
            $userRole->role_id = $customerRole->role_id;
            $userRole->save();
        }
    

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' =>  $user = User::where('email', $fields['email'])->with(['userRoles.role', 'customer'])->first(),
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->with(['userRoles.role', 'customer'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad Credentials'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
