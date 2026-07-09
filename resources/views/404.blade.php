@extends('layout.home')
@section('content')
    <section class="flex min-h-screen items-center justify-center bg-white px-5">
        <div class="reveal text-center">
            <h1 class="font-serif text-8xl font-bold tracking-tight text-apple-text md:text-9xl">404</h1>
            <p class="mt-4 text-xl text-apple-text-secondary">Halaman tidak ditemukan</p>
            <p class="mt-2 text-sm text-apple-text-tertiary">Halaman yang Anda cari mungkin telah dipindahkan atau dihapus.</p>
            <a href="/"
               class="mt-8 inline-flex items-center rounded-full bg-emerald-600 px-8 py-3 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700 hover:shadow-lg">
                Kembali ke Beranda
                <svg class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>
    </section>
@endsection
