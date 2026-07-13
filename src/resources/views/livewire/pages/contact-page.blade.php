<div class="contact-page">
    <section class="contact-hero">
        <div class="contact-container">
            <h1>
                {{ $hero?->title ?? 'Hubungi Matcha Mey' }}
            </h1>

            <p>
                {{ $hero?->subtitle ?? 'Punya pertanyaan, kritik, saran, atau menemukan kendala pada website? Sampaikan pesan Anda kepada tim Matcha Mey melalui halaman ini.' }}
            </p>
        </div>
    </section>

    <section class="contact-body">
        <div class="contact-container">
            <div class="contact-grid">

                <aside class="contact-sidebar">

                    <article class="info-card">
                        <div class="info-card-header">
                            <span class="info-tag">
                                Informasi
                            </span>

                            <h2>
                                {{ $info?->title ?? 'Ada yang Ingin Disampaikan?' }}
                            </h2>
                        </div>

                        <div class="info-card-body">
                            {!! $info?->content ?? '
                                <p>
                                    Matcha Mey adalah website edukasi dan rekomendasi
                                    seputar matcha.
                                </p>

                                <p>
                                    Halaman ini dapat digunakan untuk mengirim pertanyaan,
                                    memberikan kritik dan saran, melaporkan kesalahan
                                    informasi, menyampaikan kendala pada website, atau
                                    mengajukan kerja sama.
                                </p>
                            ' !!}
                        </div>
                    </article>

                    <article class="info-card">
                        <div class="info-card-header">
                            <h2>
                                {{ $contactDetail?->title ?? 'Kontak Matcha Mey' }}
                            </h2>
                        </div>

                        <div class="info-card-body">
                            {!! $contactDetail?->content ?? '
                                <p>
                                    Email: hello@matchamey.com
                                </p>

                                <p>
                                    Instagram: @matchamey
                                </p>
                            ' !!}
                        </div>
                    </article>

                </aside>

                <div class="contact-form-col">
                    <form
                        class="contact-form-card"
                        wire:submit="submit"
                    >

                        <div class="form-header">
                            <i class="fas fa-mug-hot"></i>

                            <h2>
                                {{ $form?->title ?? 'Kirim Pesan kepada Kami' }}
                            </h2>
                        </div>

                        @if ($success)
                            <div class="form-success">
                                {!! $success?->content ?? '
                                    Pesan Anda berhasil dikirim.
                                    Terima kasih telah menghubungi Matcha Mey.
                                ' !!}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="name">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                id="name"
                                wire:model="name"
                                placeholder="Masukkan nama lengkap Anda"
                            >

                            @error('name')
                                <span class="form-error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">
                                Alamat Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                wire:model="email"
                                placeholder="Masukkan alamat email aktif Anda"
                            >

                            @error('email')
                                <span class="form-error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subject">
                                Subjek Pesan
                            </label>

                            <input
                                type="text"
                                id="subject"
                                wire:model="subject"
                                placeholder="Contoh: Kritik, koreksi artikel, atau kendala website"
                            >

                            @error('subject')
                                <span class="form-error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="message">
                                Isi Pesan
                            </label>

                            <textarea
                                id="message"
                                wire:model="message"
                                rows="6"
                                placeholder="Tuliskan pertanyaan, kritik, saran, koreksi, atau keperluan Anda..."
                            ></textarea>

                            @error('message')
                                <span class="form-error">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <button
                            type="submit"
                            class="submit-btn"
                            wire:loading.attr="disabled"
                        >
                            <span wire:loading.remove>
                                {{ $form?->button_label ?? 'Kirim Pesan' }}
                            </span>

                            <span wire:loading>
                                Mengirim Pesan...
                            </span>
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </section>
</div>

@push('styles')
    <link
        href="{{ asset('css/pages/contact.css') }}"
        rel="stylesheet"
    >
@endpush
