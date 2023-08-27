<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function CustomerPage():View{
        return view('pages.dashboard.customer-page');
    }


    function CustomerCreate(Request $request){
       $user_id = $request->header('id');
        return Customer::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'mobile'=>$request->input('mobile'),
            'user_id'=>$request->$user_id,
        ]);
    }





}
