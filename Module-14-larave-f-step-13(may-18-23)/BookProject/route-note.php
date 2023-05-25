/**
GET: Pull the records.
POST: Create a new records.
PUT: Modify the whole Record.
PATCH: Update partial record.
DELETE: Delete a record.

All call are VERB;

*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    echo "Hello World";
});

// Route::get('/books',[BookController::class,'books']);
// Route::get('/books/{id}',[BookController::class,'getBook']);
// Route::get('/books/{id}/{field}',[BookController::class,'getBookField']);

Route::controller(BookController::class)->group(function(){
    Route::get('/books','books');
    Route::get('/books/{id}','getBook');
    Route::get('/books/{id}/{field}','getBookField');

    Route::post('/books', 'createBook');
});

// Route::get('/books/{id}',[BookController::class,'getBook'])-> whereNumber('id');
// Route::get('/books/{id}/author',[BookController::class,'getBookAuthor']);
// Route::get('/books/{id}/title',[BookController::class,'getBookAuthor']);
// Route::get('/weather/{city?}', [WeatherController::class, 'getWeather']);

// Controller class
//====================================================

class BookController extends Controller
{
    private $books = [
        [
            'author' => 'Jane Austen',
            'title'  => 'Pride and Prejudice'
        ],
        [
            'author' => 'f. Scott Fitzgerold',
            'title'  => 'The Freat Gatsby'
        ],
        [
            'author' => 'George Orwell',
            'title'  => '1984'
        ],
        [
            'author' => 'J.R.R Tolkien',
            'title'  => 'The lord of the Rings'
        ],
        [
            'author' => 'Hoper Lee',
            'title'  => 'To kill a Mockingbird'
        ],
    ];

    public function books(Request $request)
    {
        $limit = $request->query('limit');
        if($limit == 0){
            return $this->books;
        }else {
            return array_splice($this->books, 0, $limit);
        }
        return $limit;
        return $this->books;
    }

    public function getBook($id)
    {
        $bookId =$id - 1;
        return $this->books[$bookId];
    }
    // public function getBookAuthor($id)
    // {
    //     $bookId =$id - 1;
    //     return $this->books[$bookId];
    // }
    public function getBookField($id, $field)
    {
        $bookId =$id - 1;
        $book = $this->books[$bookId];
        return $book[$field];
    }
    public function createBook(Request $request)
    {
        // $author = request()->get('author');
        // $title = request()->get('title');

        $author = $request->get('author');
        $title = $request->get('title');

        return "Title = {$title} and Author = {$author}"; 
    }

    public function getHeader(Request $request)
    {

        $author = $request->get('author');
        $title = $request->get('title');

        return "Title = {$title} and Author = {$author}"; 
    }
}

// VerifyCsrfToken
//=======================================
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'books','header'
    ];
}


/**
* Module-14-Prerecode Video
 * 3 [Request] Working With Request JSON Body
 * ===========================================================================
 * 
 */

class demoController extends Controller
{
    public function DemoAction(Request $request):string{
        $name=$request->input('name');
        $age=$request->input('age');

        return "My name is={$name} and My age is = {$age}";
    }
}

// Route::get('/hello',[App\Http\Controllers\demoController::class, 'DemoAction']);

/**
* Request body with out specific paramiter send by postman
*
*/

// send by postman jason
Adress: get/post http://127.0.0.1:8000/api/hello

{
    "name": "Obaydul",
    "age": 26,
    "location": "Dhaka",
    "adress": {
        "city": "Dahka",
        "location": "Dhaka"
    }
}
class demoController extends Controller
{
    public function DemoAction(Request $request):array{
    
        return $request->input();
    }
}

// response: 
//==================
{
    "name": "Obaydul",
    "age": 26,
    "location": "Dhaka",
    "adress": {
        "city": "Dahka",
        "location": "Dhaka"
    }
}


/**
* Module-14-Pre recode Video
 * 4 [Request] Working With Request Header
 * ===========================================================================
 * 
 */
// send by postman jason
// Adress: get/post http://127.0.0.1:8000/api/hello
 
// data send use by header of postman

 class demoController extends Controller
{
    public function DemoAction(Request $request):string{
        $name = $request->header(key: 'name');
        $age = $request->header(key: 'age');
    
        return "My name is ${name} and i am ${age} year old. ";
    }
}
Route::get('/hello',[App\Http\Controllers\demoController::class, 'DemoAction']);


/**
* Module-14-Pre recode Video
 * 5 [Request] Working With Request Header Body Params
 * ===========================================================================
 * 
 */
// send by postman jason
// Adress: get http://127.0.0.1:8000/api/hello/obaydul/25
 
// data send use by header, body, url para miter  of postman
// url para miter:  http://127.0.0.1:8000/api/hello/obaydul/25
// body :
    {
        "city": "dhaka",
        "postcode": 2645
    }
// header :  pin mytoken

class demoController extends Controller
{
    public function DemoAction(Request $request):array{
        $pin = $request->header(key: 'pin');
        $city = $request->input(key: 'city');
        $postcode = $request->input(key: 'postcode');

        $name = $request->name;
        $age = $request->age;

        return array(
            "pin"=> $pin,
            "city"=> $city,
            "postcode"=> $postcode,
            "name"=> $name,
            "age"=> $age,
        );
    }
}
Route::get('/hello/{name}/{age}',[App\Http\Controllers\demoController::class, 'DemoAction']);


