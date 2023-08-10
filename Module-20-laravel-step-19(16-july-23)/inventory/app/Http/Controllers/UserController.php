<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    // Pages 
    function LoginPage(): View
    {
        return view('pages.auth.login-page');
    }

    function RegistrationPage(): ViewView
    {
        return view('pages.auth.registration-page');
    }
    function SendOtpPage(): View
    {
        return view('pages.auth.send-otp-page');
    }
    function VerifyOTPPage(): View
    {
        return view('pages.auth.verify-otp-page');
    }

    function ResetPasswordPage(): View
    {
        return view('pages.auth.reset-pass-page');
    }

    function ProfilePage(): View
    {
        return view('pages.dashboard.profile-page');
    }

    //  Api 
    function UserRegistration(Request $request)
    {

        try {
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
        } catch (Exception $err) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'User Registration Failed'
            ], status: 200);
        }
    }

    function UserLogin(Request $request)
    {
        $count = User::where('email', '=', $request->input('email'))
            ->where('password', '=', $request->input('password'))
            ->select('id')->first();
            
            if ($count !==null) {
            // User login -> jWT Token Issue 
            $token = JWTToken::CreateToken($request->input('email'), $count->id);
            return response()->json([
                'status' => 'success',
                'message' => 'User Login Successful',
                'token' => $token
            ], status: 200)->cookie('token', $token, 60 * 24 * 30);
        } else {
            return response()->json([
                'status' => '+',
                'message' > 'unauthorized'
            ], status: 200);
        }
    }

    function sedOTPCode(Request $request)
    {
        $email = $request->input('email');
        $otp = rand(1000, 9999);
        $count = User::where('email', '=', $email)->count();

        if ($count == 1) {
            // OTP Email Address
            Mail::to($email)->send(new OTPMail($otp));
            // OTP Code Table Update
            User::where('email', '=', $email)->update(['otp' => $otp]);

            return response()->json([
                'status' => 'Success',
                'message' => '4 Digit OTP Code Has Been Send To Your Email.'
            ], status: 200);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' > 'unauthorized'
            ], status: 200);
        }
    }

    function VerifyOTP(Request $request)
    {
        $email = $request->input('email');
        $otp = $request->input('otp');
        $count = User::where('email', '=', $email)
            ->where('otp', '=', $otp)->count();

        if ($count == 1) {
            // Database OTP Update
            User::where('email', '=', $email)->update(['otp' => '0']);


            // Pass Reset Token Issue
            $token = JWTToken::CreateTokenForSetPassword($request->input('email'));
            return response()->json([
                'status' => 'success',
                'message' => 'OTP Verification Successful'
            ], status: 200)->cookie('token', $token, 60*24*30);
        } else {
            return response()->json([
                'status' => 'Failed',
                'message' > 'unauthorized'
            ], status: 200);
        }
    }

    function ResetPassword(Request $request)
    {

        try {
            $email = $request->header('email');
            $password = $request->input('password');
            $user = User::where('email', '=', $email)->update(['password' => $password]);
            if($user) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Request Successfully'
    
                ], status: 200);
            } 
            return response()->json([
                'status' => 'Failed',
                'message' => 'Password not updated',
                'email' => $email,
                'pass' => $password

            ], status: 200);
            
        } catch (Exception $exception) {
            return response()->json([
                'status' => 'Fail',
                'message' => 'Something Went Failed'
            ], status: 200);
        }
    }

    function UserLogout() {
        return redirect('/userLogin')->cookie('token', '', -1);
    }

    function UserProfile(Request $request) {
        $email = $request->header('email');
        $user=User::where('email', '=', $email)->first();
        return response()->json([
            'status' => 'success',
            'message' > 'Request Successful',
            'data' => $user
        ], status: 200);
        
    }

    function UpdateProfile(Request $request){
        try{
            $email=$request->header('email');
            $firstName=$request->input('firstName');
            $lastName=$request->input('lastName');
            $mobile=$request->input('mobile');
            $password=$request->input('password');
            User::where('email','=',$email)->update([
                'firstName'=>$firstName,
                'lastName'=>$lastName,
                'mobile'=>$mobile,
                'password'=>$password
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Successful',
            ],200);

        }catch (Exception $exception){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ],200);
        }
    }




    

}
