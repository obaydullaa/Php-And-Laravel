<?php

use App\Http\Controllers\demoController;
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
    // echo 'welcome';
});
// Route::get('/hello',[App\Http\Controllers\demoController::class, 'DemoAction']);

Route::get('/FileBinary',[App\Http\Controllers\demoController::class, 'FileBinary']);
Route::get('/FileDwonload',[App\Http\Controllers\demoController::class, 'FileDwonload']);
