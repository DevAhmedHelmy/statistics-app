<?php

namespace App\Http\Controllers;

use App\Imports\CommentImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UploadController extends Controller
{
    public function index()
    {
        return view('upload');
    }


    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
        ]);

        $file = $request->file('file');
        $file->storeAs('public', $file->getClientOriginalName());

        $path = storage_path('app/public/' . $file->getClientOriginalName());

        Excel::import(new CommentImport, $path);

        return redirect()->route('upload.index')->with('success', 'File is successfully uploaded');
    }

}
