<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

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
    public static function  CreateTokenForSetPassword($userEmail):string {
        $key = env('JWT_KEY');

        $payload = [
            'iss'=> 'laravel_token',
            'iat'=> time(),
            'exp'=> time()+60*60,
            'userEmail'=> $userEmail
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

    //  public static function VerifyToken($token):string
    //  {

    //     try {
    //         $key = env('JWT_KEY');
    //         $decode=JWT::decode($token,new Key($key, 'HS256'));
    //         return $decode->userEmail;
    //     }catch(Exception $e) {
    //         return 'unauthorized' ;
    //     }
        
    // }
    public static function VerifyToken($token):string|object
    {
        try {
            if($token==null){
                return 'unauthorized';
            }
            else{
                $key =env('JWT_KEY');
                $decode=JWT::decode($token,new Key($key,'HS256'));
                return $decode;
            }
        }
        catch (Exception $e){
            return 'unauthorized';
        }
    }



}