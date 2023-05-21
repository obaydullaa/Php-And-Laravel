<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\WeatherController;
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
// });

// Route::get('hello', function () {
//     echo "Hello World";
// });

// Route::get('/books',[BookController::class,'books']);
// Route::get('/books/{id}',[BookController::class,'getBook']);
// Route::get('/books/{id}/{field}',[BookController::class,'getBookField']);

// Route::controller(BookController::class)->group(function(){
//     Route::get('/books','books');
//     Route::get('/books/{id}','getBook');
//     Route::put('/books/{id}','updateBook');
//     Route::delete('/books/{id}','deleteBook');
//     Route::get('/books/{id}/{field}','getBookField');

//     Route::post('/books', 'createBook');
//     Route::post('/header', 'getHeader');
// });

// Route::get('/books/{id}',[BookController::class,'getBook'])-> whereNumber('id');
// Route::get('/books/{id}/author',[BookController::class,'getBookAuthor']);
// Route::get('/books/{id}/title',[BookController::class,'getBookAuthor']);
// Route::get('/weather/{city?}', [WeatherController::class, 'getWeather']);

// Route::get('/hello',[App\Http\Controllers\demoController::class, 'DemoAction']);
Route::get('/hello/{name}/{age}',[App\Http\Controllers\demoController::class, 'DemoAction']);