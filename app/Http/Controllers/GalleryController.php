<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GalleryController extends Controller
{
    public function index()
    {
        $galeri = Galeri::all();

        return view('gallery', compact('galeri'));
    }
}
