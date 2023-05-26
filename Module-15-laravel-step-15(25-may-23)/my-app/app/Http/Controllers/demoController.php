<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class demoController extends Controller
{
    public function SessionPut(Request $request):bool{
        $email = $request->email;
        $request->session()->put('userEmail', $email);
        return true;
        // $request->session()->pull();
        // $request->session()->forget();
        // $request->session()->flush();
    }
    public function SessionPull(Request $request):string{
        return $request->session()->pull('userEmail', default:"Default");
    }
    public function SessionGet(Request $request):string{
        return $request->session()->get('userEmail', default:"Default");
    }

    public function SessionForget(Request $request):bool{
         $request->session()->forget('userEmail');
         return true;
    }
    public function SessionFlush(Request $request):bool{
         $request->session()->flush();
         return true;
    }
}
