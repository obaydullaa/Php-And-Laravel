<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class demoController extends Controller
{
    public function DemoAction(){
        $name="cookie_name";
        $value="This is my cookie.";
        $minutes=120;
        $path="/profile";
        $domain=$_SERVER['SERVER_NAME'];
        $secure=false;
        $httpOnly= true;

        return response('Hi')->cookie($name,$value,$minutes,$path,$domain,$secure,$httpOnly);
    }
}
