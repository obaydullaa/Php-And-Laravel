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
=======================================================================
*/

/**
* 2 [POS] Registration
=======================================================================
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
=======================================================================
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
=======================================================================
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
=======================================================================
*/
<!-- create token Key in env file  -->
JWT_KEY=12XYSPOHBN7864wLKP

<!-- JWTToken.php and static this function  -->
public static function CreateToken($userEmail):string

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
=======================================================================
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
=======================================================================
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

/**
* 9 [POS] Verify OTP And Issue JWT Password Reset Token
=======================================================================
*/
<!-- UserController  -->
=================================
function VerifyOTP(Request $request) {
$email = $request->input('email');
$otp = $request->input('otp');
$count = User::where('email', '=', $email)
->where('otp', '=', $otp);

if($count == 1){
// Database OTP Update
User::where('email','=', $email)->update(['otp'=>'0']);


// Pass Reset Token Issue
$token = JWTToken::CreateTokenForSetPassword($request->input('email'));
return response()->json([
'status' => 'success',
'message'=> 'OTP Verification Successful',
'token'=> $token
] ,status: 200);



}else{
return response()->json([
'status' => 'Failed',
'message' > 'unauthorized'
] ,status: 200);

}

}




<!-- JWTToken.php  -->
==================================
public static function CreateTokenForSetPassword($userEmail):string {
$key = env('JWT_KEY');

$payload = [
'iss'=> 'laravel_token',
'iat'=> time(),
'exp'=> time()+60*60,
'userEmail'=> $userEmail
];
return JWT::encode($payload, $key, 'HS256');
}

<!-- web.php  -->
===================
Route::post('/verify-otp', [UserController::class,'VerifyOTP']);

<!-- check postman  check -->
{
"email": "mdobaydulla17@gmail.com",
"otp": "1432"
}

/**
* 10 [POST] Working With Token Verification Middleware And Password
*/

<!-- আমাদের অনেক জাইগায় Token verification করতে হবে । তাইম আমরা Middleware Create করে নিব। যেন বার বার ইউজ করে পারি ।  -->
<!-- php artisan make:middleware TokenVerificationMiddleware  -->
============================================================================
class TokenVerificationMiddleware
{
/**
* Handle an incoming request.
*
* @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
*/
public function handle(Request $request, Closure $next): Response
{
$token=$request->header('token');
$result=JWTToken::VerifyToken($token);
if($result == "unauthorized"){
return response()->json([
'status' => 'Failed',
'message' > 'unauthorized'
] ,status: 401);
}else {
$request->headers->set('email', $request);
return $next($request);
}
}
}


<!-- UserController  -->
function ResetPassword(Request $request) {

try {
$email =$request->header('email');
$password=$request->input('password');
User::where('email', '=', $email)->update(['password' =>$password]);
return response()->json([
'status' => 'success',
'message' => 'Request Successfully'
], status: 200);

}catch (Exception $exception){
return response()->json([
'status' => 'Fail',
'message' => 'Something Went Failed'
], status: 200);
}
}

<!-- web.php   -->
//Token Verify
Route::post('/reset-password', [UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);


/**
* 11 [POS] Completing Password Reset
*/

POST: http://127.0.0.1:8000/reset-password

body:
{
"password": "abc"
}
header:
token -> JWT-Token

/**
* 12 [POS] Front End Explain Front End Assets
================================================================
*/

views ->
-Component
-auth
-category
-dashboard
-email
-layout
-pages
-auth
-dashboard


/**
* 13 [POS] Front End User Login
================================================================
*/

login-form.blade.php->
=============================
<script>
    async function SubmitLogin() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (email.length === 0) {
            errorToast("Email is required");
        } else if (password.length === 0) {
            errorToast("Password is required");
        } else {
            showLoader();
            let res = await axios.post("/user-login", {
                email: email,
                password: password
            });
            hideLoader()

            if (res.status === 200 && res.data['status'] === 'success') {
                window.location.href = "/dashboard";
                // alert('dashboard');
            } else {
                errorToast(res.data['message']);
            }
        }
    }
</script>

