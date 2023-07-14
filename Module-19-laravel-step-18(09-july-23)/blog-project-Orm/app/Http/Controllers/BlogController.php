<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function blogPage() {
        return view('pages.blog');
    }

    function allBlog() {
        $blogs = Blog::latest()->get();
        return $blogs;
    }
}

