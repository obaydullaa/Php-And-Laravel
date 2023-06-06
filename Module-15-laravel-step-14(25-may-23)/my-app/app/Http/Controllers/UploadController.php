<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function showForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $name = $request->input('name');
        $avatar = $request->file('avatar');

        // Validate and process the uploaded file

        if ($avatar) {
            $path = $avatar->store('public/uploads');
            // Additional code to process the uploaded file if needed
        }

        // Additional code to handle form submission

        return redirect()->back()->with('success', 'Form submitted successfully.');
    }
}
