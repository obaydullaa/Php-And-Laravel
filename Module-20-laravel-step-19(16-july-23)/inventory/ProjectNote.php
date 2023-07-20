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