@extends('layouts.public')

@section('title', 'Tentang Kami - GymFlex')

@section('content')
    <div class="bg-primary text-white">
        <div class="max-w-6xl mx-auto px-4 py-12">
            <h1 class="text-3xl font-bold">Tentang Kami</h1>
        </div>
    </div>

    <section class="max-w-6xl mx-auto px-4 py-12">
        <div class="max-w-3xl">
            <h2 class="text-xl font-bold mb-3">Siapa Kami</h2>
            <p class="text-gray-600 mb-4">GymFlex adalah toko peralatan olahraga dan fitness yang menyediakan berbagai macam alat olahraga berkualitas, mulai dari alat cardio, alat kekuatan, hingga aksesoris latihan.</p>
            <p class="text-gray-600">Kami melayani pembelian untuk home gym, institusi, maupun kebutuhan komersial seperti gym dan pusat kebugaran.</p>
        </div>
    </section>

    <section class="bg-surface border-y">
        <div class="max-w-6xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white border rounded-lg p-6">
                <h3 class="font-bold text-lg mb-2">Visi</h3>
                <p class="text-gray-600 text-sm">Menjadi toko peralatan olahraga terpercaya yang mendukung gaya hidup sehat masyarakat Indonesia.</p>
            </div>
            <div class="bg-white border rounded-lg p-6">
                <h3 class="font-bold text-lg mb-2">Misi</h3>
                <ul class="text-gray-600 text-sm list-disc list-inside space-y-1">
                    <li>Menyediakan produk berkualitas dengan harga bersaing</li>
                    <li>Memberikan pelayanan dan konsultasi terbaik</li>
                    <li>Menghadirkan pengiriman yang cepat dan aman</li>
                </ul>
            </div>
        </div>
    </section>
@endsection
