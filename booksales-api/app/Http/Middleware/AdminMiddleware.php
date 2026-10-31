<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
  public function handle(Request $request, Closure $next): Response
  {
    //Cek apakah user terautentikasi via guard 'api' (JWT)
    if (!auth('api')->check()) {
      return response()->json([
        'success' => false,
        'message' => 'Anda harus login terlebih dahulu.'
      ], 401);
    }

    //Ambil user yang sedang login
    $user = auth('api')->user();

    //Cek apakah role user adalah 'admin'
    if (strtolower($user->role) !== 'admin') {
      return response()->json([
        'success' => false,
        'message' => 'Akses ditolak. Hanya Admin yang boleh melakukan ini.'
      ], 403); //Status 403 artinya Forbidden (Ditolak)
    }

    //Jika lolos, lanjutkan request
    return $next($request);
  }
}
