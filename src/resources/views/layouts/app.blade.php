<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Matcha Mey' }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-screen bg-[#f7fbf2] text-[#1f2f1f] antialiased">
    <header class="sticky top-0 z-50 border-b border-[#dfe8d5] bg-[#fffdf7]/95 backdrop-blur-xl">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#31572c] to-[#90a955] text-xl font-black text-white shadow-md">
                    🍵
                </div>

                <span class="text-2xl font-black tracking-tight text-[#1f2f1f]">
                    {{ ($brandContent ?? null)?->title ?? 'Matcha Mey' }}
                </span>
            </a>

            <nav class="hidden items-center gap-2 md:flex">
                <a href="{{ route('home') }}" class="rounded-full px-4 py-2 text-sm font-bold transition {{ request()->routeIs('home') ? 'bg-[#e6efd8] text-[#1f2f1f]' : 'text-[#5f6f5f] hover:bg-[#e6efd8] hover:text-[#1f2f1f]' }}">Home</a>
                <a href="{{ route('about') }}" class="rounded-full px-4 py-2 text-sm font-bold transition {{ request()->routeIs('about') ? 'bg-[#e6efd8] text-[#1f2f1f]' : 'text-[#5f6f5f] hover:bg-[#e6efd8] hover:text-[#1f2f1f]' }}">Tentang</a>
                <a href="{{ route('matchas.index') }}" class="rounded-full px-4 py-2 text-sm font-bold transition {{ request()->routeIs('matchas.*') ? 'bg-[#e6efd8] text-[#1f2f1f]' : 'text-[#5f6f5f] hover:bg-[#e6efd8] hover:text-[#1f2f1f]' }}">Katalog</a>
                <a href="{{ route('articles.index') }}" class="rounded-full px-4 py-2 text-sm font-bold transition {{ request()->routeIs('articles.*') ? 'bg-[#e6efd8] text-[#1f2f1f]' : 'text-[#5f6f5f] hover:bg-[#e6efd8] hover:text-[#1f2f1f]' }}">Artikel</a>
                <a href="{{ route('menu-recommendations.index') }}" class="rounded-full px-4 py-2 text-sm font-bold transition {{ request()->routeIs('menu-recommendations.*') ? 'bg-[#e6efd8] text-[#1f2f1f]' : 'text-[#5f6f5f] hover:bg-[#e6efd8] hover:text-[#1f2f1f]' }}">Rekomendasi</a>
                <a href="{{ route('search') }}" class="rounded-full px-4 py-2 text-sm font-bold transition {{ request()->routeIs('search') ? 'bg-[#e6efd8] text-[#1f2f1f]' : 'text-[#5f6f5f] hover:bg-[#e6efd8] hover:text-[#1f2f1f]' }}">Search</a>
                <a href="{{ route('contact') }}" class="rounded-full px-4 py-2 text-sm font-bold transition {{ request()->routeIs('contact') ? 'bg-[#e6efd8] text-[#1f2f1f]' : 'text-[#5f6f5f] hover:bg-[#e6efd8] hover:text-[#1f2f1f]' }}">Kontak</a>
            </nav>
        </div>
    </header>

    <main>
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <footer class="mt-24 bg-[#1f3520] text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-6 py-12 md:grid-cols-3">
            <div>
                <h3 class="mb-3 text-2xl font-black">
                    {{ ($footerContent ?? null)?->title ?? 'Matcha Mey' }}
                </h3>

                <div class="max-w-md leading-7 text-white/70">
                    {!! ($footerContent ?? null)?->content ?? 'Website edukasi dan rekomendasi menu matcha berbasis web.' !!}
                </div>
            </div>

            <div>
                <h4 class="mb-3 text-lg font-black">Navigasi</h4>
                <div class="space-y-2 text-white/70">
                    <a class="block hover:text-white" href="{{ route('matchas.index') }}">Katalog Matcha</a>
                    <a class="block hover:text-white" href="{{ route('articles.index') }}">Artikel Edukasi</a>
                    <a class="block hover:text-white" href="{{ route('menu-recommendations.index') }}">Rekomendasi Menu</a>
                </div>
            </div>

            <div>
                <h4 class="mb-3 text-lg font-black">Admin</h4>
                <a class="text-white/70 hover:text-white" href="/admin">Masuk Dashboard</a>
            </div>
        </div>

        <div class="border-t border-white/10 px-6 py-5 text-center text-sm text-white/50">
            © {{ date('Y') }} {{ ($brandContent ?? null)?->title ?? 'Matcha Mey' }}. All rights reserved.
        </div>
    </footer>

    @stack('styles')
    @livewireScripts
</body>
</html>
