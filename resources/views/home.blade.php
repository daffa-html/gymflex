@extends('layouts.public')

@section('title', 'GymFlex - Peralatan Olahraga & Fitness')

@section('content')
    <section class="bg-primary text-white">
        <div class="max-w-6xl mx-auto px-4 py-20 text-center">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Peralatan Olahraga &amp; Fitness Terlengkap</h1>
            <p class="text-gray-300 max-w-2xl mx-auto mb-8">Tersedia alat cardio, strength, functional, dan aksesoris untuk home gym maupun komersial.</p>
            <div class="flex justify-center gap-3">
                <a href="{{ route('produk.index') }}" class="bg-accent text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90">Lihat Produk</a>
                <a href="{{ route('contact.index') }}" class="border border-gray-400 px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-primary">Hubungi Kami</a>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 py-12">
        <h2 class="text-2xl font-bold mb-6">Produk Pilihan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @forelse ($produk as $item)
                <a href="{{ route('produk.show', $item->slug) }}" class="border rounded-lg overflow-hidden hover:shadow-md transition">
                    <div class="h-44 bg-surface">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover" onerror="this.onerror=null;this.src='https://placehold.co/600x400/f3f4f6/111827?text={{ urlencode($item->nama) }}'">
                    </div>
                    <div class="p-4">
                        <p class="text-xs text-accent font-semibold">{{ $item->kategori->nama }}</p>
                        <p class="font-semibold mt-1">{{ $item->nama }}</p>
                        <p class="text-primary font-bold mt-2">{{ $item->formatted_harga }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500">Belum ada produk.</p>
            @endforelse
        </div>
        <div class="mt-6 text-center">
            <a href="{{ route('produk.index') }}" class="text-accent font-semibold hover:underline">Lihat semua produk &rarr;</a>
        </div>
    </section>

    <section class="bg-surface border-y">
        <div class="max-w-6xl mx-auto px-4 py-12 text-center">
            <h2 class="text-2xl font-bold mb-2">Butuh Konsultasi?</h2>
            <p class="text-gray-600 mb-6">Tim kami siap membantu memilih alat yang sesuai dengan kebutuhan Anda.</p>
            <a href="{{ route('contact.index') }}" class="bg-accent text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90">Kirim Pesan</a>
        </div>
    </section>
@endsection
