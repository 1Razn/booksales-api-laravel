<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    // Coba generate token menggunakan JWTAuth
    if (!$token = JWTAuth::attempt($credentials)) {
      return response()->json([
        'success' => false,
        'message' => 'Email atau password salah',
      ], 401);
    }

    $user = auth()->user();

    return response()->json([
      'success' => true,
      'message' => 'Login berhasil',
      'data' => [
        'user' => $user,
        'token' => $token,
        'token_type' => 'bearer',
        'expires_in' => JWTAuth::factory()->getTTL() * 60,
      ],
    ], 200);
  }

  public function logout()
  {
    auth()->logout();

    return response()->json([
      'success' => true,
      'message' => 'Logout berhasil',
    ], 200);
  }
}
