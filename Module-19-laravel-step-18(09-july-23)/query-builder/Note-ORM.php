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