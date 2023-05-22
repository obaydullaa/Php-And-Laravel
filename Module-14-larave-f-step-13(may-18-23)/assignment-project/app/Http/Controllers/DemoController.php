<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function name(Request $request)
    {

        $name = $request->input('name');
        $userAgent = request()->header('User-Agent');
        return response()->json(
            ['message' => 'Name retrieved successfully', 
            'name' => $name,
            'userAgent' => $userAgent
            ]
        );
    }
}
