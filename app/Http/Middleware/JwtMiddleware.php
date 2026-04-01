<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class JwtMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException){
                return response()->json(['status' => 'Token tidak valid'], 401);
            } else if ($e instanceof TokenExpiredException){
                return response()->json(['status' => 'Token sudah kadaluarsa'], 401);
            } else {
                return response()->json(['status' => 'Token tidak ditemukan (Unauthorized)'], 401);
            }
        }
        return $next($request);
    }
}