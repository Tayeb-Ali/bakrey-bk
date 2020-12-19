<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'mobile' => 'required|max:15',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);
        $token = Str::random(60);
        $validatedData['api_token'] = $token;


        $user = User::create($validatedData);

        // $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'api_token' => $token, 'status' => true]);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'mobile' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials', 'status' => false]);
        }

        $token = Str::random(60);
        auth()->user()->update(['api_token' => $token]);
        return response(['user' => auth()->user(), 'api_token' => $token, 'status' => true]);

    }
}
