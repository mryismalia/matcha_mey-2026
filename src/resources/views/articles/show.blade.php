@php
    use Illuminate\Support\Carbon;

    $title = data_get($article ?? null, 'title', 'Mengenal Matcha dan Perbedaannya dengan Green Tea');
    $excerpt = data_get($article ?? null, 'excerpt', 'Matcha dan green tea berasal dari tanaman yang sama, yaitu Camellia sinensis. Meskipun keduanya termasuk kategori teh hijau, terdapat perbedaan pada proses budidaya, pengolahan, penyajian, dan karakter rasanya.');
    $content = data_get($article ?? null, 'content');
    $publishedDate = $article?->published_at
        ? Carbon::parse($article->published_at)->translatedFormat('d M Y')
        : '12 Jul 2026';

    $imageUrl = $article?->thumbnail_url ?? asset('images/articles/default-article.webp');

    $currentUrl = urlencode(request()->fullUrl());
    $shareTitle = urlencode($title);
@endphp

<div class="article-detail-page">

    <main class="article-detail-container">

        {{-- MAIN ARTICLE --}}
        <article class="article-main-card">

            <div class="article-category">
                Artikel Edukasi
            </div>

            <h1 class="article-title">
                {{ $title }}
            </h1>

            <div class="article-meta">
                <span>Dipublikasikan: {{ $publishedDate }}</span>
                <span class="article-meta-dot">•</span>
                <span>6 menit membaca</span>
            </div>

            <div class="article-cover-wrapper">
                <img
                    src="{{ $imageUrl }}"
                    alt="{{ $title }}"
                    class="article-cover"
                    onerror="this.src='{{ asset('images/articles/default-article.webp') }}'"
                >
            </div>

            @if ($content)
                <div class="article-body">
                    {!! $content !!}
                </div>
            @else
                <div class="article-body">

                    <p class="article-introduction">
                        {{ $excerpt }}
                    </p>

                    <section class="article-section">
                        <h2>1. Proses Penanaman</h2>

                        <p>
                            Daun untuk matcha biasanya ditanam dengan metode peneduhan
                            sekitar 20–30 hari sebelum dipanen. Proses ini membantu
                            meningkatkan kandungan klorofil dan asam amino sehingga
                            menghasilkan warna hijau yang lebih cerah serta rasa umami
                            yang khas.
                        </p>

                        <p>
                            Sementara itu, daun green tea pada umumnya ditanam tanpa
                            proses peneduhan khusus sehingga menghasilkan karakter rasa
                            yang lebih ringan dan segar.
                        </p>
                    </section>

                    <section class="article-section">
                        <h2>2. Proses Pengolahan</h2>

                        <p>
                            Setelah dipanen, daun matcha dikukus, dikeringkan, kemudian
                            digiling menggunakan batu penggiling hingga menjadi bubuk
                            yang sangat halus. Bubuk tersebut nantinya dikonsumsi secara
                            keseluruhan.
                        </p>

                        <p>
                            Green tea biasanya dikeringkan dalam bentuk daun. Saat
                            disajikan, daun tersebut hanya diseduh menggunakan air panas,
                            kemudian daun tehnya dipisahkan dari air seduhan.
                        </p>
                    </section>

                    <section class="article-section">
                        <h2>3. Cara Penyajian</h2>

                        <p>
                            Matcha disajikan dengan melarutkan bubuk matcha ke dalam air
                            panas atau susu, kemudian diaduk menggunakan chasen hingga
                            menghasilkan lapisan busa yang lembut.
                        </p>

                        <p>
                            Berbeda dengan matcha, green tea dibuat dengan menyeduh daun
                            teh kering menggunakan air panas. Hanya air hasil seduhannya
                            yang kemudian diminum.
                        </p>
                    </section>

                    <section class="article-section">
                        <h2>4. Rasa dan Karakter</h2>

                        <p>
                            Matcha memiliki rasa yang lebih pekat, creamy, sedikit pahit,
                            dan kaya akan rasa umami. Teksturnya juga terasa lebih kental
                            karena bubuk daun teh ikut dikonsumsi.
                        </p>

                        <p>
                            Green tea cenderung memiliki rasa yang lebih ringan, segar,
                            dan terkadang sedikit sepat tergantung suhu serta durasi
                            penyeduhannya.
                        </p>
                    </section>

                    <section class="article-section">
                        <h2>5. Kandungan Matcha dan Green Tea</h2>

                        <p>
                            Karena seluruh bubuk daun dikonsumsi, matcha umumnya memiliki
                            kandungan senyawa teh dan kafein yang lebih terkonsentrasi.
                            Sedangkan pada green tea, kandungan yang dikonsumsi berasal
                            dari senyawa yang larut selama proses penyeduhan.
                        </p>
                    </section>

                    <div class="article-conclusion">
                        <div class="conclusion-icon">
                            🍃
                        </div>

                        <div>
                            <h3>Kesimpulan</h3>

                            <p>
                                Matcha merupakan salah satu jenis green tea, tetapi tidak
                                semua green tea dapat disebut matcha. Perbedaan utamanya
                                terletak pada proses budidaya, pengolahan, cara penyajian,
                                rasa, dan bentuk produk akhirnya.
                            </p>
                        </div>
                    </div>

                </div>
            @endif

            <div class="article-bottom-action">
                <a
                    href="{{ route('articles.index') }}"
                    wire:navigate
                    class="back-button"
                >
                    <span>←</span>
                    Kembali ke Artikel
                </a>
            </div>

        </article>

        {{-- SIDEBAR --}}
        <aside class="article-sidebar">

            {{-- SHARE --}}
            <section class="sidebar-card">
                <h2 class="sidebar-title">
                    Bagikan Artikel
                </h2>

                <div class="share-buttons">

                    <a
                        href="https://www.facebook.com/sharer/sharer.php?u={{ $currentUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="share-button facebook"
                        aria-label="Bagikan ke Facebook"
                    >
                        f
                    </a>

                    <a
                        href="https://twitter.com/intent/tweet?url={{ $currentUrl }}&text={{ $shareTitle }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="share-button twitter"
                        aria-label="Bagikan ke X"
                    >
                        X
                    </a>

                    <a
                        href="https://wa.me/?text={{ $shareTitle }}%20{{ $currentUrl }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="share-button whatsapp"
                        aria-label="Bagikan ke WhatsApp"
                    >
                        WA
                    </a>

                    <button
                        type="button"
                        class="share-button copy-link"
                        aria-label="Salin link artikel"
                        onclick="
                            navigator.clipboard.writeText('{{ request()->fullUrl() }}');
                            this.innerText = '✓';
                            setTimeout(() => this.innerText = '↗', 1500);
                        "
                    >
                        ↗
                    </button>

                </div>
            </section>

            {{-- POPULAR ARTICLES --}}
            <section class="sidebar-card">
                <h2 class="sidebar-title">
                    Artikel Populer
                </h2>

                <div class="popular-article-list">

                    @forelse (($popularArticles ?? []) as $popularArticle)
                        @php
                            $popularImageUrl = $popularArticle->thumbnail_url ?? asset('images/articles/default-article.webp');
                            $popularDate = data_get($popularArticle, 'published_at');
                            $popularSlug = data_get($popularArticle, 'slug');
                        @endphp

                        <a
                            href="{{ route('articles.show', $popularSlug) }}"
                            wire:navigate
                            class="popular-article-item"
                        >
                            <img
                                src="{{ $popularImageUrl }}"
                                alt="{{ data_get($popularArticle, 'title') }}"
                                class="popular-article-image"
                                loading="lazy"
                                onerror="this.src='{{ asset('images/articles/default-article.webp') }}'"
                            >

                            <div class="popular-article-content">
                                <h3>
                                    {{ data_get($popularArticle, 'title') }}
                                </h3>

                                <span>
                                    {{ $popularDate
                                        ? Carbon::parse($popularDate)->translatedFormat('d M Y')
                                        : '-'
                                    }}
                                </span>
                            </div>
                        </a>
                    @empty
                        <a
                            href="{{ route('articles.show', 'cara-memilih-matcha-berdasarkan-grade') }}"
                            wire:navigate
                            class="popular-article-item"
                        >
                            <img
                                src="{{ asset('images/articles/default-article.webp') }}"
                                alt="Cara Memilih Matcha Berdasarkan Grade"
                                class="popular-article-image"
                            >

                            <div class="popular-article-content">
                                <h3>
                                    Cara Memilih Matcha Berdasarkan Grade
                                </h3>

                                <span>10 Jul 2026</span>
                            </div>
                        </a>

                        <a
                            href="{{ route('articles.show', 'manfaat-matcha-untuk-kesehatan') }}"
                            wire:navigate
                            class="popular-article-item"
                        >
                            <img
                                src="{{ asset('images/articles/default-article.webp') }}"
                                alt="Manfaat Matcha untuk Kesehatan"
                                class="popular-article-image"
                            >

                            <div class="popular-article-content">
                                <h3>
                                    5 Manfaat Matcha untuk Kesehatan
                                </h3>

                                <span>8 Jul 2026</span>
                            </div>
                        </a>

                        <a
                            href="{{ route('articles.show', 'peralatan-matcha') }}"
                            wire:navigate
                            class="popular-article-item"
                        >
                            <img
                                src="{{ asset('images/articles/default-article.webp') }}"
                                alt="Peralatan Matcha"
                                class="popular-article-image"
                            >

                            <div class="popular-article-content">
                                <h3>
                                    Peralatan Matcha yang Wajib Dimiliki
                                </h3>

                                <span>5 Jul 2026</span>
                            </div>
                        </a>
                    @endforelse

                </div>
            </section>

            {{-- SOURCES --}}
            <section class="sidebar-card">
                <h2 class="sidebar-title">
                    Sumber Referensi
                </h2>

                @if (!empty($article->sources))
                    <ul class="reference-list">
                        @foreach ($article->sources as $source)
                            <li>
                                <p>
                                    {{ data_get($source, 'name') }}
                                </p>

                                <a
                                    href="{{ data_get($source, 'url') }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    Lihat sumber asli ↗
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <ul class="reference-list">
                        <li>
                            <p>
                                ITO EN — Green Tea vs. Matcha: What Is the Difference?
                            </p>

                            <a
                                href="https://www.itoen-global.com/enjoymore_tea/curiosity/green-tea-vs-matcha-what-is-the-difference.html"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                Lihat sumber asli ↗
                            </a>
                        </li>

                        <li>
                            <p>
                                Harvard Health Publishing — Matcha: A Look at Possible
                                Health Benefits
                            </p>

                            <a
                                href="https://www.health.harvard.edu/healthy-aging-and-longevity/matcha-a-look-at-possible-health-benefits"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                Lihat sumber asli ↗
                            </a>
                        </li>
                    </ul>
                @endif
            </section>

        </aside>

    </main>

