<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class demoController extends Controller
{
    public function DemoAction(Request $request):int{

       if($request->accepts(['application/json'])){
        return 1;
       }else {
        return 0;
       }
    }
}
