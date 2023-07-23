<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\User;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function UserRegistration(Request $request) {

       try{
        User::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => $request->input('password'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User Registration Successfully'
        ], status: 200);

       }catch (Exception $err){
            return response()->json([
                'status' => 'Failed',
                'message' => 'User Registration Failed'
            ], status: 200);
       }
        
    }

    function UserLogin (Request $request) {
        $count = User::where('email', '=', $request->input('email'))
        ->where('password', '=', $request->input('password'))
        ->count();

        if($count ==1 ) {
            // User login -> jWT Token Issue 
            $token = JWTToken::CreateToken($request->input('email'));
            return response()->json([
                'status' => 'success',
                'message'=> 'User Login Successful',
                'token'=> $token
            ] ,status: 200);

        }else {
            return response()->json([
                'status' => 'failed',
                'message' > 'unauthorized'
            ] ,status: 200);

        }
    }

    function sedOTPCode(Request $request) {
        $email = $request->input('email');
        $otp=rand(1000,9999);
        $count=User::where('email','=', $email)->count();

        if($count == 1) {
            // OTP 
            // OTO Code Table Insert

        }else {
            return response()->json([
                'status' => 'failed',
                'message' > 'unauthorized'
            ] ,status: 200);
        }


    }

}
