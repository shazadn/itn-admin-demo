<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{

    public function gallery()
    {
        return view('admin.auth.gallery', ['images' => Gallery::all()]);
    }

    public function upload(Request $request)
    {
        $redirect = redirect()->route('view.gallery');
        if ($request->hasFile('file')) {
            $filename = $request->file->getClientOriginalName();
            $request->file->storeAs('public/images', $filename);
            Gallery::create(['filename' => $filename, 'path' => 'storage/images/' . $filename]);
            return $redirect->with('success', 'File uploaded successfully.');
        }
        
        return $redirect->with('error', 'Error uploading file.');
    }
}
