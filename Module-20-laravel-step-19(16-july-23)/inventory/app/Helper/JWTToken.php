<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;

class JWTToken 
{
    public static function  CreateToken($userEmail):string {
        $key = env('JWT_KEY');

        $payload = [
            'iss'=> 'laravel_token',
            'iat'=> time(),
            'exp'=> time()+60*60,
            'userEmail'=> $userEmail
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

    function VerifyToken($token) {

        try {
            $key = env('JWT_KEY');
            $decode = JWT::decode($token, key($key, 'HS256'));
            return $decode->userEmail;
        }catch(Exception) {
            return 'unauthorized' ;
        }
        
    }

}