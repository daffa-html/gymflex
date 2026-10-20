@extends('layouts.public')

@section('title', 'Galeri - GymFlex')

@section('content')
    <div class="bg-primary text-white">
        <div class="max-w-6xl mx-auto px-4 py-12">
            <h1 class="text-3xl font-bold">Galeri</h1>
        </div>
    </div>

    <section class="max-w-6xl mx-auto px-4 py-8">
        <div class="flex flex-wrap gap-2 mb-6">
            <button data-filter="semua" class="filter-btn px-4 py-2 rounded-full text-sm border bg-accent text-white border-accent">Semua</button>
            <button data-filter="foto" class="filter-btn px-4 py-2 rounded-full text-sm border text-gray-600 hover:border-accent">Foto Produk</button>
            <button data-filter="dokumentasi" class="filter-btn px-4 py-2 rounded-full text-sm border text-gray-600 hover:border-accent">Dokumentasi</button>
            <button data-filter="kegiatan" class="filter-btn px-4 py-2 rounded-full text-sm border text-gray-600 hover:border-accent">Kegiatan</button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse ($galeri as $item)
                <div class="galeri-item border rounded-lg overflow-hidden" data-kategori="{{ $item->kategori }}">
                    <div class="h-52 bg-surface">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover" onerror="this.onerror=null;this.src='https://placehold.co/600x450/f3f4f6/111827?text={{ urlencode($item->judul) }}'">
                    </div>
                    <div class="p-4">
                        <span class="text-xs bg-surface border px-2 py-1 rounded">{{ ucfirst($item->kategori) }}</span>
                        <p class="font-semibold mt-2">{{ $item->judul }}</p>
                        <p class="text-sm text-gray-500 mt-1">{{ $item->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada foto.</p>
            @endforelse
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.filter-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var filter = btn.dataset.filter;

            document.querySelectorAll('.filter-btn').forEach(function (b) {
                b.classList.remove('bg-accent', 'text-white', 'border-accent');
                b.classList.add('text-gray-600');
            });
            btn.classList.add('bg-accent', 'text-white', 'border-accent');
            btn.classList.remove('text-gray-600');

            document.querySelectorAll('.galeri-item').forEach(function (item) {
                item.style.display = (filter === 'semua' || item.dataset.kategori === filter) ? '' : 'none';
            });
        });
    });
</script>
@endpush
