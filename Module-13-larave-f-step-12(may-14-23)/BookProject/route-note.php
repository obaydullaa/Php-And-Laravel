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