/**
* Module-14-Pre recode Video
 * 6 [Request] Working With Form Data
 * ===========================================================================
 * 
 */

 // send by postman body form-data and file
// Adress: post http://127.0.0.1:8000/api/hello/
 
// data send use by header, body, url para miter  of postman
// url para miter:  http://127.0.0.1:8000/api/hello/obaydul/25
// body from data:
    {
        "city": "dhaka",
        "postcode": 2645
    }


    class demoController extends Controller
{
    public function DemoAction(Request $request):array{
        $PhotoFile=$request->file(key: 'photo');
        $FileSize=filesize($PhotoFile);
        $FileType=filetype($PhotoFile);
        $FileOriginalName=$PhotoFile->getClientOriginalName();
        $FileTempName=$PhotoFile->getFilename();
        $FileExtension=$PhotoFile->extension();

        return array (
            "FileSize"=>$FileSize,
            "FileType"=>$FileType,
            "FileOriginalName"=>$FileOriginalName,
            "FileTempName"=>$FileTempName,
            "FileExtension"=>$FileExtension,
        );
    }
}

Route::post('/hello',[App\Http\Controllers\demoController::class, 'DemoAction']);

/**
* Module-14-Pre recode Video
 * 7 [Request] Working With File Upload
 * ===========================================================================
 * 
 */
// send by postman body form-data and file
// Adress: post http://127.0.0.1:8000/api/hello/

 class demoController extends Controller
{
    public function DemoAction(Request $request):bool{
        $PhotoFile=$request->file(key: 'photo');
        $PhotoFile->storeAs('upload', $PhotoFile->getClientOriginalName());
        $PhotoFile->move(public_path('upload'),$PhotoFile->getClientOriginalName());
        return true;
    }
}

/**
* Module-14-Pre recode Video
 * 8 [Request] IP Address And Content
 * ===========================================================================
 * 
 */

 // get for client ip
Route::post('/hello',[App\Http\Controllers\demoController::class, 'DemoAction']);

 class demoController extends Controller
{
    public function DemoAction(Request $request):string{

        return $request->ip();
    }
}
// postman -> header Accept 
http://127.0.0.1:8000/hello
class demoController extends Controller
{
    public function DemoAction(Request $request):array{

        return $request->getAcceptableContentTypes();
    }
}

// header thake pathate hobe

class demoController extends Controller
{
    public function DemoAction(Request $request):int{

       if($request->accepts(['application/json'])){
        return 1;
       }else {
        return 0;
       }
    }
}


class demoController extends Controller
{
    public function DemoAction(Request $request):string
    {
        return $request->cookie('Cookie_8');
    }
}

Route::post('/hello',[App\Http\Controllers\demoController::class, 'DemoAction']);

 class demoController extends Controller
{
    public function DemoAction(Request $request):array|null|bool|string {
        return [
            'name'=> 'Bbaydulla',
            'city'=> 'Gazipur'
        ];
        return ['A','B','C'];
        return array('A','B','C','D');
        return true;
        return false;
        return 55;
        return "Bangladesh";
        return "null";
    }
}

/**
* Module-14-Pre recode Video
 * 12 [Response] Redirect Response
 * ===========================================================================
 * 
 */
Route::get('/hello1',[App\Http\Controllers\demoController::class, 'DemoAction1']);
Route::get('/hello2',[App\Http\Controllers\demoController::class, 'DemoAction2']);

public function DemoAction1(Request $request) {
    return redirect(to:"/hello2");
}
public function DemoAction2(Request $request) {
    return "Hello2";
}

/**
* Module-14-Pre recode Video
 * 13 [Response] Binary And File Download Response
 * ===========================================================================
 * 
 */

Route::get('/FileBinary',[App\Http\Controllers\demoController::class, 'FileBinary']);
Route::get('/FileDwonload',[App\Http\Controllers\demoController::class, 'FileDwonload']);


class demoController extends Controller
{
    public function FileBinary() {
        $filePath = "upload/obaydulla.jpg";
        return response()->file($filePath);
    }
}

Route::get('/DemoAction',[App\Http\Controllers\demoController::class, 'DemoAction']);

 class demoController extends Controller
{
    public function DemoAction(){
        $name="cookie_name";
        $value="This is my cookie.";
        $minutes=120;
        $path="/profile";
        $domain=$_SERVER['SERVER_NAME'];
        $secure=false;
        $httpOnly= true;

        return response('Hi')->cookie($name,$value,$minutes,$path,$domain,$secure,$httpOnly);
    }
}


Route::get('/DemoAction',[App\Http\Controllers\demoController::class, 'DemoAction']);

class demoController extends Controller
{
    public function DemoAction(){

        return response('Hi From Header.')->header('key1', 'value1');
    }
}


/**
* Module-14-Pre recode Video
 * 16 [Response] Response View
 * ===========================================================================
 * 
 */
 Discus view and how to work.


/**
* Module-14-Pre recode Video
 * 17 [LOG] Laravel Log Feature
 * ===========================================================================
 * 
 */
Route::get('/DemoAction/{num1}/{num2}',[App\Http\Controllers\demoController::class, 'DemoAction']);
class demoController extends Controller
{
    public function DemoAction(Request $request){
        $name1 = $request->num1;
        $name2 = $request->num2;
        $sum = $name1 + $name2;

        Log::info($sum);

        return $sum;
    }
}