<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function UserRegistration(Request $request) {

        return User::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => $request->input('password'),
        ]);

        
    }
}
