<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class demoController extends Controller
{
    public function DemoAction(){

        return response('Hi From Header.')->header('key1', 'value1');
    }
}
