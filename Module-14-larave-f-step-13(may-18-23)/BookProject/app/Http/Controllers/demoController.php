<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
