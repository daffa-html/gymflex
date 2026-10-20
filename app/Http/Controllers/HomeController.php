<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')
            ->where('status', true)
            ->limit(4)
            ->get();

        return view('home', compact('produk'));
    }
}
