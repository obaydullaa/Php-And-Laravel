<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function DemoAction(Request $request)
    {
    //    return Brand::create($request->input()); // create 
    //    return Brand::where('id', $request->id)->Update($request->input()); // updated
    //    return Brand::updateOrCreate(
    //     ['brandName'=> $request->brandName],
    //     $request->input()

    //    ); // updated or create

    // return Brand::where('id', $request->id)->delete();

    // return Product::where('id', 1)->increment('price'); // default 1+-

    //  return Brand::get(); //retrieving all data 
    //  return Brand::all(); //retrieving all data 
    // return Brand::first(); //retrieving all data 
    return Product::pluck('price','title'); //retrieving all data 


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
