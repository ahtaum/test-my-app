<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class CustomAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            // Melakukan validasi token
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        // Melanjutkan ke middleware berikutnya
        return $next($request);
    }
}