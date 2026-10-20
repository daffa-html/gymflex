@extends('layouts.public')

@section('title', $produk->nama . ' - GymFlex')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <nav class="text-sm text-gray-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-accent">Beranda</a> /
            <a href="{{ route('produk.index') }}" class="hover:text-accent">Produk</a> /
            <span class="text-gray-800">{{ $produk->nama }}</span>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="border rounded-lg overflow-hidden bg-surface">
                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}" class="w-full h-80 object-cover" onerror="this.onerror=null;this.src='https://placehold.co/800x800/f3f4f6/111827?text={{ urlencode($produk->nama) }}'">
            </div>
            <div>
                <span class="text-xs bg-surface border px-2 py-1 rounded">{{ $produk->kategori->nama }}</span>
                <h1 class="text-2xl font-bold mt-3">{{ $produk->nama }}</h1>
                <p class="text-2xl font-bold text-accent mt-2">{{ $produk->formatted_harga }}</p>
                <p class="mt-2 text-sm">
                    <span class="px-2 py-1 rounded {{ $produk->stok > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $produk->stok > 0 ? 'Stok: ' . $produk->stok : 'Stok Habis' }}
                    </span>
                </p>
                <p class="text-gray-600 mt-4 leading-relaxed">{{ $produk->deskripsi }}</p>

                <div class="mt-6">
                    @if ($produk->stok > 0)
                        <a href="{{ route('contact.index') }}" class="inline-block bg-accent text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90">Pesan Sekarang</a>
                    @else
                        <button class="inline-block bg-gray-300 text-gray-500 px-6 py-3 rounded-lg font-semibold cursor-not-allowed" disabled>Stok Habis</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
