/**
*  69 [Query] Retriving All Rows
*/

<!--  Data Retriving way 1 -->


 step 01: data create or push in database.
 =================================================

 step 02: create model: category
 ===========================================
class category extends Model
{
    use HasFactory;
}

step 03: create Controller
==================================
public function getCategory()
    {
        $categories =  category::latest()->get();
        return $categories;
    }

    step 04: create rote
==================================
Route::get('categories', [Category_Controller::class, 'getCategory']);


<!--  Data Retriving way 2 -->

 all are same we use data retriving use cla DB
===================================================

Route::get('categories', [DemoController::class, 'DemoAction']);

 class DemoController extends Controller
{
    public function DemoAction()
    {
        $results =  DB::table('products')->get();
        return $results;
    }
}

// go to Kernel.php and VerifyCsrfToken comment..

/**
*  70 [Query] Retriving Single Rows
*/
// Retriving Single Rows

    $results =  DB::table('brands')->pluck('brandImg', 'brandName');
    return $results;

/**
* 71 [Query] Aggregates
*/
//$results =  DB::table('products')->count(); // return how much column: result: 27
    //    $results =  DB::table('products')->min('price');
    //    $results =  DB::table('products')->max('price');
    //    $results =  DB::table('products')->avg('price');
       $results =  DB::table('products')->sum('price');
       return $results;

/**
* 72 [Query] Select Clauses
*/
//    $results =  DB::table('products')->select('title', 'price', 'stock', 'discount')->get();

    $results =  DB::table('products')->select('title')->distinct()->get();
       return $results;

* Inner Join 
* =================
* The name of the table to Join // Tble name 
* The column on the current table to join on // Parent table foren key
* The column on the joined table to join on  // child table primary key

/**
* 74 [Query] Inner Join
*/

$results =  DB::table('products')
    ->join('categories', 'products.category_id', '=', 'categories.id')
    ->join('brands', 'products.brand_id', '=', 'categories.id')
    ->get();

    return $results;

/**
* 75 [Query] Left Right
*/
$results =  DB::table('products')
    ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
    ->rightJoin('brands', 'products.category_id', '=', 'categories.id')
    ->get();

       return $results;


$results =  DB::table('products')
    ->crossJoin( 'brands')
    ->get();

       return $results;
    
/**
* 77 [Query] Advanced Join Clauses
* discus
*/
    
/**
* 78 [Query] Advance Join Clauses
*
*/

$results = DB::table('products')
    ->join('categories', function (JoinClause $join) {
        $join->on('products.category_id', '=', 'categories.id')
            // ->where('products.price', '=', 2000);
            ->where('categories.categoryName', '=', 'Food');
    })
    ->get();

    return $results;


    
/**
* 79 [Query] Unions
*/
$query1 = DB::table('products')->where('products.price', '>', 2000);
    $query2 = DB::table('products')->where('products.discount', '=', 1);
    
   $results = $query1->union($query2)->get();

    return $results;

/**
* 80 [Query] Basic Where Clauses
*/

$results = DB::table('products')
            ->whereNotIN('products.price',[20, 4000])
            // ->whereIN('products.price',[20, 4000])
            // ->where('products.title', 'NOT LIKE', '%Ca%')
            // ->where('products.title', 'LIKE', '%Ca%')
            ->get();
        return $results;
/**
*81 [Query] Advance Where Clauses
*/

$results = DB::table('products')
            ->whereNotBetween('products.price', [1, 2000])
            ->get();

            // ->whereBetween('products.price', [1, 80])
            // ->get();

            // ->where('products.price', '>', 2000)
            // ->WhereNot('products.price', '=', 20)
            // ->get();


            // ->where('products.price', '>', 2000)
            // ->orWhere('products.price', '=', 20)
            // ->get();

        return $results;
        
