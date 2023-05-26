<?php

use App\Http\Controllers\demoController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
//     // echo 'welcome';
// });
// Route::get('/hello',[App\Http\Controllers\demoController::class, 'DemoAction']);

// Route::get('/SessionPut/{email}',[App\Http\Controllers\demoController::class, 'SessionPut']);
// Route::get('/SessionPull',[App\Http\Controllers\demoController::class, 'SessionPull']);
// Route::get('/SessionGet',[App\Http\Controllers\demoController::class, 'SessionGet']);
// Route::get('/SessionForget',[App\Http\Controllers\demoController::class, 'SessionForget']);
// Route::get('/SessionFlush',[App\Http\Controllers\demoController::class, 'SessionFlush']);



Route::get('/', ([HomeController::class, 'Home']));
Route::get('/hello', function () {
    // return view('welcome');
    echo 'welcome';
});