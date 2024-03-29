<?php

use App\Http\Controllers\demoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get(uri:'/hello', [demoController::class, 'demoAction']);
// {
//     "name": "jack",
//     "age": 28
// }
// Route::get('/hello/{name}/{age}',[App\Http\Controllers\demoController::class, 'DemoAction']);

Route::post('/hello',[App\Http\Controllers\demoController::class, 'DemoAction']);
