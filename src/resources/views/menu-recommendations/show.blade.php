@extends('layouts.app', ['title' => $menu->name . ' - Matcha Mey'])

@section('content')
<section class="mx-auto max-w-7xl px-6 py-16">
    <div class="grid gap-10 rounded-[2rem] border border-[#e1ead8] bg-white p-6 shadow-xl md:grid-cols-2 md:p-8">
        <div class="flex min-h-[420px] items-center justify-center overflow-hidden rounded-[1.5rem] bg-gradient-to-br from-[#eef5e5] to-[#bad18b]">
            @if ($menu->image)
                <img class="h-full w-full object-cover" src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}">
            @else
                <span class="text-4xl font-black text-[#31572c]">Menu</span>
            @endif
        </div>

        <div class="flex flex-col justify-center">
            <div class="mb-5 flex flex-wrap gap-2">
                <span class="rounded-full bg-[#f3f8ed] px-3 py-1 text-xs font-black text-[#31572c]">{{ $menu->taste_profile }}</span>
                <span class="rounded-full bg-[#f3f8ed] px-3 py-1 text-xs font-black text-[#31572c]">{{ $menu->sweetness_level }}</span>
                <span class="rounded-full bg-[#f3f8ed] px-3 py-1 text-xs font-black text-[#31572c]">{{ $menu->menu_type }}</span>
            </div>

            <h1 class="text-4xl font-black tracking-tight text-[#1b2b1b] md:text-5xl">
                {{ $menu->name }}
            </h1>

            <p class="mt-6 leading-8 text-[#607060]">
                {{ $menu->description }}
            </p>

            <a href="{{ route('menu-recommendations.index') }}"
               class="mt-8 inline-flex w-fit rounded-full border border-[#dce7d2] bg-white px-5 py-3 text-sm font-black text-[#31572c] transition hover:bg-[#f5f9ef]">
                Kembali ke Rekomendasi
            </a>
        </div>
    </div>
</section>
@endsection
