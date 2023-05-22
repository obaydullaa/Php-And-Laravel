<?php
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/name',[App\Http\Controllers\DemoController::class, 'name']);

Route::post('/submit', function (Request $request):string {
    $email = $request->input('email');

    // Store the email or perform any desired operations
    $response = [
        'success' => true,
        'message' => 'Form submitted successfully.'
    ];

    return response()->json($response);
});