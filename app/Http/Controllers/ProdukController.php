<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::with('kategori')->where('status', true);

        if ($request->has('kategori') && $request->kategori !== 'all') {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('slug', $request->kategori);
            });
        }

        $produk = $query->get();
        $kategori = KategoriProduk::all();

        return view('produk.index', compact('produk', 'kategori'));
    }

    public function show(string $slug)
    {
        $produk = Produk::with('kategori')->where('slug', $slug)->firstOrFail();

        return view('produk.show', compact('produk'));
    }
}
