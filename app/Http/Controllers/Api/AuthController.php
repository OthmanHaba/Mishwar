<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        User::create([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'type' => $data['type'],
            'status' => 'pending',
        ]);
        //send otp to user phone number

        return response()->api('User registered successfully');
    }

    public function login(LoginRequest $req)
    {
        $user = $req->authinticate();
        if (!$user) {
            return response()->api('Invalid OTP', 401);
        }

        return response()->api(data: [
            'token' => $user->createToken('auth-tokent')->plainTextToken,
            'user' => $user,
        ]);
    }
}
