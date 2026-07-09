@extends('layout.home')
@section('content')
    {{-- Search Header --}}
    <section class="bg-[#f5f5f7] pt-24 md:pt-28">
        <div class="mx-auto max-w-7xl px-5 pb-8 pt-12 lg:px-8">
            <div class="reveal text-center">
                <span class="text-xs font-semibold uppercase tracking-widest text-emerald-600">Informasi</span>
                <h1 class="mt-2 font-serif text-3xl font-semibold tracking-tight text-apple-text md:text-4xl">Warta</h1>
                <p class="mt-2 text-apple-text-secondary">Berita dan informasi terbaru dari pondok pesantren</p>
            </div>

            <form method="get" action="/warta" class="reveal mx-auto mt-8 max-w-lg">
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                        <svg class="h-4 w-4 text-apple-text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                        </svg>
                    </div>
                    <input type="search" name="q" id="default-search"
                           value="{{ request('q') }}"
                           class="block w-full rounded-full border border-apple-border bg-white py-3.5 pl-11 pr-20 text-sm text-apple-text transition-all duration-300 ease-apple placeholder:text-apple-text-secondary focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                           placeholder="Cari berita...">
                    <button type="submit"
                            class="absolute right-1.5 top-1/2 -translate-y-1/2 rounded-full bg-emerald-600 px-5 py-2 text-xs font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </section>

    {{-- Content --}}
    <section class="bg-white py-12 md:py-16">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            @if (!$data || count($data) == 0)
                <div class="flex flex-col items-center justify-center py-16 text-center">
                    <svg class="mb-4 h-16 w-16 text-apple-border" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                    </svg>
                    <p class="text-apple-text-secondary">Data tidak ditemukan</p>
                    @if(request('q'))
                        <p class="mt-1 text-sm text-apple-text-tertiary">Tidak ada hasil untuk "{{ request('q') }}"</p>
                    @endif
                </div>
            @else
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($data as $item)
                        <article class="reveal group relative overflow-hidden rounded-2xl bg-white shadow-apple-sm transition-all duration-500 ease-apple hover:shadow-apple-lg">
                            <div class="aspect-[4/3] overflow-hidden">
                                <img src="{{ $item->image_url }}"
                                     alt="{{ $item->title }}"
                                     class="h-full w-full object-cover transition-transform duration-700 ease-apple group-hover:scale-105">
                            </div>
                            <div class="p-5">
                                <div class="mb-2 flex items-center gap-2">
                                    <span class="text-xs text-apple-text-secondary">{{ $item->created_at->format('d F Y') }}</span>
                                </div>
                                <h3 class="font-serif text-base font-semibold leading-snug">
                                    <a href="/warta/{{ $item->slug }}"
                                       class="line-clamp-2 text-apple-text transition-colors duration-300 ease-apple hover:text-emerald-600">
                                        {{ $item->title }}
                                    </a>
                                </h3>
                                <p class="mt-2 line-clamp-2 text-sm text-apple-text-secondary">
                                    {{ html_entity_decode(strip_tags($item->content)) }}
                                </p>
                                <a href="/warta/{{ $item->slug }}"
                                   class="mt-3 inline-flex items-center gap-1 text-xs font-medium text-emerald-600 transition-colors duration-300 ease-apple hover:text-emerald-700">
                                    Baca selengkapnya
                                    <svg class="h-3 w-3 transition-transform duration-300 group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="reveal mt-12">
                    {{ $data->links() }}
                </div>
            @endif
        </div>
    </section>

    {{-- Sidebar artikel populer --}}
    @if($random && count($random) > 0)
    <section class="bg-[#f5f5f7] py-16">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <div class="reveal mb-8 text-center">
                <span class="text-xs font-semibold uppercase tracking-widest text-emerald-600">Populer</span>
                <h2 class="mt-2 font-serif text-2xl font-semibold text-apple-text">Artikel Populer</h2>
            </div>
            <div class="reveal grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($random as $item)
                    <a href="/warta/{{ $item->slug }}"
                       class="group rounded-2xl bg-white p-5 shadow-apple-sm transition-all duration-300 ease-apple hover:shadow-apple-lg">
                        <h3 class="font-serif text-sm font-semibold text-apple-text transition-colors duration-300 group-hover:text-emerald-600">
                            {{ $item->title }}
                        </h3>
                        <span class="mt-2 inline-block text-xs text-apple-text-secondary">{{ $item->created_at->format('d M Y') }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
