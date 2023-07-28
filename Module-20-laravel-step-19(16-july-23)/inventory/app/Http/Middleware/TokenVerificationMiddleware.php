<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token=$request->header('token');
        // $result=JWTToken::VerifyToken($token);
        $result=JWTToken::VerifyToken($token);
        if($result == "unauthorized"){
            return response()->json([
                'status' => 'Failed',
                'message' > 'unauthorized'
            ] ,status: 401);
        }else {
            // $request->headers->set('email', $request);
            $request->headers->set( 'email', $result->userEmail);
            return $next($request);
        }
    }
}