/**
* 14 [POS] Front End User Registration
================================================================
*/

registration-form.blade.php->
=====================================

async function onRegistration() {

let email = document.getElementById('email').value;
let firstName = document.getElementById('firstName').value;
let lastName = document.getElementById('lastName').value;
let mobile = document.getElementById('mobile').value;
let password = document.getElementById('password').value;

if(email.length===0){
errorToast('Email is required')
}
else if(firstName.length===0){
errorToast('First Name is required')
}
else if(lastName.length===0){
errorToast('Last Name is required')
}
else if(mobile.length===0){
errorToast('Mobile is required')
}
else if(password.length===0){
errorToast('Password is required')
}
else{
showLoader();
let res=await axios.post("/user-registration",{
email:email,
firstName:firstName,
lastName:lastName,
mobile:mobile,
password:password
})
hideLoader();
if(res.status===200 && res.data['status']==='success'){
successToast(res.data['message']);
setTimeout(function (){
window.location.href='/userLogin'
},2000)
}
else{
errorToast(res.data['message'])
}
}
}
</script>


/**
* 14 15 [POS] Front End Send OTP
================================================================
*/

send-otp-form.blade.php->
=====================================

<script>
    async function VerifyEmail() {
        let email = document.getElementById('email').value;
        if (email.length === 0) {
            errorToast('Please enter your email address')
        } else {
            showLoader();
            let res = await axios.post('/send-otp', {
                email: email
            });
            hideLoader();
            // && res.data['status']==='success'
            if (res.status === 200) {
                successToast(res.data['message'])
                sessionStorage.setItem('email', email);
                setTimeout(function() {
                    window.location.href = '/verifyOtp';
                }, 1000)
            } else {
                errorToast(res.data['message'])
            }
        }
    }
</script>


/**
* 16 [POS] Front End Verify OTP
*======================================================================
*/
UserController->
---------------------
verifyOtp class->
// Pass Reset Token Issue
$token = JWTToken::CreateTokenForSetPassword($request->input('email'));
return response()->json([
'status' => 'success',
'message' => 'OTP Verification Successful'
], status: 200)->cookie('token', $token, 60*24*30); // change here



<script>
    async function VerifyOtp() {
        let otp = document.getElementById('otp').value;
        if (otp.length !== 4) {
            errorToast('Invalid OTP')
        } else {
            showLoader();
            let res = await axios.post('/verify-otp', {
                otp: otp,
                email: sessionStorage.getItem('email')
            })
            hideLoader();

            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message'])
                sessionStorage.clear();
                setTimeout(() => {
                    window.location.href = '/resetPassword'
                }, 1000);
            } else {
                errorToast(res.data['message'])
            }
        }
    }
</script>

/**
* 17 [POS] Front End Reset password
*==================================================
*/

<script>
    async function ResetPass() {
        let password = document.getElementById('password').value;
        let cpassword = document.getElementById('cpassword').value;

        if (password.length === 0) {
            errorToast('Password is required')
        } else if (cpassword.length === 0) {
            errorToast('Confirm Password is required')
        } else if (password !== cpassword) {
            errorToast('Password and Confirm Password must be same')
        } else {
            showLoader()
            let res = await axios.post("/reset-password", {
                password: password
            });
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(function() {
                    window.location.href = "/userLogin";
                }, 1000);
            } else {
                errorToast(res.data['message'])
            }
        }

    }
</script>


/***
* 18 [POS] User Logout And Take Agile Advantages
* =====================================================
*/
UserController->
------------------
function UserLogout() {
return redirect('/userLogin')->cookie('token', '', -1);
}

web.php -> 
// User Logout 
Route::get('/logout', [UserController::class, 'UserLogout']);


sidenav-layout.blade.php ->
-----------------------------------
<a href="{{url("/logout")}}" class="side-bar-item">
    <span class="side-bar-item-caption">Logout</span>
</a>


/***
* 19 [POS] Auth Restriction In Page And End Point
* ===========================================================
*/

