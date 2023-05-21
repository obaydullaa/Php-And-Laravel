<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class demoController extends Controller
{
    public function DemoAction(Request $request):string{
        $name = $request->header(key: 'name');
        $age = $request->header(key: 'age');
    
        return "My name is ${name} and i am ${age} year old. ";
    }
}