</div>

<style>
    :root {
        --matcha-dark: #17351f;
        --matcha-primary: #527c35;
        --matcha-medium: #759a4f;
        --matcha-light: #e8f0d9;
        --matcha-background: #f6f9f1;
        --border-color: #dce6cf;
        --text-color: #2d352e;
        --muted-color: #677065;
        --white: #ffffff;
    }

    .article-detail-page {
        min-height: 100vh;
        padding: 38px 20px 80px;
        background:
            radial-gradient(
                circle at top left,
                rgba(221, 236, 202, 0.55),
                transparent 34%
            ),
            var(--matcha-background);
        color: var(--text-color);
    }

    .article-detail-container {
        width: min(1240px, 100%);
        margin: 0 auto;
        display: grid;
        grid-template-columns: minmax(0, 1fr) 340px;
        gap: 24px;
        align-items: start;
    }

    .article-main-card,
    .sidebar-card {
        background: rgba(255, 255, 255, 0.96);
        border: 1px solid var(--border-color);
        border-radius: 18px;
        box-shadow: 0 14px 36px rgba(39, 69, 35, 0.07);
    }

    .article-main-card {
        padding: 34px;
        overflow: hidden;
    }

    .article-category {
        width: fit-content;
        margin-bottom: 18px;
        padding: 9px 18px;
        border-radius: 999px;
        background: var(--matcha-light);
        color: var(--matcha-dark);
        font-size: 14px;
        font-weight: 800;
    }

    .article-title {
        max-width: 850px;
        margin: 0;
        color: var(--matcha-dark);
        font-size: clamp(36px, 5vw, 62px);
        font-weight: 900;
        line-height: 1.04;
        letter-spacing: -2px;
    }

    .article-meta {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 9px;
        margin-top: 16px;
        color: var(--matcha-medium);
        font-size: 14px;
        font-weight: 800;
    }

    .article-meta-dot {
        font-size: 18px;
    }

    .article-cover-wrapper {
        margin-top: 24px;
        overflow: hidden;
        border-radius: 15px;
        background: var(--matcha-light);
    }

    .article-cover {
        width: 100%;
        aspect-ratio: 16 / 7;
        object-fit: cover;
        object-position: center;
        display: block;
        transition: transform 0.4s ease;
    }

    .article-cover:hover {
        transform: scale(1.02);
    }

    .article-body {
        margin-top: 24px;
        font-size: 17px;
        line-height: 1.75;
    }

    .article-body p {
        margin: 0 0 18px;
        color: #465047;
    }

    .article-introduction {
        padding-bottom: 24px;
        border-bottom: 1px solid var(--border-color);
        font-size: 18px;
        color: #344039 !important;
    }

    .article-section {
        padding: 22px 0;
        border-bottom: 1px solid var(--border-color);
    }

    .article-section h2,
    .article-body h2 {
        margin: 0 0 10px;
        color: var(--matcha-dark);
        font-size: 24px;
        line-height: 1.3;
    }

    .article-body h3 {
        color: var(--matcha-dark);
        font-size: 20px;
    }

    .article-body ul,
    .article-body ol {
        padding-left: 24px;
        color: #465047;
    }

    .article-body img {
        max-width: 100%;
        height: auto;
        border-radius: 14px;
    }

    .article-conclusion {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        margin-top: 26px;
        padding: 22px;
        border-radius: 15px;
        background: linear-gradient(
            135deg,
            #f0f6e7,
            #e6efd7
        );
    }

    .conclusion-icon {
        width: 45px;
        height: 45px;
        flex-shrink: 0;
        display: grid;
        place-items: center;
        border-radius: 50%;
        background: var(--white);
        font-size: 21px;
    }

    .article-conclusion h3 {
        margin: 0 0 5px;
        color: var(--matcha-dark);
        font-size: 18px;
    }

    .article-conclusion p {
        margin: 0;
        font-size: 15px;
        line-height: 1.6;
    }

    .article-bottom-action {
        margin-top: 28px;
    }

    .back-button {
        width: fit-content;
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 12px 20px;
        border: 1px solid var(--border-color);
        border-radius: 999px;
        background: var(--white);
        color: var(--matcha-dark);
        font-size: 14px;
        font-weight: 800;
        text-decoration: none;
        transition: 0.25s ease;
    }

    .back-button:hover {
        border-color: var(--matcha-primary);
        background: var(--matcha-light);
        transform: translateY(-2px);
    }

    .article-sidebar {
        display: flex;
        flex-direction: column;
        gap: 20px;
        position: sticky;
        top: 100px;
    }

    .sidebar-card {
        padding: 25px;
    }

    .sidebar-title {
        margin: 0 0 20px;
        color: var(--matcha-dark);
        font-size: 19px;
        font-weight: 900;
    }

    .share-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .share-button {
        width: 43px;
        height: 43px;
        display: grid;
        place-items: center;
        border: 0;
        border-radius: 50%;
        color: white;
        font-family: inherit;
        font-size: 14px;
        font-weight: 900;
        text-decoration: none;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .share-button:hover {
        transform: translateY(-3px);
        filter: brightness(0.95);
    }

    .facebook {
        background: #1877f2;
    }

    .twitter {
        background: #111111;
    }

    .whatsapp {
        background: #25d366;
        font-size: 11px;
    }

    .copy-link {
        background: #e7e9e5;
        color: #536054;
    }

    .popular-article-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .popular-article-item {
        display: grid;
        grid-template-columns: 84px minmax(0, 1fr);
        gap: 13px;
        align-items: center;
        color: inherit;
        text-decoration: none;
    }

    .popular-article-image {
        width: 84px;
        height: 68px;
        border-radius: 11px;
        object-fit: cover;
        background: var(--matcha-light);
    }

    .popular-article-content h3 {
        margin: 0 0 8px;
        color: var(--matcha-dark);
        font-size: 14px;
        font-weight: 850;
        line-height: 1.4;
        transition: color 0.2s ease;
    }

    .popular-article-content span {
        color: var(--matcha-medium);
        font-size: 12px;
        font-weight: 700;
    }

    .popular-article-item:hover h3 {
        color: var(--matcha-primary);
    }

    .reference-list {
        margin: 0;
        padding-left: 20px;
    }

    .reference-list li {
        margin-bottom: 20px;
        color: var(--matcha-dark);
    }

    .reference-list li:last-child {
        margin-bottom: 0;
    }

    .reference-list p {
        margin: 0 0 8px;
        color: #48534a;
        font-size: 14px;
        line-height: 1.6;
    }

    .reference-list a {
        color: var(--matcha-primary);
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
    }

    .reference-list a:hover {
        text-decoration: underline;
    }

    @media (max-width: 1024px) {
        .article-detail-container {
            grid-template-columns: 1fr;
        }

        .article-sidebar {
            position: static;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .article-sidebar .sidebar-card:last-child {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 700px) {
        .article-detail-page {
            padding: 20px 12px 55px;
        }

        .article-main-card {
            padding: 22px 18px;
            border-radius: 15px;
        }

        .article-title {
            font-size: 37px;
            letter-spacing: -1px;
        }

        .article-cover {
            aspect-ratio: 4 / 3;
        }

        .article-body {
            font-size: 16px;
        }

        .article-section h2,
        .article-body h2 {
            font-size: 21px;
        }

        .article-sidebar {
            grid-template-columns: 1fr;
        }

        .article-sidebar .sidebar-card:last-child {
            grid-column: auto;
        }
    }

    @media (max-width: 420px) {
        .article-title {
            font-size: 32px;
        }

        .article-meta-dot {
            display: none;
        }

        .article-meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 2px;
        }

        .article-conclusion {
            flex-direction: column;
        }
    }
</style>
