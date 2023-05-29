Question

Question : Create a single action controller called AboutController using the appropriate artisan command. Implement the single action controller to return a view called about when accessed via a GET request to the /about URL.


Step 01: Make controller  
=====================
  php artisan make:controller AboutController --invokable


Step 02:  write in AboutController.php:
======================================
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request)
    {
        return view('about');
    }
}

Step 03: 
===========
Route::get('/about', 'App\Http\Controllers\AboutController');