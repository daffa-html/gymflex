@extends('layouts.public')

@section('title', 'Kontak - GymFlex')

@section('content')
    <div class="bg-primary text-white">
        <div class="max-w-6xl mx-auto px-4 py-12">
            <h1 class="text-3xl font-bold">Hubungi Kami</h1>
        </div>
    </div>

    <section class="max-w-6xl mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
            <h2 class="text-xl font-bold mb-4">Informasi Kontak</h2>
            <ul class="space-y-3 text-gray-700">
                <li><span class="font-semibold">Alamat:</span> Jl. Fitness No. 123, Jakarta Selatan</li>
                <li><span class="font-semibold">Telepon:</span> +62 812-3456-7890</li>
                <li><span class="font-semibold">Email:</span> info@gymflex.co.id</li>
                <li><span class="font-semibold">Jam Operasional:</span> Senin - Sabtu, 06:00 - 22:00 WIB</li>
            </ul>
        </div>

        <div class="border rounded-lg p-6">
            <h2 class="text-xl font-bold mb-4">Kirim Pesan</h2>
            <form action="{{ route('kontak.kirim') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-1" for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                           class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-accent"
                           placeholder="Nama lengkap Anda">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                           class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-accent"
                           placeholder="email@contoh.com">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="subjek">Subjek</label>
                    <input type="text" name="subjek" id="subjek" value="{{ old('subjek') }}" required
                           class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-accent"
                           placeholder="Subjek pesan">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1" for="pesan">Pesan</label>
                    <textarea name="pesan" id="pesan" rows="4" required
                              class="w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-accent"
                              placeholder="Tuliskan pesan Anda...">{{ old('pesan') }}</textarea>
                </div>
                <button type="submit" class="w-full bg-accent text-white py-3 rounded-lg font-semibold hover:opacity-90">Kirim Pesan</button>
            </form>
        </div>
    </section>
@endsection
