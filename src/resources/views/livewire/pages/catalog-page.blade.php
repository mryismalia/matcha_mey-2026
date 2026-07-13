<div class="bg-[#F5F5F0] min-h-screen py-10">

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- HERO SECTION --}}
        <div class="overflow-hidden rounded-[36px] bg-gradient-to-r from-[#F5FAED] to-[#E7F2D6] border border-[#E2E9D3] shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-8 p-8 lg:p-12">

                {{-- LEFT CONTENT --}}
                <div>
                    <p class="text-[#6B8E23] tracking-[0.2em] font-extrabold text-sm md:text-base uppercase">
                        Katalog
                    </p>

                    <h1 class="mt-4 text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight text-[#2D5016]">
                        Katalog Menu Matcha
                    </h1>

                    <p class="mt-5 max-w-2xl text-[#566152] text-base md:text-lg leading-relaxed">
                        Temukan berbagai jenis matcha dengan karakter rasa, aroma,
                        dan kualitas terbaik untuk kebutuhan minuman, dessert,
                        dan camilan favorit Anda.
                    </p>

                    {{-- FEATURE ICONS --}}
                    <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach ($features as $feature)
                            <div class="rounded-2xl bg-white/80 border border-[#E3EBCF] px-4 py-4 text-center shadow-sm">
                                <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-[#EEF4DF] border border-[#D4E2B8] text-[#3D6B1F]">
                                    @if ($feature['icon'] === 'leaf')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8C8 8 5 13 5 18c5 0 10-3 12-12zm0 0s-2 3-6 5" />
                                        </svg>
                                    @elseif ($feature['icon'] === 'whisk')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 3v6m4-6v6M7 10h10M8 10c0 5-2 8-2 8m10-8c0 5 2 8 2 8M9 18h6" />
                                        </svg>
                                    @elseif ($feature['icon'] === 'cup')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h9v5a4 4 0 01-4 4h-1a4 4 0 01-4-4V8zm9 1h2a2 2 0 010 4h-2M6 20h11" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21s-7-4.35-7-10a4 4 0 017-2.65A4 4 0 0119 11c0 5.65-7 10-7 10z" />
                                        </svg>
                                    @endif
                                </div>

                                <p class="text-sm font-bold text-[#2D5016] leading-snug">
                                    {{ $feature['title'] }}
                                </p>
                                <p class="text-sm font-medium text-[#2D5016] leading-snug">
                                    {{ $feature['subtitle'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- RIGHT ILLUSTRATION --}}
                <div class="relative">
                    <div class="absolute -top-4 -left-4 h-28 w-28 rounded-full bg-[#CFE7B1]/40 blur-2xl"></div>
                    <div class="absolute bottom-0 right-0 h-40 w-40 rounded-full bg-[#B7D88A]/30 blur-3xl"></div>

                    <div class="relative rounded-[32px] bg-white/50 p-4 border border-[#E3EBCF] shadow-sm">
                        <img
                            src="{{ asset('images/matcha/catalog/catalog-hero.png') }}"
                            alt="Katalog Matcha"
                            class="w-full rounded-[28px] object-cover"
                        >
                    </div>
                </div>
            </div>
        </div>

        {{-- FILTER SECTION --}}
        <div class="mt-8 rounded-[28px] bg-white border border-[#E6ECD8] shadow-sm px-5 py-5">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                <div class="flex flex-wrap gap-3">
                    @foreach ($categories as $category)
                        <button
                            type="button"
                            wire:click="setCategory('{{ $category }}')"
                            class="rounded-full px-5 py-3 text-sm font-semibold transition duration-300
                                {{ $selectedCategory === $category
                                    ? 'bg-[#2D5016] text-white shadow-md'
                                    : 'bg-[#EEF4DF] text-[#3D6B1F] hover:bg-[#DDEBC0] hover:scale-[1.02]' }}"
                        >
                            {{ $category }}
                        </button>
                    @endforeach
                </div>

                <div class="w-full lg:w-auto">
                    <div class="relative">
                        <select
                            wire:model.live="sortBy"
                            class="w-full lg:w-[200px] appearance-none rounded-2xl border border-[#DDE5C5] bg-[#FAFBF5] py-3 pl-11 pr-10 text-sm font-medium text-[#2D5016] focus:outline-none focus:ring-2 focus:ring-[#A8D5A8]"
                        >
                            <option value="default">Urutkan</option>
                            <option value="name_asc">Nama A-Z</option>
                            <option value="name_desc">Nama Z-A</option>
                            <option value="category">Kategori</option>
                        </select>

                        <div class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-[#6B8E23]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h18M6 12h12M10 19h4" />
                            </svg>
                        </div>

                        <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-[#6B8E23]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MENU GRID --}}
        <div class="mt-8 grid grid-cols-1 xl:grid-cols-2 gap-6">
            @forelse ($menus as $menu)
                <div class="group relative overflow-hidden rounded-[28px] border border-[#E6ECD8] bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg">

                    {{-- accent star --}}
                    <div class="absolute right-5 top-5 text-[#D4AF37] text-xl">✨</div>

                    {{-- TAGS --}}
                    <div class="mb-5 flex flex-wrap gap-2 pr-10">
                        <span class="rounded-full bg-[#EEF4DF] px-3 py-1.5 text-xs font-semibold text-[#3D6B1F]">
                            {{ $menu['badge'] }}
                        </span>

                        <span class="rounded-full bg-[#F3F5EA] px-3 py-1.5 text-xs font-semibold text-[#567046]">
                            {{ $menu['origin'] }}
                        </span>

                        <span class="rounded-full bg-[#F8F8F0] px-3 py-1.5 text-xs font-semibold text-[#567046]">
                            {{ $menu['taste'] }}
                        </span>
                    </div>

                    <div class="flex flex-col md:flex-row gap-6">
                        {{-- IMAGE --}}
                        <div class="w-full md:w-[180px] shrink-0">
                            <div class="rounded-[24px] bg-[#F7FAEF] border border-[#E6ECD8] p-4 h-full flex items-center justify-center">
                                <img
                                    src="{{ asset($menu['image']) }}"
                                    alt="{{ $menu['name'] }}"
                                    class="w-full max-w-[150px] object-contain transition duration-300 group-hover:scale-105"
                                >
                            </div>
                        </div>

                        {{-- CONTENT --}}
                        <div class="flex-1">
                            <div class="inline-flex rounded-full px-3 py-1 text-xs font-semibold
                                @if($menu['category'] === 'Drinks')
                                    bg-[#E7F1D8] text-[#2D5016]
                                @elseif($menu['category'] === 'Dessert')
                                    bg-[#FFF1E2] text-[#8A5A1F]
                                @else
                                    bg-[#F4ECD7] text-[#6F5B22]
                                @endif
                            ">
                                {{ $menu['category'] }}
                            </div>

                            <h3 class="mt-3 text-[28px] leading-tight font-extrabold text-[#2D5016]">
                                {{ $menu['name'] }}
                            </h3>

                            <p class="mt-3 text-[15px] leading-8 text-[#586257]">
                                {{ $menu['description'] }}
                            </p>

                            <button
                                type="button"
                                class="mt-6 inline-flex items-center gap-2 text-[15px] font-semibold text-[#2D5016] transition duration-300 hover:gap-3 hover:text-[#3D6B1F]"
                            >
                                <span class="border-b border-[#2D5016] pb-0.5">Lihat Detail</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-[1px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="xl:col-span-2 rounded-[28px] bg-white border border-[#E6ECD8] p-8 text-center text-[#586257] shadow-sm">
                    Belum ada menu untuk kategori ini.
                </div>
            @endforelse
        </div>

        {{-- EXTRA SECTION --}}
        <div class="mt-8 grid grid-cols-1 xl:grid-cols-[1.3fr_0.9fr] gap-6">
            <div class="rounded-[28px] bg-white border border-[#E6ECD8] p-6 shadow-sm">
                <div class="flex flex-col md:flex-row gap-6 items-center">
                    <div class="w-full md:w-[180px] shrink-0">
                        <div class="rounded-[24px] bg-[#F7FAEF] border border-[#E6ECD8] p-4">
                            <img
                                src="{{ asset('images/matcha/catalog/premium-latte-matcha.png') }}"
                                alt="Premium Latte Matcha"
                                class="w-full max-w-[150px] mx-auto object-contain"
                            >
                        </div>
                    </div>

                    <div class="flex-1">
                        <div class="mb-3 flex flex-wrap gap-2">
                            <span class="rounded-full bg-[#EEF4DF] px-3 py-1.5 text-xs font-semibold text-[#3D6B1F]">
                                Premium
                            </span>
                            <span class="rounded-full bg-[#F3F5EA] px-3 py-1.5 text-xs font-semibold text-[#567046]">
                                Nishio, Japan
                            </span>
                            <span class="rounded-full bg-[#F8F8F0] px-3 py-1.5 text-xs font-semibold text-[#567046]">
                                Creamy, Sweet, Balanced
                            </span>
                        </div>

                        <h3 class="text-[28px] font-extrabold text-[#2D5016]">
                            Premium Latte Matcha
                        </h3>

                        <p class="mt-3 text-[15px] leading-8 text-[#586257]">
                            Matcha dengan rasa seimbang antara lembut dan kuat,
                            cocok untuk olahan minuman modern.
                        </p>

                        <button
                            type="button"
                            class="mt-6 inline-flex items-center gap-2 text-[15px] font-semibold text-[#2D5016] transition duration-300 hover:gap-3 hover:text-[#3D6B1F]"
                        >
                            <span class="border-b border-[#2D5016] pb-0.5">Lihat Detail</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-[1px]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="rounded-[28px] bg-[#F7FAEF] border border-[#E6ECD8] p-6 shadow-sm">
                <h3 class="text-2xl font-extrabold text-[#2D5016]">
                    Cocok untuk:
                </h3>

                <div class="mt-5 grid grid-cols-2 gap-4">
                    <div class="rounded-2xl bg-white border border-[#E3EBCF] p-4 text-center">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-[#EEF4DF] text-[#3D6B1F] border border-[#D4E2B8]">
                            ☕
                        </div>
                        <p class="mt-3 text-sm font-semibold text-[#2D5016]">Matcha Latte</p>
                    </div>

                    <div class="rounded-2xl bg-white border border-[#E3EBCF] p-4 text-center">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-[#EEF4DF] text-[#3D6B1F] border border-[#D4E2B8]">
                            🥤
                        </div>
                        <p class="mt-3 text-sm font-semibold text-[#2D5016]">Blended Drink</p>
                    </div>

                    <div class="rounded-2xl bg-white border border-[#E3EBCF] p-4 text-center">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-[#EEF4DF] text-[#3D6B1F] border border-[#D4E2B8]">
                            🍰
                        </div>
                        <p class="mt-3 text-sm font-semibold text-[#2D5016]">Dessert</p>
                    </div>

                    <div class="rounded-2xl bg-white border border-[#E3EBCF] p-4 text-center">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-[#EEF4DF] text-[#3D6B1F] border border-[#D4E2B8]">
                            👨‍🍳
                        </div>
                        <p class="mt-3 text-sm font-semibold text-[#2D5016]">Baking</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- FAQ / CTA SECTION --}}
        <div class="mt-8 rounded-[28px] bg-white border border-[#E6ECD8] p-6 shadow-sm">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <div class="flex items-start gap-4">
                    <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-[#EEF4DF] border border-[#D4E2B8] text-[#3D6B1F]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8C8 8 5 13 5 18c5 0 10-3 12-12zm0 0s-2 3-6 5" />
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-2xl font-extrabold text-[#2D5016]">
                            Tidak yakin memilih yang mana?
                        </h3>
                        <p class="mt-2 text-[#586257] text-base leading-relaxed max-w-2xl">
                            Kami siap membantu Anda menemukan matcha yang paling sesuai
                            dengan kebutuhan, preferensi rasa, dan jenis olahan favorit Anda.
                        </p>
                    </div>
                </div>

                <button
                    type="button"
                    class="inline-flex items-center justify-center gap-3 rounded-2xl bg-[#2D5016] px-6 py-4 text-white font-semibold shadow-md transition duration-300 hover:scale-[1.02] hover:bg-[#3D6B1F]"
                >
                    Konsultasi Sekarang
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6" />
                    </svg>
                </button>
            </div>
        </div>

    </section>

</div>
