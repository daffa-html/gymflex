<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'GymFlex')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800 font-sans">

    <nav class="border-b bg-white">
        <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-xl font-bold text-primary">GYMFLEX</a>
            <div class="hidden md:flex items-center gap-6 text-sm">
                <a href="{{ route('home') }}" class="{{ request()->is('/') ? 'text-accent font-semibold' : 'text-gray-600 hover:text-accent' }}">Beranda</a>
                <a href="{{ route('produk.index') }}" class="{{ request()->is('produk*') ? 'text-accent font-semibold' : 'text-gray-600 hover:text-accent' }}">Produk</a>
                <a href="{{ route('gallery.index') }}" class="{{ request()->is('gallery') ? 'text-accent font-semibold' : 'text-gray-600 hover:text-accent' }}">Galeri</a>
                <a href="{{ route('brand-ambassador.index') }}" class="{{ request()->is('brand-ambassador') ? 'text-accent font-semibold' : 'text-gray-600 hover:text-accent' }}">Brand Ambassador</a>
                <a href="{{ route('about') }}" class="{{ request()->is('about') ? 'text-accent font-semibold' : 'text-gray-600 hover:text-accent' }}">Tentang</a>
                <a href="{{ route('contact.index') }}" class="bg-accent text-white px-4 py-2 rounded-lg hover:opacity-90">Hubungi Kami</a>
            </div>
            <button id="menu-toggle" class="md:hidden text-2xl">&#9776;</button>
        </div>
        <div id="mobile-menu" class="hidden md:hidden border-t px-4 py-3 space-y-2 text-sm">
            <a href="{{ route('home') }}" class="block text-gray-600">Beranda</a>
            <a href="{{ route('produk.index') }}" class="block text-gray-600">Produk</a>
            <a href="{{ route('gallery.index') }}" class="block text-gray-600">Galeri</a>
            <a href="{{ route('brand-ambassador.index') }}" class="block text-gray-600">Brand Ambassador</a>
            <a href="{{ route('about') }}" class="block text-gray-600">Tentang</a>
            <a href="{{ route('contact.index') }}" class="block text-gray-600">Hubungi Kami</a>
        </div>
    </nav>

    @if (session('success'))
        <div class="max-w-6xl mx-auto px-4 mt-4">
            <div class="bg-green-100 border border-green-300 text-green-800 text-sm px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="max-w-6xl mx-auto px-4 mt-4">
            <div class="bg-red-100 border border-red-300 text-red-800 text-sm px-4 py-3 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer class="bg-primary text-gray-300 mt-16">
        <div class="max-w-6xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8 text-sm">
            <div>
                <p class="text-white text-lg font-bold mb-2">GYMFLEX</p>
                <p>Toko peralatan olahraga &amp; fitness terlengkap untuk kebutuhan rumahan maupun komersial.</p>
            </div>
            <div>
                <p class="text-white font-semibold mb-2">Menu</p>
                <ul class="space-y-1">
                    <li><a href="{{ route('produk.index') }}" class="hover:text-accent">Produk</a></li>
                    <li><a href="{{ route('gallery.index') }}" class="hover:text-accent">Galeri</a></li>
                    <li><a href="{{ route('brand-ambassador.index') }}" class="hover:text-accent">Brand Ambassador</a></li>
                    <li><a href="{{ route('contact.index') }}" class="hover:text-accent">Kontak</a></li>
                </ul>
            </div>
            <div>
                <p class="text-white font-semibold mb-2">Kontak</p>
                <p>Jl. Fitness No. 123, Jakarta Selatan</p>
                <p>+62 812-3456-7890</p>
                <p>info@gymflex.co.id</p>
            </div>
        </div>
        <div class="border-t border-gray-700">
            <div class="max-w-6xl mx-auto px-4 py-4 text-xs text-gray-400">
                &copy; {{ date('Y') }} GymFlex. Semua hak dilindungi.
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>
</html>
