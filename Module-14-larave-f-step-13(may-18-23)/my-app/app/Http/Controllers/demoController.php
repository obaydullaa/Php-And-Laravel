<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class demoController extends Controller
{
    public function DemoAction(Request $request):string{
        $name=$request->name;
        $age=$request->age;

        return "My name is={$name} and My age is = {$age}";
    }
}
