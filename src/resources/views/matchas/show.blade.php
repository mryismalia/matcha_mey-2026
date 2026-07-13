@extends('layouts.app', ['title' => $matcha->name . ' - Matcha Mey'])

@section('content')
<section class="mx-auto max-w-7xl px-6 py-16">
    <div class="grid gap-10 rounded-[2rem] border border-[#e1ead8] bg-white p-6 shadow-xl md:grid-cols-2 md:p-8">
        <div class="flex min-h-[420px] items-center justify-center overflow-hidden rounded-[1.5rem] bg-gradient-to-br from-[#eef5e5] to-[#bad18b]">
            @if ($matcha->image)
                <img class="h-full w-full object-cover" src="{{ asset('storage/' . $matcha->image) }}" alt="{{ $matcha->name }}">
            @else
                <span class="text-4xl font-black text-[#31572c]">Matcha</span>
            @endif
        </div>

        <div class="flex flex-col justify-center">
            <div class="mb-5 flex flex-wrap gap-2">
                <span class="rounded-full bg-[#f3f8ed] px-3 py-1 text-xs font-black text-[#31572c]">{{ $matcha->grade }}</span>
                <span class="rounded-full bg-[#f3f8ed] px-3 py-1 text-xs font-black text-[#31572c]">{{ $matcha->origin }}</span>
                <span class="rounded-full bg-[#f3f8ed] px-3 py-1 text-xs font-black text-[#31572c]">{{ $matcha->taste_profile }}</span>
            </div>

            <h1 class="text-4xl font-black tracking-tight text-[#1b2b1b] md:text-5xl">
                {{ $matcha->name }}
            </h1>

            <p class="mt-6 leading-8 text-[#607060]">
                {{ $matcha->description }}
            </p>

            <div class="mt-8 rounded-3xl bg-[#f5f9ef] p-6">
                <h2 class="text-xl font-black text-[#1b2b1b]">Rekomendasi Penggunaan</h2>
                <p class="mt-3 leading-8 text-[#607060]">
                    {{ $matcha->usage_recommendation }}
                </p>
            </div>

            <a href="{{ route('matchas.index') }}"
               class="mt-8 inline-flex w-fit rounded-full border border-[#dce7d2] bg-white px-5 py-3 text-sm font-black text-[#31572c] transition hover:bg-[#f5f9ef]">
                Kembali ke Katalog
            </a>
        </div>
    </div>
</section>
@endsection
