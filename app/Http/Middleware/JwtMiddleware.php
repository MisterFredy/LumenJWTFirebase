<?php
namespace App\Http\Middleware;
use Closure;
use Exception;
use App\Users;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
class JwtMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        $token = $request->get('token');
        
        if(!$token) {
            // token tidak ada
            return response()->json([
                'error' => 'Token not provided.'
            ], 401);
        }
        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']); //decode Hash
        } catch(ExpiredException $e) {
            return response()->json([
                'error' => 'Provided token is expired.' //token expired kadaluarsa
            ], 400);
        } catch(Exception $e) {
            return response()->json([
                'error' => 'An error while decoding token.' //error ketika decoding
            ], 400);
        }
        $user = Users::profil($credentials->sub);
        // menaruh ke class user
        $request->auth = $user; 
        return $next($request);
    }
}