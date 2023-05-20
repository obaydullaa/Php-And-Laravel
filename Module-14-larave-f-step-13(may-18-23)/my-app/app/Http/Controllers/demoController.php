<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class demoController extends Controller
{
    public function DemoAction():string{
        return "This is my first request-response";
    }
}
