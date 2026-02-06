<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\password;

class AuthController extends Controller
{
    // Register user
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users',
            'password'=> 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
       'name' => $request->name,
       'email' => $request->email,
       'password' => Hash::make($request->password), 
        ]);

        $token=Auth::login($user);

        return response()->json([
            'message'=>'User registered successfuly',
            'user'=> $user,
            'token'=> $token,
            'type' => 'bearer',
        ], 201);
    }

    // login register
    public function login(Request $request){
        $credentials = $request->validate([
            'email'=> 'required | email',
            'password' => 'required | string',
        ]);
        if(! $token = Auth::attempt($credentials)){
            throw ValidationException::withMessages([
                'email'=> ['Invalid credentials'],
            ]);
        }
        return response()->json([
            'message'=> 'Login successful',
            'token' => $token,
            'type' => 'bearer',
        ]);
    }

    // Get authentificated user

    public function me(){
        return response()->json(Auth::user());
    }

    // logout

    public function logout(){
        Auth::logout();
        return response()->json([
            'message'=> 'Successfully Logged out',
        ]);
    }

    // refresh token
    public function refresh(){
        return response()->json([
            'token' => Auth::refresh(),
            'type' => 'bearer',
        ]);
    }
    
}