UserController.php -> 
============================

 function UserLogin(Request $request)
    {
        $count = User::where('email', '=', $request->input('email'))
            ->where('password', '=', $request->input('password'))
            ->select('id')->first(); // call 

            if ($count == 1) {
            // User login -> jWT Token Issue 
            $token = JWTToken::CreateToken($request->input('email'), $count->id); // pass paramiter

            public static function  CreateTokenForSetPassword($userEmail):string {
        $key = env('JWT_KEY');

        $payload = [
            'iss'=> 'laravel_token',
            'iat'=> time(),
            'exp'=> time()+60*60,
            'userEmail'=> $userEmail,
            'userID'=>'0' // setup this email
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

TokenVerificationMiddleware ->
-------------------------------------
public function handle(Request $request, Closure $next): Response
    {

        $token=$request->cookie('token');
        $result=JWTToken::VerifyToken($token);
        if($result=="unauthorized"){
            return redirect('/userLogin');
        }
        else{
            $request->headers->set('email',$result->userEmail);
            $request->headers->set('id',$result->userID);
            return $next($request);
        }


    }
}

JWTToken.ph ->
----------------------
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

/***
* 20 [POS] Working With User Profile
* ===========================================================
*/

resurces-> pages->dahsboard -> profile-page.blade.php
--------------------------------------------------------------

@extends('layout.sidenav-layout')
@section('content')
    @include('components.dashboard.summary')
@endsection


resurces-> components->dahsboard -> profile-form.blade.php
----------------------------------------------------------------

copy markup from registration form and javascript
 and route 
 Route::get('/UserProfile',[UserController::class,'ProfilePage'])->middleware([TokenVerificationMiddleware::class]);

/***
* 21 [POS] Working With User Profile
* ===========================================================
*/

Route::get('/user-profile', [UserController::class,'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update', [UserController::class,'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);


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

/***
* 22 [POS] Working With User Profile
* ===========================================================
*/

profile-form.blade.php ->
---------------------------------

<script>
    getProfile();
    async function getProfile(){
        showLoader();
        let res=await axios.get("/user-profile")
        hideLoader();
        if(res.status===200 && res.data['status']==='success'){
            let data=res.data['data'];
            document.getElementById('email').value=data['email'];
            document.getElementById('firstName').value=data['firstName'];
            document.getElementById('lastName').value=data['lastName'];
            document.getElementById('mobile').value=data['mobile'];
            document.getElementById('password').value=data['password'];
        }
        else{
            errorToast(res.data['message'])
        }

    }

    async function onUpdate() {
        let firstName = document.getElementById('firstName').value;
        let lastName = document.getElementById('lastName').value;
        let mobile = document.getElementById('mobile').value;
        let password = document.getElementById('password').value;

        if(firstName.length===0){
            errorToast('First Name is required')
        }
        else if(lastName.length===0){
            errorToast('Last Name is required')
        }
        else if(mobile.length===0){
            errorToast('Mobile is required')
        }
        else if(password.length===0){
            errorToast('Password is required')
        }
        else{
            showLoader();
            let res=await axios.post("/user-update",{
                firstName:firstName,
                lastName:lastName,
                mobile:mobile,
                password:password
            })
            hideLoader();
            if(res.status===200 && res.data['status']==='success'){
                successToast(res.data['message']);
                await getProfile();
            }
            else{
                errorToast(res.data['message'])
            }
        }
    }

</script>

/***
* 23 [POS] Working With Category Back End
* ===========================================================
*/
php artisan make:migration create_categories
php artisan migrate
php artisan make:model Category 
php artisan make:controller CategoryController

create_categories ->Migrations
------------------------------------------

public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);

            $table->unsignedBigInteger('user_id');
            
            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }

    pages -> category-page.blade.php ->
    ---------------------------------
    @extends('layout.sidenav-layout')
@section('content')
    @include('components.category.category-list')
    @include('components.category.category-delete')
    @include('components.category.category-create')
    @include('components.category.category-update')
@endsection

components -> category -> all categories components : create, delete, list, update
-----------------------------------------------------------------------------------------

api create and check in post man.


/**
* 24 [POS] Test Category API In Postman
*===============================================
*/