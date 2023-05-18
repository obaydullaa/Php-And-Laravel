<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
