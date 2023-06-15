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


/**
* 76 [Query] Cross Join
*/

$results =  DB::table('products')
    ->crossJoin( 'brands')
    ->get();

       return $results;
    





