/**
*  94 [ORM] Meet Eloquent ORM
*/



name -> table name Brands -> Model name Brand 

if not maintains naming convention then detected table this way :
    protected $primaryKey='brand_id';
    protected $table='brands';

    protected $attributes = [
        'brandName' => 'default Brand',
        'brandImg' => 'default.jpg',
        ]

/**
*  96 [ORM] Meet Our Demo Database
*/

php artisan make:model Category
php artisan make:model Product
php artisan make:model ProductCart
php artisan make:model ProductDetail
php artisan make:model ProductReview
php artisan make:model ProductSlider
php artisan make:model ProductWish
php artisan make:model Profile
php artisan make:model User

/**
*  97 [ORM] Insert
*/

class DemoController extends Controller
{
    public function DemoAction(Request $request)
    {
       return Brand::create($request->input());

    }
}


Route::post('/create-band', [DemoController::class, 'DemoAction']);


class Brand extends Model
{
    protected $fillable = ['brandName','brandImg'];
}

/**
* 98 [ORM] Update
*/
class Brand extends Model
{
    protected $fillable = ['brandName','brandImg'];
}

class DemoController extends Controller
{
    public function DemoAction(Request $request)
    {
    //    return Brand::create($request->input()); // create 
       return Brand::where('id', $request->id)->Update($request->input()); // updated

    }
}

Route::post('/update-brand/{id}', [DemoController::class, 'DemoAction']);


/**
*  99 [ORM] Why Fillable Properties
*/

Because:
 1. Security
 2. Performance
 3. Readability
 4. Consistency
 5. Extensibility

/**
*  100 [ORM] Update or Create
*/
class Brand extends Model
{
    protected $fillable = ['brandName','brandImg'];
}

class DemoController extends Controller
{
    public function DemoAction(Request $request)
    {
    //    return Brand::create($request->input()); // create 
    //    return Brand::where('id', $request->id)->Update($request->input()); // updated
    
       return Brand::updateOrCreate(
        ['brandName'=> $request->brandName],
        $request->input()

       ); // updated or create

    }
}

Route::post('/create-update-brand/{brandName}', [DemoController::class, 'DemoAction']);

/**
*  101 [ORM] Delete
*/

class Brand extends Model
{
    protected $fillable = ['brandName','brandImg'];
}

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

    return Brand::where('id', $request->id)->delete();

    }
}

/**
*  102 [ORM] Increment Decrement
*/
public function DemoAction(Request $request)
    {

    return Product::where('id', 1)->increment('price'); // default 1+-

    }

/**
*  103 [ORM] Retrieving All Rows
*/
class DemoController extends Controller
{
    public function DemoAction(Request $request)
    {

    //  return Brand::get(); //retrieving all data 
    //  return Brand::all(); //retrieving all data 
    // return Brand::first(); //retrieving all data 
    
    return Brand::find(1); //retrieving all data 


    }
}
    
