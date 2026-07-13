@php
    $keyword = trim((string) request()->query('q', ''));

    $searchItems = collect();

    if (isset($results)) {
        if ($results instanceof \Illuminate\Contracts\Pagination\Paginator) {
            $searchItems = collect($results->items());
        } elseif ($results instanceof \Illuminate\Support\Collection) {
            $searchItems = $results;
        } elseif (is_array($results)) {
            $searchItems = collect($results);
        } elseif (is_iterable($results)) {
            $searchItems = collect($results);
        }
    }
@endphp

<div
    style="
        min-height: 100vh;
        overflow-x: hidden;
        background: #fbfcf7;
        color: #17301b;
    "
>

    {{-- ========================================================= --}}
    {{-- HERO --}}
    {{-- ========================================================= --}}
    <section
        style="
            position: relative;
            min-height: 365px;
            overflow: hidden;
            background: linear-gradient(
                90deg,
                #edf5e3 0%,
                #faf9ef 50%,
                #eff5e5 100%
            );
            border-top: 1px solid #e1e7dc;
        "
    >

        {{-- Dekorasi kiri --}}
        <div
            aria-hidden="true"
            style="
                position: absolute;
                left: -55px;
                top: 35px;
                width: 310px;
                height: 260px;
                pointer-events: none;
                opacity: 0.95;
                z-index: 1;
            "
        >
            <svg
                width="100%"
                height="100%"
                viewBox="0 0 310 260"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <circle
                    cx="95"
                    cy="158"
                    r="67"
                    fill="#E9E9DD"
                />

                <circle
                    cx="95"
                    cy="158"
                    r="51"
                    fill="#FAFAF3"
                />

                <circle
                    cx="95"
                    cy="158"
                    r="40"
                    fill="#718A4E"
                />

                <path
                    d="M39 103C75 62 142 58 188 94"
                    stroke="#829B5E"
                    stroke-width="6"
                    stroke-linecap="round"
                    stroke-dasharray="2 14"
                />

                <path
                    d="M204 118C208 66 224 38 252 19C267 57 250 92 204 118Z"
                    fill="#A7BD59"
                />

                <path
                    d="M203 118C222 80 239 48 251 22"
                    stroke="#5B7137"
                    stroke-width="4"
                    stroke-linecap="round"
                />

                <path
                    d="M147 120C145 83 155 60 176 46C190 73 181 99 147 120Z"
                    fill="#779540"
                />

                <path
                    d="M147 120C158 91 167 67 175 48"
                    stroke="#506B32"
                    stroke-width="3"
                    stroke-linecap="round"
                />
            </svg>
        </div>

        {{-- Dekorasi kanan --}}
        <div
            aria-hidden="true"
            style="
                position: absolute;
                right: -35px;
                top: 28px;
                width: 320px;
                height: 275px;
                pointer-events: none;
                opacity: 0.95;
                z-index: 1;
            "
        >
            <svg
                width="100%"
                height="100%"
                viewBox="0 0 320 275"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M67 270C118 204 172 137 245 45"
                    stroke="#607A3F"
                    stroke-width="6"
                    stroke-linecap="round"
                />

                <path
                    d="M166 168C129 127 128 92 138 59C174 69 194 101 166 168Z"
                    fill="#8EAA4D"
                />

                <path
                    d="M166 168C160 130 152 94 140 63"
                    stroke="#5A7338"
                    stroke-width="3"
                    stroke-linecap="round"
                />

                <path
                    d="M206 118C202 75 219 43 247 26C267 58 258 91 206 118Z"
                    fill="#A5BB5A"
                />

                <path
                    d="M206 118C224 91 238 61 246 30"
                    stroke="#657D40"
                    stroke-width="3"
                    stroke-linecap="round"
                />

                <path
                    d="M127 221C91 194 77 163 80 135C112 136 139 158 127 221Z"
                    fill="#75913F"
                />

                <path
                    d="M127 221C115 188 98 158 82 139"
                    stroke="#526E34"
                    stroke-width="3"
                    stroke-linecap="round"
                />
            </svg>
        </div>

        {{-- Isi hero --}}
        <div
            style="
                position: relative;
                z-index: 3;
                max-width: 1200px;
                margin: 0 auto;
                padding: 28px 20px 145px;
                text-align: center;
                box-sizing: border-box;
            "
        >
            {{-- Badge --}}
            <div
                style="
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    gap: 10px;
                    min-height: 50px;
                    margin-bottom: 28px;
                    padding: 0 24px;
                    border: 1px solid #d9e2d2;
                    border-radius: 999px;
                    background: rgba(255, 255, 255, 0.82);
                    color: #17301b;
                    font-size: 17px;
                    font-weight: 600;
                    box-shadow: 0 4px 12px rgba(31, 58, 30, 0.08);
                    box-sizing: border-box;
                "
            >
                <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="M20 20L16.5 16.5"></path>
                </svg>

                <span>Search</span>
            </div>

            <h1
                style="
                    margin: 0;
                    color: #17301b;
                    font-family: Georgia, 'Times New Roman', serif;
                    font-size: clamp(42px, 5vw, 64px);
                    font-weight: 700;
                    line-height: 1.08;
                    letter-spacing: -1px;
                "
            >
                Hasil Pencarian
            </h1>

            <p
                style="
                    max-width: 720px;
                    margin: 28px auto 0;
                    color: #4f6252;
                    font-size: clamp(16px, 2vw, 20px);
                    line-height: 1.7;
                "
            >
                Cari data matcha, artikel edukasi, atau rekomendasi menu.
            </p>
        </div>

        {{-- Gelombang --}}
        <div
            aria-hidden="true"
            style="
                position: absolute;
                left: 0;
                right: 0;
                bottom: -1px;
                width: 100%;
                height: 110px;
                pointer-events: none;
                z-index: 2;
            "
        >
            <svg
                width="100%"
                height="100%"
                viewBox="0 0 1440 130"
                preserveAspectRatio="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M0 75C176 22 350 33 520 68C700 106 884 113 1075 70C1232 34 1337 32 1440 64V130H0V75Z"
                    fill="#fbfcf7"
                />
            </svg>
        </div>
    </section>

    {{-- ========================================================= --}}
    {{-- FORM SEARCH --}}
    {{-- ========================================================= --}}
    <section
        style="
            position: relative;
            z-index: 10;
            max-width: 1200px;
            margin: -42px auto 0;
            padding: 0 20px;
            box-sizing: border-box;
        "
    >
        <form
            id="matcha-search-form"
            method="GET"
            action="{{ url()->current() }}"
            style="
                width: 100%;
                margin: 0 auto;
                padding: clamp(24px, 4vw, 38px);
                border: 1px solid #e0e6db;
                border-radius: 28px;
                background: #ffffff;
                box-shadow: 0 18px 45px rgba(33, 62, 31, 0.12);
                box-sizing: border-box;
            "
        >
            <label
                for="matcha-search-input"
                style="
                    display: block;
                    margin: 0 0 18px;
                    color: #214520;
                    font-family: Georgia, 'Times New Roman', serif;
                    font-size: clamp(19px, 2vw, 23px);
                    font-weight: 700;
                    line-height: 1.3;
                "
            >
                Masukkan kata kunci
            </label>

            {{-- Input dan tombol --}}
            <div
                style="
                    display: flex;
                    flex-wrap: wrap;
                    align-items: stretch;
                    gap: 16px;
                    width: 100%;
                "
            >
                <div
                    style="
                        position: relative;
                        flex: 999 1 650px;
                        min-width: 240px;
                    "
                >
                    <div
                        aria-hidden="true"
                        style="
                            position: absolute;
                            left: 20px;
                            top: 50%;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: #7f8b81;
                            transform: translateY(-50%);
                            pointer-events: none;
                            z-index: 2;
                        "
                    >
                        <svg
                            width="25"
                            height="25"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="M20 20L16.5 16.5"></path>
                        </svg>
                    </div>

                    <input
                        id="matcha-search-input"
                        type="search"
                        name="q"
                        value="{{ $keyword }}"
                        autocomplete="off"
                        placeholder="Cari matcha, artikel, atau menu..."
                        style="
                            display: block;
                            width: 100%;
                            height: 64px;
                            padding: 0 22px 0 58px;
                            border: 1px solid #d7ddd3;
                            border-radius: 17px;
                            outline: none;
                            background: #ffffff;
                            color: #263529;
                            font-family: inherit;
                            font-size: 17px;
                            line-height: 64px;
                            box-sizing: border-box;
                        "
                    >
                </div>

                <button
                    type="submit"
                    style="
                        flex: 1 1 160px;
                        width: 100%;
                        max-width: 180px;
                        min-width: 145px;
                        height: 64px;
                        padding: 0 24px;
                        border: 0 !important;
                        border-radius: 17px;
                        background: linear-gradient(
                            135deg,
                            #355f2d 0%,
                            #527c39 100%
                        ) !important;
                        color: #ffffff !important;
                        font-family: inherit;
                        font-size: 17px;
                        font-weight: 700;
                        cursor: pointer;
                        box-shadow: 0 10px 22px rgba(54, 95, 45, 0.22);
                        box-sizing: border-box;
                    "
                >
                    <span
                        style="
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            gap: 10px;
                            color: #ffffff !important;
                        "
                    >
                        <svg
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.9"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="M20 20L16.5 16.5"></path>
                        </svg>

                        <span>Search</span>
                    </span>
                </button>
            </div>

            {{-- Quick search --}}
            <div
                style="
                    display: flex;
                    flex-wrap: wrap;
                    align-items: center;
                    gap: 12px;
                    margin-top: 24px;
                "
            >
                {{-- Matcha Latte --}}
                <button
                    type="button"
                    data-search-keyword="Matcha Latte"
                    class="quick-search-button"
                    style="
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        gap: 10px;
                        min-height: 44px;
                        padding: 0 18px;
                        border: 1px solid #d9e1d3 !important;
                        border-radius: 999px;
                        background: #fcfdf9 !important;
                        color: #29392c !important;
                        font-size: 14px;
                        font-weight: 600;
                        cursor: pointer;
                        box-sizing: border-box;
                    "
                >
                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M4 7H16V13A5 5 0 0 1 11 18H9A5 5 0 0 1 4 13V7Z"></path>
                        <path d="M16 9H17A3 3 0 0 1 17 15H16"></path>
                        <path d="M6 21H16"></path>
                        <path d="M8 3V5"></path>
                        <path d="M12 3V5"></path>
                    </svg>

                    <span>Matcha Latte</span>
                </button>

                {{-- Ceremonial --}}
                <button
                    type="button"
                    data-search-keyword="Ceremonial"
                    class="quick-search-button"
                    style="
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        gap: 10px;
                        min-height: 44px;
                        padding: 0 18px;
                        border: 1px solid #d9e1d3 !important;
                        border-radius: 999px;
                        background: #fcfdf9 !important;
                        color: #29392c !important;
                        font-size: 14px;
                        font-weight: 600;
                        cursor: pointer;
                        box-sizing: border-box;
                    "
                >
                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M20 4C13 4 7 7 5 13C4 16 6 19 9 19C16 19 19 11 20 4Z"></path>
                        <path d="M4 20C7 15 11 12 16 9"></path>
                    </svg>

                    <span>Ceremonial</span>
                </button>

                {{-- Dessert --}}
                <button
                    type="button"
                    data-search-keyword="Dessert"
                    class="quick-search-button"
                    style="
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        gap: 10px;
                        min-height: 44px;
                        padding: 0 18px;
                        border: 1px solid #d9e1d3 !important;
                        border-radius: 999px;
                        background: #fcfdf9 !important;
                        color: #29392c !important;
                        font-size: 14px;
                        font-weight: 600;
                        cursor: pointer;
                        box-sizing: border-box;
                    "
                >
                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M4 10H20V20H4V10Z"></path>
                        <path d="M6 10A6 6 0 0 1 18 10"></path>
                        <path d="M8 6H16"></path>
                        <path d="M4 14H20"></path>
                    </svg>

                    <span>Dessert</span>
                </button>

                {{-- Artikel --}}
                <button
                    type="button"
                    data-search-keyword="Artikel Matcha"
                    class="quick-search-button"
                    style="
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        gap: 10px;
                        min-height: 44px;
                        padding: 0 18px;
                        border: 1px solid #d9e1d3 !important;
                        border-radius: 999px;
                        background: #fcfdf9 !important;
                        color: #29392c !important;
                        font-size: 14px;
                        font-weight: 600;
                        cursor: pointer;
                        box-sizing: border-box;
                    "
                >
                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M4 5.5A2.5 2.5 0 0 1 6.5 3H11V19H6.5A2.5 2.5 0 0 0 4 21.5V5.5Z"></path>
                        <path d="M20 5.5A2.5 2.5 0 0 0 17.5 3H13V19H17.5A2.5 2.5 0 0 1 20 21.5V5.5Z"></path>
                    </svg>

                    <span>Artikel Matcha</span>
                </button>

                {{-- Rekomendasi --}}
                <button
                    type="button"
                    data-search-keyword="Rekomendasi Menu"
                    class="quick-search-button"
                    style="
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        gap: 10px;
                        min-height: 44px;
                        padding: 0 18px;
                        border: 1px solid #d9e1d3 !important;
                        border-radius: 999px;
                        background: #fcfdf9 !important;
                        color: #29392c !important;
                        font-size: 14px;
                        font-weight: 600;
                        cursor: pointer;
                        box-sizing: border-box;
                    "
                >
                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M12 3L14.3 7.7L19.5 8.5L15.7 12.2L16.6 17.4L12 14.9L7.4 17.4L8.3 12.2L4.5 8.5L9.7 7.7L12 3Z"></path>
                    </svg>

                    <span>Rekomendasi Menu</span>
                </button>
            </div>
        </form>
    </section>

    {{-- ========================================================= --}}
    {{-- HASIL PENCARIAN --}}
    {{-- Tidak muncul sebelum pengguna mencari --}}
    {{-- ========================================================= --}}
    @if ($keyword !== '')
        <section
            style="
                max-width: 1200px;
                margin: 0 auto;
                padding: 54px 20px 80px;
                box-sizing: border-box;
            "
        >
            <div
                style="
                    display: flex;
                    align-items: center;
                    gap: 13px;
                    margin-bottom: 25px;
                "
            >
                <div
                    style="
                        display: flex;
                        flex: 0 0 42px;
                        width: 42px;
                        height: 42px;
                        align-items: center;
                        justify-content: center;
                        border-radius: 50%;
                        background: #e7efd8;
                        color: #4c713c;
                    "
                >
                    <svg
                        width="21"
                        height="21"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M20 4C13 4 7 7 5 13C4 16 6 19 9 19C16 19 19 11 20 4Z"></path>
                        <path d="M4 20C7 15 11 12 16 9"></path>
                    </svg>
                </div>

                <div>
                    <h2
                        style="
                            margin: 0;
                            color: #17301b;
                            font-family: Georgia, 'Times New Roman', serif;
                            font-size: 25px;
                            font-weight: 700;
                        "
                    >
                        Hasil Pencarian
                    </h2>

                    <p
                        style="
                            margin: 4px 0 0;
                            color: #718073;
                            font-size: 14px;
                        "
                    >
                        Hasil untuk
                        <strong style="color: #416436;">
                            “{{ $keyword }}”
                        </strong>
                    </p>
                </div>
            </div>

            @if ($searchItems->isEmpty())
                <div
                    style="
                        padding: 55px 24px;
                        border: 1px dashed #cdd9bc;
                        border-radius: 26px;
                        background: #f8fbf2;
                        text-align: center;
                        box-sizing: border-box;
                    "
                >
                    <div
                        style="
                            display: flex;
                            width: 64px;
                            height: 64px;
                            margin: 0 auto;
                            align-items: center;
                            justify-content: center;
                            border-radius: 50%;
                            background: #e8f0db;
                            color: #557646;
                        "
                    >
                        <svg
                            width="31"
                            height="31"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.6"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <circle cx="11" cy="11" r="7"></circle>
                            <path d="M20 20L16.5 16.5"></path>
                            <path d="M8.5 9.5H13.5"></path>
                        </svg>
                    </div>

                    <h3
                        style="
                            margin: 20px 0 0;
                            color: #243b24;
                            font-family: Georgia, 'Times New Roman', serif;
                            font-size: 22px;
                            font-weight: 700;
                        "
                    >
                        Data belum ditemukan
                    </h3>

                    <p
                        style="
                            max-width: 550px;
                            margin: 10px auto 0;
                            color: #718073;
                            font-size: 15px;
                            line-height: 1.7;
                        "
                    >
                        Belum ada data yang cocok dengan kata kunci
                        “{{ $keyword }}”. Coba gunakan kata kunci lainnya.
                    </p>
                </div>
            @else
                <div
                    style="
                        display: grid;
                        grid-template-columns:
                            repeat(auto-fit, minmax(280px, 1fr));
                        gap: 22px;
                    "
                >
                    @foreach ($searchItems as $item)
                        @php
                            $title =
                                data_get($item, 'title')
                                ?? data_get($item, 'name')
                                ?? data_get($item, 'nama')
                                ?? 'Data Matcha';

                            $description =
                                data_get($item, 'description')
                                ?? data_get($item, 'excerpt')
                                ?? data_get($item, 'deskripsi')
                                ?? '';

                            $type =
                                data_get($item, 'type')
                                ?? data_get($item, 'category.name')
                                ?? data_get($item, 'category')
                                ?? data_get($item, 'kategori')
                                ?? 'Matcha';

                            $detailUrl =
                                data_get($item, 'url')
                                ?? data_get($item, 'detail_url')
                                ?? '#';

                            $image =
                                data_get($item, 'image')
                                ?? data_get($item, 'thumbnail')
                                ?? data_get($item, 'gambar');

                            $imageUrl = null;

                            if (!empty($image)) {
                                $image = (string) $image;

                                if (
                                    \Illuminate\Support\Str::startsWith(
                                        $image,
                                        ['http://', 'https://']
                                    )
                                ) {
                                    $imageUrl = $image;
                                } elseif (
                                    \Illuminate\Support\Str::startsWith(
                                        $image,
                                        ['/storage/', 'storage/']
                                    )
                                ) {
                                    $imageUrl = asset(ltrim($image, '/'));
                                } else {
                                    $imageUrl = asset(
                                        'storage/' . ltrim($image, '/')
                                    );
                                }
                            }
                        @endphp

                        <article
                            style="
                                overflow: hidden;
                                padding: 14px;
                                border: 1px solid #e1e6da;
                                border-radius: 22px;
                                background: #ffffff;
                                box-shadow: 0 8px 25px rgba(33, 62, 31, 0.08);
                                box-sizing: border-box;
                            "
                        >
                            <div
                                style="
                                    width: 100%;
                                    height: 210px;
                                    overflow: hidden;
                                    border-radius: 16px;
                                    background: linear-gradient(
                                        135deg,
                                        #dfeacb,
                                        #8da665
                                    );
                                "
                            >
                                @if ($imageUrl)
                                    <img
                                        src="{{ $imageUrl }}"
                                        alt="{{ $title }}"
                                        style="
                                            display: block;
                                            width: 100%;
                                            height: 100%;
                                            object-fit: cover;
                                        "
                                    >
                                @else
                                    <div
                                        style="
                                            display: flex;
                                            width: 100%;
                                            height: 100%;
                                            align-items: center;
                                            justify-content: center;
                                            color: #ffffff;
                                        "
                                    >
                                        <svg
                                            width="60"
                                            height="60"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="1.2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            aria-hidden="true"
                                        >
                                            <path d="M20 4C13 4 7 7 5 13C4 16 6 19 9 19C16 19 19 11 20 4Z"></path>
                                            <path d="M4 20C7 15 11 12 16 9"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <div style="padding: 18px 4px 5px;">
                                <span
                                    style="
                                        display: inline-block;
                                        padding: 6px 12px;
                                        border-radius: 999px;
                                        background: #e4edce;
                                        color: #486738;
                                        font-size: 12px;
                                        font-weight: 700;
                                    "
                                >
                                    {{ is_string($type) ? $type : 'Matcha' }}
                                </span>

                                <h3
                                    style="
                                        margin: 14px 0 0;
                                        color: #1b321d;
                                        font-family: Georgia, 'Times New Roman', serif;
                                        font-size: 21px;
                                        font-weight: 700;
                                        line-height: 1.35;
                                    "
                                >
                                    {{ $title }}
                                </h3>

                                @if (!empty($description))
                                    <p
                                        style="
                                            margin: 10px 0 0;
                                            color: #68746a;
                                            font-size: 14px;
                                            line-height: 1.7;
                                        "
                                    >
                                        {{ \Illuminate\Support\Str::limit(
                                            strip_tags((string) $description),
                                            125
                                        ) }}
                                    </p>
                                @endif

                                <a
                                    href="{{ $detailUrl }}"
                                    style="
                                        display: inline-flex;
                                        align-items: center;
                                        gap: 8px;
                                        margin-top: 18px;
                                        color: #426d35;
                                        font-size: 14px;
                                        font-weight: 700;
                                        text-decoration: none;
                                    "
                                >
                                    <span>Lihat Detail</span>

                                    <svg
                                        width="17"
                                        height="17"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        aria-hidden="true"
                                    >
                                        <path d="M5 12H19"></path>
                                        <path d="M13 6L19 12L13 18"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if (
                    isset($results)
                    && is_object($results)
                    && method_exists($results, 'links')
                )
                    <div style="margin-top: 35px;">
                        {{ $results->withQueryString()->links() }}
                    </div>
                @endif
            @endif
        </section>
    @else
        {{-- Kosong sebelum pengguna melakukan pencarian --}}
        <div style="height: 110px;"></div>
    @endif

    {{-- ========================================================= --}}
    {{-- QUICK SEARCH SCRIPT --}}
    {{-- ========================================================= --}}
    <script>
        (function () {
            function initializeSearchPage() {
                const form = document.getElementById('matcha-search-form');
                const input = document.getElementById('matcha-search-input');
                const buttons = document.querySelectorAll(
                    '.quick-search-button'
                );

                if (!form || !input) {
                    return;
                }

                buttons.forEach(function (button) {
                    if (button.dataset.searchInitialized === 'true') {
                        return;
                    }

                    button.dataset.searchInitialized = 'true';

                    button.addEventListener('click', function () {
                        const keyword =
                            button.getAttribute('data-search-keyword') || '';

                        input.value = keyword;
                        form.submit();
                    });
                });
            }

            document.addEventListener(
                'DOMContentLoaded',
                initializeSearchPage
            );

            document.addEventListener(
                'livewire:navigated',
                initializeSearchPage
            );

            initializeSearchPage();
        })();
    </script>
</div>
