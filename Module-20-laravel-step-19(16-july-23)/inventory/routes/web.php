<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/user-registration', [UserController::class,'UserRegistration']);
Route::post('/user-login', [UserController::class,'UserLogin']);
Route::post('/send-otp', [UserController::class,'sedOTPCode']);
Route::post('/verify-otp', [UserController::class,'VerifyOTP']);

//Token Verify
Route::post('/reset-password', [UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);

