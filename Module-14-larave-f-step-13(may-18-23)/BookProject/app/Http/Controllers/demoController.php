<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class demoController extends Controller
{
    public function DemoAction(Request $request):array{
    
        return $request->input();
    }
}
Route::get('/hello',[App\Http\Controllers\demoController::class, 'DemoAction']);
