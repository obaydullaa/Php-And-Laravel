<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function name(Request $request)
    {

        $name = $request->input('name');
        $userAgent = request()->header('User-Agent');
        $page = request()->query('page', null);
        $cityName = request()->input('city');
        $age = request()->input('age');
        $rememberToken = request()->cookie('remember_token', null);

        // Handle file upload
        $uploadedFile = request()->file('avatar');
        if ($uploadedFile) {
            $path = $uploadedFile->store('public/uploads');
        }

        return response()->json(
            [
                'message' => 'Name retrieved successfully', 
                'name' => $name,
                'userAgent' => $userAgent,
                'page' => $page,
                'cityName' => $cityName,
                'age' => $age,
                'rememberToken' => $rememberToken,
            ]
        );
    }
}
