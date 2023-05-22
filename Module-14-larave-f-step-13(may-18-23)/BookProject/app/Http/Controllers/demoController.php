<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class demoController extends Controller
{
    public function DemoAction(Request $request):bool{
        $PhotoFile=$request->file(key: 'photo');
        $PhotoFile->storeAs('upload', $PhotoFile->getClientOriginalName());
        $PhotoFile->move(public_path('upload'),$PhotoFile->getClientOriginalName());
        return true;
    }
}
