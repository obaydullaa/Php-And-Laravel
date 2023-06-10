<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class Category_Controller extends Controller
{
    public function getCategory()
    {
        $categories =  category::latest()->get();
        return $categories;
    }
}
