@extends('layout.home')
@section('content')
    <section class="bg-[#f5f5f7] pt-24 md:pt-28">
        <div class="mx-auto max-w-7xl px-5 pb-8 pt-12 lg:px-8">
            <div class="reveal">
                {{-- Breadcrumb --}}
                <div class="mb-4 flex items-center gap-2 text-sm text-apple-text-secondary">
                    <a href="/" class="transition-colors duration-300 hover:text-emerald-600">Beranda</a>
                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                    </svg>
                    <span>{{ $page }}</span>
                    @if(isset($title))
                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                    </svg>
                    <span class="line-clamp-1">{{ $title }}</span>
                    @endif
                </div>
                <h1 class="font-serif text-3xl font-bold tracking-tight text-apple-text md:text-4xl">
                    {{ $title ?? $page }}
                </h1>
            </div>
        </div>
    </section>

    <section class="bg-white py-12 md:py-16">
        <div class="mx-auto max-w-3xl px-5 lg:px-8">
            <article class="reveal prose prose-lg max-w-none font-Inter
                prose-headings:font-serif prose-headings:text-apple-text prose-headings:tracking-tight
                prose-a:text-emerald-600 prose-a:no-underline hover:prose-a:text-emerald-700
                prose-img:rounded-2xl prose-img:shadow-apple
                prose-strong:text-apple-text
                prose-blockquote:border-emerald-600 prose-blockquote:bg-emerald-50/50 prose-blockquote:py-2 prose-blockquote:px-6 prose-blockquote:rounded-2xl
                prose-code:text-emerald-700 prose-code:bg-emerald-50 prose-code:px-2 prose-code:py-0.5 prose-code:rounded
                prose-li:marker:text-emerald-600">
                @if (isset($content->content))
                    {!! $content->content !!}
                @endif
            </article>
        </div>
    </section>
    <div class="clear-left"></div>
@endsection
