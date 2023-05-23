<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class demoController extends Controller
{
    public function DemoAction(Request $request):string
    {
        return $request->cookie('Cookie_8');
    }
}
