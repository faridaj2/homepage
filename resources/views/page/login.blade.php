@extends('layout.home')
@section('content')
    <section class="flex min-h-screen items-center justify-center bg-white px-5 pt-20">
        <div class="reveal w-full max-w-sm">
            {{-- Logo --}}
            <div class="mb-8 text-center">
                <img src="/img/Logo.png" class="mx-auto h-10 w-auto" alt="Pondok Pesantren Darussalam Blokagung 2">
                <h1 class="mt-4 font-serif text-2xl font-semibold text-apple-text">Selamat Datang</h1>
                <p class="mt-1 text-sm text-apple-text-secondary">Masuk ke akun Anda</p>
            </div>

            <form method="post" action="{{ route('login') }}" class="space-y-5">
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-medium text-apple-text">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                           class="mt-1 block w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-apple-text transition-all duration-300 ease-apple placeholder:text-apple-text-secondary focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-apple-text">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="mt-1 block w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-apple-text transition-all duration-300 ease-apple placeholder:text-apple-text-secondary focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20">
                </div>

                <button type="submit"
                        class="w-full rounded-full bg-emerald-600 px-6 py-3 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700 hover:shadow-lg">
                    Login
                </button>
            </form>

            {{-- Social Login --}}
            <div class="mt-8">
                <div class="relative mb-5">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-apple-border"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="bg-white px-4 text-xs text-apple-text-secondary">Atau login dengan</span>
                    </div>
                </div>
                <a href="{{ route('google.redirect') }}"
                   class="flex items-center justify-center gap-3 rounded-full border border-apple-border px-6 py-3 text-sm font-medium text-apple-text transition-all duration-300 ease-apple hover:border-emerald-600 hover:text-emerald-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 01-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    Google
                </a>
            </div>

            <p class="mt-8 text-center text-sm text-apple-text-secondary">
                    Belum punya akun?
                    <a href="/register" class="font-medium text-emerald-600 transition-colors duration-300 hover:text-emerald-700">Daftar</a>
                </p>

            @if ($errors->any())
                <div class="mt-6 rounded-2xl bg-red-50 p-4 text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
