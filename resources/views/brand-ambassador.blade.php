@extends('layouts.public')

@section('title', 'Brand Ambassador - GymFlex')

@section('content')
    <div class="bg-primary text-white">
        <div class="max-w-6xl mx-auto px-4 py-12">
            <h1 class="text-3xl font-bold">Brand Ambassador</h1>
        </div>
    </div>

    <section class="max-w-6xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse ($ambassadors as $item)
                <div class="border rounded-lg overflow-hidden">
                    <div class="h-56 bg-surface">
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover" onerror="this.onerror=null;this.src='https://placehold.co/400x400/f3f4f6/111827?text={{ urlencode(substr($item->nama, 0, 2)) }}'">
                    </div>
                    <div class="p-4">
                        <p class="font-bold">{{ $item->nama }}</p>
                        <p class="text-sm text-accent font-semibold">{{ $item->profesi }}</p>
                        <p class="text-sm text-gray-600 mt-2">{{ $item->bio }}</p>
                        @if ($item->instagram)
                            <a href="https://instagram.com/{{ ltrim($item->instagram, '@') }}" target="_blank" class="inline-block mt-3 text-sm text-accent hover:underline">{{ $item->instagram }}</a>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada brand ambassador.</p>
            @endforelse
        </div>
    </section>
@endsection
