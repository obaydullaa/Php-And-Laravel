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
    // return Product::pluck('price','title'); //retrieving all data 

    // Aggregatest method

    // return Product::sum('price'); 
    // return Product::avg('price'); 
    // return Product::max('price'); 
    // return Product::min('price'); 
    
    // return Product::select('title', 'price', 'star')->get(); 
    return Product::select('price')->distinct()->get(); // retrieving unique title.


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
