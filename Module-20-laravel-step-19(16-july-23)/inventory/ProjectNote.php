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