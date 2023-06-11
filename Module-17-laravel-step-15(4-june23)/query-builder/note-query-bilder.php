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