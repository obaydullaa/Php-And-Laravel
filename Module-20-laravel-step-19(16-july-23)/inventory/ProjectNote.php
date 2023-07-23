Phase 01 
======================
Developing User Auth Back-End Features
1. User registration (end point)
2. User login & JWT token (end point)
3. Sending OTP Code to Email -Password Recover Stage 01 (end point)
4. Verify OTP Code - Password Recover Stage 02 (end point)
5. Allow user to reset password - Password Recover Stage 03 (end point)
6. Allow user to get profile details (end point)
7. Allow user ot update profile details (end point)

<!-- Use All package  -->
1. PHP-JWT package install


<!-- Use All Command  -->

/**
* 1 [POS] Introduction
*/

/**
* 2 [POS] Registration
*/

/**
* Run the migrations.
*/
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName', length: 50);
            $table->string('lastName', length: 50);
            $table->string('email', length: 50)->unique();
            $table->string('mobile', length: 50);
            $table->string('password', length: 50);
            $table->string('otp', length: 50);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }

    <!-- User Model  -->
    class User extends Model
{
    protected $fillable = ['firstName', 'lastName', 'email', 'mobile', 'password', 'otp'];
    protected $attributes = [
        'otp' => '0'
    ];
}

class UserController extends Controller
{
    function UserRegistration(Request $request) {

        return User::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => $request->input('password'),
        ]);

        
    }
}

Route::post('/user-registration', [UserController::class,'UserRegistration']);

// Off in kernel.php 
// \App\Http\Middleware\VerifyCsrfToken::class, 


/**
* 3 [POS] Registration
*/


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
}


/**
* 4 [POS] JWT For Authentication
*/

create folder App->Helper->JWTToken.php

PHP-JWT package install
.env ( create key )

JWT_KEY=12XYSPOHBN7864wLKP


namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;

class JWTToken 
{
    function CreateToken($userEmail):string {
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

/**
* 5 [POS] User Login And Issue JWT Token
*/
<!-- create token Key in env file  -->
JWT_KEY=12XYSPOHBN7864wLKP

<!-- JWTToken.php and static this function  -->
public static function  CreateToken($userEmail):string 

<!-- UserController -->
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

/**
* 6 [POS] Working With OTP Email
*/
<!-- Install Otp mail package  -->
php artisan make:mail OTPMail

create folder in view email -> OTPMail.blade.php

<!-- OTPMail.PHP  -->
============================

<!-- * Create a new message instance. -->

public $otp;
public function __construct($otp)
{
    $this->otp=$otp;
}

.env file ->

MAIL_MAILER=smtp
MAIL_HOST=mail.teamrabbil.com
MAIL_PORT=25
MAIL_USERNAME=info@teamrabbil.com
MAIL_PASSWORD=~sR4[bhaC[Qs
MAIL_ENCRYPTION=tls

MAIL_FROM_ADDRESS="info@teamrabbil.com"
MAIL_FROM_NAME="Pos Application"

UserController ->
====================
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
/**
* 8 [POS] Working With OTP Email
*/

function sedOTPCode(Request $request) {
        $email = $request->input('email');
        $otp=rand(1000,9999);
        $count=User::where('email','=', $email)->count();

        if($count == 1) {
            // WORK HERE
            // OTP Email Address
        Mail::to($email)->send(new OTPMail($otp));
            // OTP Code Table Update
            User::where('email','=', $email)->update(['otp'=>$otp]);
            return response()->json([
                'status' => 'Success',
                'message' > '4 Digit OTP Code Has Been Send To Your Email.'
            ] ,status: 200);


        }else {
            return response()->json([
                'status' => 'Failed',
                'message' > 'unauthorized'
            ] ,status: 200);
        }


    }

<!-- web.php  -->
====================
crete route Route::post('/send-otp', [UserController::class,'sedOTPCode']);

*And Test Postman

set .env file ->

MAIL_FROM_ADDRESS="info@teamrabbil.com"
MAIL_FROM_NAME="Pos Application"