<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Database\Query\JoinClause;
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

    // 78 [Query] Advance Join Clauses

    // $results = DB::table('products')
    // ->join('categories', function (JoinClause $join) {
    //     $join->on('products.category_id', '=', 'categories.id')
    //         // ->where('products.price', '=', 2000);
    //         ->where('categories.categoryName', '=', 'Food');
    // })
    // ->get();

    // return $results;

//     $query1 = DB::table('products')->where('products.price', '>', 2000);
//     $query2 = DB::table('products')->where('products.discount', '=', 1);
    
//    $results = $query1->union($query2)->get();

//     return $results;

 // ======================================

        $results = DB::table('products')
        ->whereColumn('price', '<', 'discount_price')

        // ->whereColumn('updated_at', '<', 'created_at')
        ->get();

        return $results;

    }
}
