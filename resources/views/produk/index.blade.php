@extends('layouts.public')

@section('title', 'Produk - GymFlex')

@section('content')
    <div class="bg-primary text-white">
        <div class="max-w-6xl mx-auto px-4 py-12">
            <h1 class="text-3xl font-bold">Produk Kami</h1>
        </div>
    </div>

    <section class="max-w-6xl mx-auto px-4 py-8">
        <div class="flex flex-wrap gap-2 mb-6">
            <a href="{{ route('produk.index') }}"
               class="px-4 py-2 rounded-full text-sm border {{ !request()->kategori ? 'bg-accent text-white border-accent' : 'text-gray-600 hover:border-accent' }}">Semua</a>
            @foreach ($kategori as $item)
                <a href="{{ route('produk.index', ['kategori' => $item->slug]) }}"
                   class="px-4 py-2 rounded-full text-sm border {{ request()->kategori === $item->slug ? 'bg-accent text-white border-accent' : 'text-gray-600 hover:border-accent' }}">{{ $item->nama }}</a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @forelse ($produk as $item)
                <a href="{{ route('produk.show', $item->slug) }}" class="border rounded-lg overflow-hidden hover:shadow-md transition">
                    <div class="h-44 bg-surface">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover" onerror="this.onerror=null;this.src='https://placehold.co/600x400/f3f4f6/111827?text={{ urlencode($item->nama) }}'">
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-accent font-semibold">{{ $item->kategori->nama }}</p>
                            <span class="text-xs px-2 py-0.5 rounded {{ $item->stok > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $item->stok > 0 ? 'Tersedia' : 'Habis' }}
                            </span>
                        </div>
                        <p class="font-semibold mt-1">{{ $item->nama }}</p>
                        <p class="text-primary font-bold mt-2">{{ $item->formatted_harga }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500">Produk tidak ditemukan.</p>
            @endforelse
        </div>
    </section>
@endsection
