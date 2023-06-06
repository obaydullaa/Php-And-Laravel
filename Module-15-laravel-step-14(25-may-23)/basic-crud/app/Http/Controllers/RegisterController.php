<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        // The request has passed validation rules. You can proceed with registration logic.
        // Access the validated form input using $request->validated().

        // Example: Creating a new user
        $user = User::create([
            'name' => $request->validated()['name'],
            'email' => $request->validated()['email'],
            'password' => bcrypt($request->validated()['password']),
        ]);

        // Additional logic...

        return response()->json(['message' => 'Registration successful'], 200);
    }
}
