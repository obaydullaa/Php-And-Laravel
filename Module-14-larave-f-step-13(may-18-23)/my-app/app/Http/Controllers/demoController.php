<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class demoController extends Controller
{
    public function DemoAction(Request $request){
        $name1 = $request->num1;
        $name2 = $request->num2;
        $sum = $name1 + $name2;

        // Log::info($sum);
        Log::emergency($sum);

        return $sum;
    }
}
