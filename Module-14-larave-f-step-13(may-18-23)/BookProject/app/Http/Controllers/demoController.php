<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class demoController extends Controller
{
    public function DemoAction(Request $request):array{
        $pin = $request->header(key: 'pin');
        $city = $request->input(key: 'city');
        $postcode = $request->input(key: 'postcode');

        $name = $request->name;
        $age = $request->age;

        return array(
            "pin"=> $pin,
            "city"=> $city,
            "postcode"=> $postcode,
            "name"=> $name,
            "age"=> $age,
        );
    }
}