/**
* 82 [Query] Advance Where Clauses
*/
$results = DB::table('products')
        ->whereTime('updated_at', '15:56:30')
        
        
        // ->whereYear('updated_at', '2023')
        // ->whereDay('updated_at', '11')
        // ->whereMonth('updated_at', '11')
        // ->whereDate('updated_at', '2023-06-17')
            
            // ->whereNotNull('products.price')
            // ->whereNull('products.price')
            ->get();

/**
* 83 [Query] Advance Where Clauses
*/

$results = DB::table('brands')
        ->whereDate('created_at', '2023-02-09')
        // ->whereDate('updated_at', '2023-06-17')
        
        
        // ->whereYear('updated_at', '2023')
        // ->whereDay('updated_at', '11')
        // ->whereMonth('updated_at', '11')
            
            // ->whereNotNull('products.price')
            // ->whereNull('products.price')
            ->get();

        return $results;

/**
* 84 [Query] Advance Where Clauses ( column )
*/

$results = DB::table('products')
        ->whereColumn('price', '<', 'discount_price')

        // ->whereColumn('updated_at', '<', 'created_at')
        ->get();


/**
* 85 [Query] order By Asc Desc & random
*/
$results = DB::table('brands')->inRandomOrder()->first();
        // $results = DB::table('brands')->inRandomOrder()->get();
        // $results = DB::table('brands')->orderBy('brandName', 'desc')->get();
        // $results = DB::table('brands')->orderBy('brandName', 'asc')->get();

        return $results;
/**
* 86 [Query] Latest Oldest Skip Take
*/

$results = DB::table('brands')->skip(2)->take(2)->get();

// $results = DB::table('brands')->oldest()->first();  // need some time pagination
// $results = DB::table('brands')->latest()->first(); // need some time pagination

return $results;

/**
* 87 [Query] Group By And Having
* Note: database.php -> and 'strict' => true, will be false 
*/
    $results = DB::table('products')
        ->groupBy('title')
        ->where('price', '>',  30)
        
        ->get();

        return $results;

/**
* 88 [Query] Insert Query
*/
$results = DB::table('brands')
    ->insert(
        [
            'brandImg' => 'Demo Brand Img',
            'brandName' => 'Demo Brand Name'
        ]
        );

return $results;

/**
* 89 [Query] Insert Query
*/
<!-- api.php  -->
Route::post('/insert', [DemoController::class, 'DemoAction']);

<!-- post man post request  -->
http://127.0.0.1:8000/api/insert

<!-- // controller -->
$results = DB::table('brands')
        ->insert($request->input());
            return $results;

<!-- another way  -->
// postman 
{
"name":"BBBName From Postman",
"img":"BBBBimg from Postman"
}

$results = DB::table('brands')
    ->insert([
        'brandName'=>$request->input('name'),
        'brandImg'=>$request->input('img')
    ]);
    return $results;

/**
* 90 [Query] Update Query
*/
<!-- postman  -->
http://127.0.0.1:8000/api/insert/3
{
"brandName":"New Brand Name Postman"
}

Route::post('/insert/{id}', [DemoController::class, 'DemoAction']);

<!-- controller  -->
$results = DB::table('brands')
    ->where('id', '=', $request->id)
    ->update($request->input());
    return $results;
/**
* 91 [Query] Update or Insert
*/
<!-- api   -->
Route::post('/upsert/{bName}', [DemoController::class, 'DemoAction']);

<!-- postman   -->
postman route: http://127.0.0.1:8000/api/upsert/NewBrand
{
"brandName":"New Brand Name Postman",
"brandImg": "New Brand Img"
}


$results = DB::table('brands')
    ->updateOrInsert(
    ['brandName'=> $request->bName],
    $request->input()
    );

/**
* 92 [Query] Increment Decrement
*/
http://127.0.0.1:8000/api/increment/1

Route::post('/increment/{id}', [DemoController::class, 'DemoAction']);

public function DemoAction(Request $request)
    {

        $results = DB::table('products')
          ->where('id', $request->id)
          ->decrement('price', 2);
        //   ->increment('price', 5);
        //   ->increment('price');
    }

/**
* 93 [Query] Delete Query
*/
    