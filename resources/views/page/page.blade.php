@extends('layout.home')
@push('scriptHead')
    <link 
      href="https://cdn.jsdelivr.net/npm/shareon@2/dist/shareon.min.css"
      rel="stylesheet"
    >
    <script
      src="https://cdn.jsdelivr.net/npm/shareon@2/dist/shareon.iife.js"
      defer
      init
    ></script>
@endpush
@section('content')
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-[#1d1d1f] pt-20">
        <div class="absolute inset-0">
            <img src="{{ $data->image_url }}" alt="{{ $data->title }}"
                 class="h-full w-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-t from-[#1d1d1f] via-[#1d1d1f]/60 to-transparent"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-4xl px-5 pb-16 pt-24 md:pb-20 md:pt-28">
            <div class="reveal">
                <span class="text-xs font-semibold uppercase tracking-widest text-emerald-400">{{ $page }}</span>
                <h1 class="mt-3 font-serif text-3xl font-bold leading-tight tracking-tight text-white md:text-5xl">
                    {{ $data->title }}
                </h1>
                <div class="mt-4 flex flex-wrap items-center gap-4 text-sm text-white/60">
                    <span class="flex items-center gap-1.5">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                        </svg>
                        {{ $data->updated_at->format('d F Y') }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                        </svg>
                        Admin
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="bg-white py-12 md:py-16">
        <div class="mx-auto max-w-3xl px-5 lg:px-8">
            {{-- Breadcrumb --}}
            <div class="reveal mb-8 flex items-center gap-2 text-sm text-apple-text-secondary">
                <a href="/" class="transition-colors duration-300 hover:text-emerald-600">Beranda</a>
                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                </svg>
                <a href="/warta" class="transition-colors duration-300 hover:text-emerald-600">Warta</a>
                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                </svg>
                <span class="line-clamp-1 text-apple-text">{{ $data->title }}</span>
            </div>

            {{-- Share Buttons --}}
            <div class="reveal mb-8">
                <div class="shareon flex items-center gap-2" data-title="{{ $data->title }}" data-url="{{ url()->current() }}">
                    <span class="text-xs font-medium uppercase tracking-widest text-apple-text-secondary">Bagikan</span>
                    <a class="facebook"></a>
                    <a class="twitter"></a>
                    <a class="whatsapp"></a>
                    <a class="telegram"></a>
                    <a class="copy-url"></a>
                </div>
            </div>

            {{-- Article Body --}}
            <article class="reveal prose prose-lg max-w-none font-Inter
                prose-headings:font-serif prose-headings:text-apple-text prose-headings:tracking-tight
                prose-a:text-emerald-600 prose-a:no-underline hover:prose-a:text-emerald-700
                prose-img:rounded-2xl prose-img:shadow-apple
                prose-strong:text-apple-text
                prose-blockquote:border-emerald-600 prose-blockquote:bg-emerald-50/50 prose-blockquote:py-2 prose-blockquote:px-6 prose-blockquote:rounded-2xl
                prose-code:text-emerald-700 prose-code:bg-emerald-50 prose-code:px-2 prose-code:py-0.5 prose-code:rounded
                prose-pre:rounded-2xl prose-pre:shadow-apple
                prose-li:marker:text-emerald-600">
                {!! $data->content !!}
            </article>
        </div>
    </section>

    <div class="clear-left"></div>
@endsection

@push('scriptBody')
    <script>
        const data = {
            share() {
                const data = {
                    title: "{{ $data->title }}",
                    url: "{{ url()->current() }}"
                }
                navigator.share(data);
            }
        }
    </script>
@endpush
