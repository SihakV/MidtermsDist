<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File; // Import your File model

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload'); // Assuming 'upload' is the name of your Blade view
    }
    
    public function processUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
        ]);
    
        $file = $request->file('file');
        $originalName = $file->getClientOriginalName();
        $mime = $file->getMimeType();
        $size = $file->getSize();
    
        // Define the path where the file will be stored
        $path = $file->store('uploads', 'public');
    
        // Save file details to the database without assigning to $fileRecord
        File::create([
            'original_name' => $originalName,
            'path' => $path,
            'mime_type' => $mime,
            'size' => $size,
        ]);
    
        return redirect()->back()->with('success', 'File uploaded successfully!');
    }
    
}


