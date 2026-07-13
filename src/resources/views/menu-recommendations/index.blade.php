@extends('layouts.app', ['title' => 'Rekomendasi Menu - Matcha Mey'])

@section('content')
<section class="bg-gradient-to-b from-[#f2f8ea] to-white">
    <div class="mx-auto max-w-7xl px-6 py-16 text-center">
        <span class="inline-flex rounded-full bg-[#e6efd8] px-4 py-2 text-sm font-black text-[#31572c]">
            Rekomendasi Menu
        </span>

        <h1 class="mx-auto mt-5 max-w-3xl text-4xl font-black tracking-tight text-[#1b2b1b] md:text-6xl">
            {{ $hero?->title ?? 'Rekomendasi Menu Matcha' }}
        </h1>

        <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-[#607060]">
            {{ $hero?->subtitle ?? 'Gunakan filter sederhana berdasarkan karakter rasa, tingkat kemanisan, dan jenis menu.' }}
        </p>
    </div>
</section>

<section class="mx-auto max-w-7xl px-6 py-14">
    <form action="{{ route('menu-recommendations.index') }}" method="GET"
          class="mb-10 rounded-[1.75rem] border border-[#e1ead8] bg-white p-6 shadow-sm">
        <div class="grid gap-4 md:grid-cols-4 md:items-end">
            <div>
                <label class="mb-2 block text-sm font-black text-[#31572c]">Karakter Rasa</label>
                <select name="taste_profile" class="w-full rounded-2xl border-[#dce7d2] text-[#1f2f1f] focus:border-[#90a955] focus:ring-[#90a955]">
                    <option value="">Semua Rasa</option>
                    @foreach ($tasteProfiles as $key => $label)
                        <option value="{{ $key }}" @selected(($filters['taste_profile'] ?? '') === $key)>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-2 block text-sm font-black text-[#31572c]">Tingkat Kemanisan</label>
                <select name="sweetness_level" class="w-full rounded-2xl border-[#dce7d2] text-[#1f2f1f] focus:border-[#90a955] focus:ring-[#90a955]">
                    <option value="">Semua Tingkat</option>
                    @foreach ($sweetnessLevels as $key => $label)
                        <option value="{{ $key }}" @selected(($filters['sweetness_level'] ?? '') === $key)>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="mb-2 block text-sm font-black text-[#31572c]">Jenis Menu</label>
                <select name="menu_type" class="w-full rounded-2xl border-[#dce7d2] text-[#1f2f1f] focus:border-[#90a955] focus:ring-[#90a955]">
                    <option value="">Semua Jenis</option>
                    @foreach ($menuTypes as $key => $label)
                        <option value="{{ $key }}" @selected(($filters['menu_type'] ?? '') === $key)>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                    class="rounded-full bg-[#426c3a] px-6 py-3 text-sm font-black text-white shadow-md transition hover:bg-[#31572c]">
                Terapkan Filter
            </button>
        </div>
    </form>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($menus as $menu)
            <article class="group overflow-hidden rounded-[1.75rem] border border-[#e1ead8] bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                <div class="flex aspect-[4/3] items-center justify-center overflow-hidden bg-gradient-to-br from-[#eef5e5] to-[#bad18b]">
                    @if ($menu->image)
                        <img class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                             src="{{ asset('storage/' . $menu->image) }}"
                             alt="{{ $menu->name }}">
                    @else
                        <span class="text-3xl font-black text-[#31572c]">Menu</span>
                    @endif
                </div>

                <div class="p-5">
                    <div class="mb-3 flex flex-wrap gap-2">
                        <span class="rounded-full bg-[#f3f8ed] px-3 py-1 text-xs font-black text-[#31572c]">{{ $menu->taste_profile }}</span>
                        <span class="rounded-full bg-[#f3f8ed] px-3 py-1 text-xs font-black text-[#31572c]">{{ $menu->sweetness_level }}</span>
                        <span class="rounded-full bg-[#f3f8ed] px-3 py-1 text-xs font-black text-[#31572c]">{{ $menu->menu_type }}</span>
                    </div>

                    <h3 class="text-xl font-black text-[#1c2f1c]">
                        {{ $menu->name }}
                    </h3>

                    <p class="mt-2 line-clamp-3 leading-6 text-[#607060]">
                        {{ $menu->description }}
                    </p>

                    <a href="{{ route('menu-recommendations.show', $menu) }}"
                       class="mt-4 inline-flex rounded-full border border-[#dce7d2] px-4 py-1.5 text-sm font-black text-[#31572c] transition hover:bg-[#f5f9ef]">
                        Detail Menu
                    </a>
                </div>
            </article>
        @empty
            <div class="rounded-3xl border border-dashed border-[#cbdab9] bg-[#f5f9ef] p-10 text-center text-[#607060] md:col-span-2 xl:col-span-3">
                Rekomendasi menu tidak ditemukan.
            </div>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $menus->links() }}
    </div>
</section>
@endsection
