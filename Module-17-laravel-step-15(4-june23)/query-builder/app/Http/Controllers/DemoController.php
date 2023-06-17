<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{
    public function DemoAction(Request $request)
    {

        $results = DB::table('brands')
          ->updateOrInsert(
            ['brandName'=> $request->bName],
            $request->input()
          );
    }
}
