@extends('layout.home')

@section('content')
    {{-- ============================================ --}}
    {{-- HERO: Full-screen Carousel (Apple-style)    --}}
    {{-- ============================================ --}}
    <section class="relative min-h-screen overflow-hidden bg-[#1d1d1f]">
        <div class="swiper hero-carousel absolute inset-0 h-full w-full">
            <div class="swiper-wrapper">
                @forelse ($berita->take(4) as $item)
                    <div class="swiper-slide">
                        <div class="relative h-screen w-full">
                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}"
                                 class="h-full w-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide">
                        <div class="relative h-screen w-full bg-gradient-to-br from-emerald-900 to-[#1d1d1f]">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Hero Content --}}
        <div class="absolute inset-0 z-10 flex flex-col items-center justify-center px-5 text-center">
            <div class="reveal">
                <h1 class="font-serif text-4xl font-bold leading-tight tracking-tight text-white md:text-6xl lg:text-7xl">
                    Pondok Pesantren<br>
                    <span class="text-emerald-400">Darussalam Blokagung Dua</span>
                </h1>
                <p class="mx-auto mt-4 max-w-xl text-base text-white/70 md:text-lg">
                    Mencetak generasi berakhlak mulia, berpengetahuan luas, dan siap berkontribusi dalam masyarakat.
                </p>
                <div class="mt-8 flex items-center justify-center gap-4">
                    <a href="/pendaftaran"
                       class="inline-flex items-center rounded-full bg-emerald-600 px-8 py-3 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700 hover:shadow-lg hover:shadow-emerald-600/25">
                        Daftar Sekarang
                    </a>
                    <a href="/warta"
                       class="inline-flex items-center rounded-full border border-white/30 px-8 py-3 text-sm font-medium text-white transition-all duration-300 ease-apple hover:border-white/60 hover:bg-white/10">
                        Lihat Warta
                    </a>
                </div>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-8 left-1/2 z-10 -translate-x-1/2">
            <div class="scroll-indicator flex flex-col items-center gap-2">
                <span class="text-xs font-medium uppercase tracking-widest text-white/50">Scroll</span>
                <svg class="h-5 w-5 text-white/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                </svg>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- BERITA: News Grid (Apple-style Cards)       --}}
    {{-- ============================================ --}}
    <section class="bg-white py-20 md:py-28">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <div class="reveal mb-12 text-center md:text-left">
                <span class="text-xs font-semibold uppercase tracking-widest text-emerald-600">Berita Terbaru</span>
                <h2 class="mt-2 font-serif text-3xl font-semibold tracking-tight text-apple-text md:text-4xl">
                    Informasi & Kegiatan Terkini
                </h2>
                <p class="mt-2 text-apple-text-secondary">Ikuti perkembangan terbaru dari pondok pesantren</p>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($berita as $item)
                    <article class="reveal group relative overflow-hidden rounded-2xl bg-white shadow-apple-sm transition-all duration-500 ease-apple hover:shadow-apple-lg">
                        <div class="aspect-[4/3] overflow-hidden">
                            <img src="{{ $item->image_url }}"
                                 alt="{{ $item->title }}"
                                 class="h-full w-full object-cover transition-transform duration-700 ease-apple group-hover:scale-105">
                        </div>
                        <div class="p-5 md:p-6">
                            <div class="mb-3 flex items-center gap-2">
                                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-600">Berita</span>
                                <span class="text-xs text-apple-text-secondary">{{ $item->updated_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="font-serif text-lg font-semibold leading-snug text-apple-text">
                                <a href="/warta/{{ $item->slug }}"
                                   class="transition-colors duration-300 ease-apple hover:text-emerald-600">
                                    {{ $item->title }}
                                </a>
                            </h3>
                            <p class="mt-2 line-clamp-2 text-sm text-apple-text-secondary">
                                {{ html_entity_decode(strip_tags($item->content ?? '')) }}
                            </p>
                            <a href="/warta/{{ $item->slug }}"
                               class="mt-4 inline-flex items-center gap-1 text-sm font-medium text-emerald-600 transition-colors duration-300 ease-apple hover:text-emerald-700">
                                Baca selengkapnya
                                <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full flex flex-col items-center justify-center py-16 text-center">
                        <svg class="mb-4 h-12 w-12 text-apple-border" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                        </svg>
                        <p class="text-sm text-apple-text-secondary">Belum ada berita untuk ditampilkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- VISI & MISI (Alternating Apple-style)        --}}
    {{-- ============================================ --}}
    <section class="bg-[#f5f5f7] py-20 md:py-28">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <div class="reveal mb-16 text-center">
                <span class="text-xs font-semibold uppercase tracking-widest text-emerald-600">Fundasi</span>
                <h2 class="mt-2 font-serif text-3xl font-semibold tracking-tight text-apple-text md:text-4xl">
                    Visi & Misi Yayasan
                </h2>
                <p class="mx-auto mt-2 max-w-xl text-apple-text-secondary">
                    Visi dan misi adalah dua elemen penting dalam perencanaan strategis organisasi
                </p>
            </div>

            {{-- Visi --}}
            <div class="reveal mb-16 grid items-center gap-12 md:grid-cols-2">
                <div class="order-2 md:order-1">
                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100">
                        <svg class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/>
                        </svg>
                    </div>
                    <h3 class="font-serif text-2xl font-semibold text-apple-text md:text-3xl">Visi</h3>
                    <p class="mt-2 text-lg font-medium text-emerald-600">Terwujudnya santri yang bertaqwa, Kuat & Mandiri.</p>
                    <div class="mt-6 space-y-4">
                        <div class="reveal reveal-delay-1 rounded-2xl border border-apple-border/50 bg-white p-5">
                            <h4 class="font-semibold text-apple-text">Bertaqwa</h4>
                            <p class="mt-1 text-sm text-apple-text-secondary">Membentuk santri yang memiliki keberagamaan yang kuat, pemahaman agama yang baik, dan mampu mengamalkannya dalam kehidupan sehari-hari.</p>
                        </div>
                        <div class="reveal reveal-delay-2 rounded-2xl border border-apple-border/50 bg-white p-5">
                            <h4 class="font-semibold text-apple-text">Kuat</h4>
                            <p class="mt-1 text-sm text-apple-text-secondary">Melahirkan santri yang kuat secara fisik dan mental, mampu menghadapi tantangan, dan tidak mudah putus asa.</p>
                        </div>
                        <div class="reveal reveal-delay-3 rounded-2xl border border-apple-border/50 bg-white p-5">
                            <h4 class="font-semibold text-apple-text">Mandiri</h4>
                            <p class="mt-1 text-sm text-apple-text-secondary">Menghasilkan santri yang mandiri, mampu mengambil keputusan bijaksana, mengelola waktu, dan mengembangkan potensi diri.</p>
                        </div>
                    </div>
                </div>
                <div class="order-1 md:order-2">
                    <div class="aspect-[4/3] overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-500 to-emerald-800">
                        <div class="flex h-full items-center justify-center p-8 text-center">
                            <blockquote class="text-lg font-medium italic leading-relaxed text-white/90 md:text-xl">
                                "Terwujudnya santri yang bertaqwa,<br>Kuat &amp; Mandiri."
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Misi --}}
            <div class="reveal grid items-center gap-12 md:grid-cols-2">
                <div class="order-2 md:order-2">
                    <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100">
                        <svg class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-serif text-2xl font-semibold text-apple-text md:text-3xl">Misi</h3>
                    <ul class="mt-6 space-y-4">
                        <li class="reveal reveal-delay-1 flex items-start gap-4 rounded-2xl border border-apple-border/50 bg-white p-5">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-sm font-semibold text-emerald-600">1</span>
                            <p class="text-sm text-apple-text-secondary">Memberikan bekal <strong class="text-apple-text">Agama</strong> yang kuat.</p>
                        </li>
                        <li class="reveal reveal-delay-2 flex items-start gap-4 rounded-2xl border border-apple-border/50 bg-white p-5">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-sm font-semibold text-emerald-600">2</span>
                            <p class="text-sm text-apple-text-secondary">Meningkatkan Kualitas sumber daya manusia seutuhnya.</p>
                        </li>
                        <li class="reveal reveal-delay-3 flex items-start gap-4 rounded-2xl border border-apple-border/50 bg-white p-5">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-sm font-semibold text-emerald-600">3</span>
                            <p class="text-sm text-apple-text-secondary">Mencetak generasi muda yang berkualitas dalam agama dan pengetahuan umum.</p>
                        </li>
                        <li class="reveal reveal-delay-4 flex items-start gap-4 rounded-2xl border border-apple-border/50 bg-white p-5">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-sm font-semibold text-emerald-600">4</span>
                            <p class="text-sm text-apple-text-secondary">Memberi bekal dengan keterampilan, keagamaan, sosial, dan teknologi.</p>
                        </li>
                    </ul>
                </div>
                <div class="order-1 md:order-1">
                    <div class="aspect-[4/3] overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-800 to-emerald-500">
                        <div class="flex h-full items-center justify-center p-8 text-center">
                            <p class="text-lg font-medium italic leading-relaxed text-white/90 md:text-xl">
                                "Mencetak generasi muda yang berkualitas<br>dalam agama dan pengetahuan umum."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- SEMBOYAN: Dark Motto Section (Apple-style)   --}}
    {{-- ============================================ --}}
    <section class="relative overflow-hidden bg-[#1d1d1f] py-24 md:py-32">
        {{-- Background subtle pattern --}}
        <div class="absolute inset-0 opacity-[0.03]">
            <div class="h-full w-full" style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>
        
        <div class="relative z-10 mx-auto max-w-4xl px-5 text-center">
            <div class="reveal">
                <span class="text-xs font-semibold uppercase tracking-widest text-emerald-400">Motto</span>
                <h2 class="mt-4 font-serif text-4xl font-bold leading-tight tracking-tight text-white md:text-6xl">
                    Mendidik dengan Hati,<br>
                    <span class="text-emerald-400">Membentuk Generasi</span>
                </h2>
                <div class="mt-8">
                    <p class="text-lg text-white/60 md:text-xl">
                        <span class="typer" id="motto-typer"
                              data-words="Memberikan bekal Agama yang kuat,Meningkatkan Kualitas SDM seutuhnya,Mencetak generasi berkualitas,Membekali dengan keterampilan & teknologi"
                              data-delay="100" data-deleteDelay="1000"></span>
                        <span class="cursor" data-owner="motto-typer"></span>
                    </p>
                </div>
                <div class="mt-10 flex items-center justify-center gap-3">
                    <div class="h-px w-12 bg-emerald-600/50"></div>
                    <span class="text-sm font-medium text-emerald-400">YPP Darussalam Blokagung Dua</span>
                    <div class="h-px w-12 bg-emerald-600/50"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================================ --}}
    {{-- CTA: Contact Section                          --}}
    {{-- ============================================ --}}
    <section class="bg-white py-16 md:py-20">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <div class="reveal flex flex-col items-center justify-between gap-6 md:flex-row">
                <div class="max-w-lg text-center md:text-left">
                    <h3 class="font-serif text-2xl font-semibold tracking-tight text-apple-text md:text-3xl">
                        Hubungi Kami
                    </h3>
                    <p class="mt-2 text-apple-text-secondary">
                        Dapatkan informasi mengenai Pendaftaran, serta kontak dan alamat kami
                    </p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="/pendaftaran"
                       class="inline-flex items-center rounded-full bg-emerald-600 px-6 py-3 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700 hover:shadow-lg">
                        Pendaftaran
                        <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                        </svg>
                    </a>
                    <a href="/kontak"
                       class="inline-flex items-center rounded-full border border-apple-border px-6 py-3 text-sm font-medium text-apple-text transition-all duration-300 ease-apple hover:border-emerald-600 hover:text-emerald-600">
                        Kontak
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scriptHead')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script async src="https://unpkg.com/typer-dot-js@0.1.0/typer.js"></script>
@endpush

@push('scriptBody')
    <script>
        // Hero Carousel (Apple-style crossfade)
        new Swiper('.hero-carousel', {
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            allowTouchMove: false,
        });
    </script>
@endpush
