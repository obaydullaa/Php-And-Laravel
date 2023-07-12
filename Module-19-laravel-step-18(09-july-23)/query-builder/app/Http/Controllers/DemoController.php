<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function DemoAction(Request $request)
    {
    //    return Brand::create($request->input()); // create 
       return Brand::where('id', $request->id)->Update($request->input()); // updated

    }
}


// Query Builder


// class DemoController extends Controller
// {
//     public function DemoAction(Request $request)
//     {
//         $results = DB::table('brands')
//         ->where('id', $request->id)
//           ->delete();

//         // delete all table 
//         $deletedTable = DB::table('user')->truncate();
//         return $deletedTable;

//     }
// }
