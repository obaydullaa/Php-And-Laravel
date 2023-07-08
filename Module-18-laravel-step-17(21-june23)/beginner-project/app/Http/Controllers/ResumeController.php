<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResumeController extends Controller
{
    function page(Request $request) {
        $seo = DB::table('seoproperties')->where('pageName', '=', 'resume')->first();
        return view('pages.resume',['seo'=>$seo]);
    }

    function resumeLink(Request $request) {
        return DB::table('resumes')->get();
    }
    function experiencesData(Request $request) {
        return DB::table('experiences')->get();
    }
    function educationData(Request $request) {
        return DB::table('educations')->get();
    }
    function skillsData(Request $request) {
        return DB::table('skills')->get();
    }
    function languageData(Request $request) {
        return DB::table('languages')->get();
    }
}
