<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 1. Setup validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8'
        ]);

        // 2. Cek validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 3. Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // 4. Cek Keberhasilan
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $user
            ], 201);
        }

        // 5. Cek Gagal
        return response()->json([
            'success' => false,
            'message' => 'User creation failed'
        ], 409); // conflict
    }

    public function login(Request $request) {
        // 1. Setup Validator
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password'=> 'required'
            ]);

        // 2. Cek Validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 3. Get Kredensial dari request
        $credentials = $request->only('email','password');

        // 4.Cek isfailed
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success'=> false,
                'message'=> 'Email atau Password Anda salah!'
                ],401);
            }

        // 5. Cek isSuccess
        return response()->json([
            'success'=> true,
            'massage' => 'Login Succesfuly',
            'user' => auth()->guard('api')->user(),
            'token'=> $token,
            ], 200);
    }

    public function logout(Request $request) {
        // try
        // 1. invalidate token
        // 2. 2. cek isSuccess

        //catch
        //1. cek isFailed

        try {
            JWTAuth::invalidate()->json([
                'success'=> true,
                'message' => 'Logout succesfully'
                ],200);
                
        } catch (JWTException $e) {
            return response()->json([
                'success'=> false,
                'message'=> 'Logout failed!'
            ], 500);


        }

    }
}
