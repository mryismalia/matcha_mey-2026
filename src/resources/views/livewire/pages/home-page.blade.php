<div>
    {{-- HERO --}}
    <section class="relative overflow-hidden bg-gradient-to-b from-[#f2f8ea] via-[#f7fbf2] to-white">
        <div class="pointer-events-none absolute -left-24 top-10 h-72 w-72 rounded-full bg-[#c7ddb0]/50 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-24 top-40 h-72 w-72 rounded-full bg-[#e4efd7]/80 blur-3xl"></div>

        <div class="relative mx-auto grid max-w-7xl gap-12 px-6 py-16 md:grid-cols-2 md:items-center md:py-24">
            <div class="max-w-2xl">
                <span class="inline-flex rounded-full bg-[#e6efd8] px-4 py-2 text-sm font-black text-[#31572c]">
                    Edukasi & Rekomendasi Matcha
                </span>

                <h1 class="mt-6 text-4xl font-black leading-tight tracking-tight text-[#1b2b1b] md:text-6xl">
                    {{ $hero?->title ?? 'Temukan dunia matcha yang lebih lembut, segar, dan penuh rasa.' }}
                </h1>

                <p class="mt-6 text-lg leading-8 text-[#607060]">
                    {{ $hero?->subtitle ?? 'Matcha Mey membantu kamu mengenal jenis matcha, membaca artikel edukasi, dan menemukan rekomendasi menu berdasarkan karakter rasa.' }}
                </p>

                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ $hero?->button_url ?? route('matchas.index') }}"
                       class="inline-flex items-center justify-center rounded-full bg-[#426c3a] px-6 py-3 text-sm font-black text-white shadow-md transition hover:-translate-y-0.5 hover:bg-[#31572c]">
                        {{ $hero?->button_label ?? 'Lihat Katalog' }}
                    </a>

                    <a href="{{ route('menu-recommendations.index') }}"
                       class="inline-flex items-center justify-center rounded-full border border-[#dce7d2] bg-white px-6 py-3 text-sm font-black text-[#31572c] shadow-sm transition hover:-translate-y-0.5 hover:bg-[#f5f9ef]">
                        Cari Rekomendasi
                    </a>
                </div>
            </div>

            <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#2f4f2f] to-[#90a955] p-8 text-white shadow-2xl md:p-10">
                <div class="absolute -bottom-20 -right-20 h-64 w-64 rounded-full bg-white/15"></div>

                <div class="relative">
                    <div class="mb-8 flex h-24 w-24 items-center justify-center rounded-[2rem] bg-white/15 text-5xl">
                        🍵
                    </div>

                    <h2 class="text-3xl font-black">
                        Pilih Matcha Sesuai Selera
                    </h2>

                    <p class="mt-4 max-w-md leading-7 text-white/80">
                        Temukan menu berdasarkan rasa creamy, bitter, sweet, tingkat kemanisan, dan jenis menu favoritmu.
                    </p>

                    <div class="mt-8 grid grid-cols-2 gap-3 sm:grid-cols-3">
                        @foreach (['Creamy', 'Sweet', 'Bitter', 'Drink', 'Dessert', 'Snack'] as $badge)
                            <span class="rounded-2xl bg-white/15 px-4 py-3 text-center text-sm font-black text-white">
                                {{ $badge }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CUSTOM SECTION DARI ADMIN --}}
    @if (isset($customSections) && $customSections->isNotEmpty())
        <section class="mx-auto max-w-7xl px-6 py-12">
            <div class="grid gap-6 md:grid-cols-2">
                @foreach ($customSections as $section)
                    <div class="rounded-[1.75rem] border border-[#e1ead8] bg-white p-7 shadow-sm">
                        @if ($section->image)
                            <img
                                src="{{ asset('storage/' . $section->image) }}"
                                alt="{{ $section->title }}"
                                class="mb-5 h-56 w-full rounded-3xl object-cover"
                            >
                        @endif

                        <span class="inline-flex rounded-full bg-[#f3f8ed] px-3 py-1 text-xs font-black text-[#31572c]">
                            {{ str_replace('_', ' ', $section->section) }}
                        </span>

                        @if ($section->title)
                            <h2 class="mt-4 text-2xl font-black text-[#1b2b1b]">
                                {{ $section->title }}
                            </h2>
                        @endif

                        @if ($section->subtitle)
                            <p class="mt-3 leading-7 text-[#607060]">
                                {{ $section->subtitle }}
                            </p>
                        @endif

                        @if ($section->content)
                            <div class="mt-4 leading-8 text-[#607060]">
                                {!! $section->content !!}
                            </div>
                        @endif

                        @if ($section->button_label && $section->button_url)
                            <a href="{{ $section->button_url }}"
                               class="mt-6 inline-flex rounded-full bg-[#426c3a] px-5 py-3 text-sm font-black text-white shadow-sm transition hover:bg-[#31572c]">
                                {{ $section->button_label }}
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- KATALOG MATCHA --}}
    <section class="mx-auto max-w-7xl px-6 py-16">
        <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="text-sm font-black uppercase tracking-[0.2em] text-[#78935d]">Katalog</span>
                <h2 class="mt-2 text-3xl font-black tracking-tight text-[#1b2b1b] md:text-4xl">
                    {{ $matchaSection?->title ?? 'Katalog Jenis Matcha' }}
                </h2>
                <p class="mt-3 max-w-2xl leading-7 text-[#607060]">
                    {{ $matchaSection?->subtitle ?? 'Kenali karakter, grade, origin, dan penggunaan dari berbagai jenis matcha.' }}
                </p>
            </div>

            <a href="{{ route('matchas.index') }}"
               class="w-fit rounded-full border border-[#dce7d2] bg-white px-5 py-3 text-sm font-black text-[#31572c] shadow-sm transition hover:bg-[#f5f9ef]">
                Lihat Semua
            </a>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @forelse ($matchas as $matcha)
                <article class="group overflow-hidden rounded-[1.75rem] border border-[#e1ead8] bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="flex aspect-[4/3] items-center justify-center bg-gradient-to-br from-[#eef5e5] to-[#bad18b]">
                        <span class="text-3xl font-black text-[#31572c]">Matcha</span>
                    </div>

                    <div class="p-5">
                        <div class="mb-3 flex flex-wrap gap-2">
                            <span class="rounded-full bg-[#f3f8ed] px-3 py-1 text-xs font-black text-[#31572c]">
                                {{ $matcha->grade }}
                            </span>
                            <span class="rounded-full bg-[#f3f8ed] px-3 py-1 text-xs font-black text-[#31572c]">
                                {{ $matcha->origin }}
                            </span>
                        </div>

                        <h3 class="text-xl font-black text-[#1c2f1c]">
                            {{ $matcha->name }}
                        </h3>

                        <p class="mt-2 line-clamp-3 leading-6 text-[#607060]">
                            {{ $matcha->description }}
                        </p>

                        <a href="{{ route('matchas.show', $matcha) }}"
                           class="mt-4 inline-flex rounded-full border border-[#dce7d2] px-4 py-1.5 text-sm font-black text-[#31572c] transition hover:bg-[#f5f9ef]">
                            Detail
                        </a>
                    </div>
                </article>
            @empty
                <div class="rounded-3xl border border-dashed border-[#cbdab9] bg-[#f5f9ef] p-10 text-center text-[#607060] md:col-span-2 xl:col-span-3">
                    Data jenis matcha belum tersedia.
                </div>
            @endforelse
        </div>
    </section>
</div>
