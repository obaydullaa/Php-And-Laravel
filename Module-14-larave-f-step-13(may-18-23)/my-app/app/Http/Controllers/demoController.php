<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class demoController extends Controller
{
    public function DemoAction(Request $request):array|null|bool|string {
        return [
            'name'=> 'Bbaydulla',
            'city'=> 'Gazipur'
        ];
        return ['A','B','C'];
        return array('A','B','C','D');
        return true;
        return false;
        return 55;
        return "Bangladesh";
        return "null";
    }

    public function DemoAction1(Request $request) {

        return redirect(to:"/hello2");
    }
    public function DemoAction2(Request $request) {

        return "Hello2";
    }
}
