<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{
    public function DemoAction()
    {
        // retriving all Rows
        // $results =  DB::table('products')->get();
        // return $results;

        // retriving Single Rows
        // $results =  DB::table('brands')->find(id:40);
        // return $results;

        // retriving specific colum data
        $results =  DB::table('brands')->pluck('brandImg', 'brandName');
        return $results;
    }
}
