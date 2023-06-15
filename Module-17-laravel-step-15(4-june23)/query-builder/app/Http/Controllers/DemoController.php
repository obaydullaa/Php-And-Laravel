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
        // $results =  DB::table('products')->min('brandImg', 'brandName');
        // return $results;


        // 71 [Query] Aggregates
        //$results =  DB::table('products')->count(); // return how much column: result: 27
    //    $results =  DB::table('products')->min('price');
    //    $results =  DB::table('products')->max('price');
    //    $results =  DB::table('products')->avg('price');
    //    $results =  DB::table('products')->sum('price');

    //72 [Query] Select Clauses
    //    $results =  DB::table('products')->select('title', 'price', 'stock', 'discount')->get();

    // $results =  DB::table('products')->select('title')->distinct()->get();
    //    return $results;
    // }

    // 75 [Query] Left Right

    $results =  DB::table('products')
    ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
    ->rightJoin('brands', 'products.category_id', '=', 'categories.id')
    ->get();

       return $results;
    }
}
