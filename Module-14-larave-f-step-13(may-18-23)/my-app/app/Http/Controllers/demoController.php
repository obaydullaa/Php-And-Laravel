<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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

    public function FileBinary() {

        $filePath = "upload/obaydulla.jpg";
        return response()->file($filePath);
    }
    public function FileDwonload() {

        $filePath = "upload/obaydulla.jpg";
        return response()->download($filePath);
    }
}
