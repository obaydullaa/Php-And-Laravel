<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function CategoryPage() {
        return view('pages.dashboard.category-page');
    }

    function CategoryList(Request $request) {
        $user_id=$request->header('id');
        return Category::where('user_id', $user_id)->get();
        
    }
    function CategoryCreate(Request $request) {
        $user_id=$request->header('id');
        return Category::create([
            'name' =>$request->input('name'),
            'user_id' =>$user_id,
        ]);
    }
    function CategoryDelete(Request $request) {
        $category_id=$request->input('id');
        $user_id=$request->header('id');
        return Category::where('id', $category_id)->where('user_id', $user_id)->delete();
    }  
    function CategoryByID(Request $request) {
        sleep(3);
        $category_id=$request->input('id');
        $user_id=$request->header('id');
        return Category::where('id', $category_id)->where('user_id', $user_id)->first();
    }
    function CategoryUpdate(Request $request) {
        $category_id=$request->input('id');
        $user_id=$request->header('id');
        return Category::where('id', $category_id)->where('user_id', $user_id)->update([
            'name'=>$request->input('name'),
        ]);
        
    }

}


