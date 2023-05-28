<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function About()
    {
       return view('pages.Blog');
    }
}
