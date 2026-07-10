@extends('layout.home')
@section('content')
    <section class="flex min-h-screen items-center justify-center bg-white px-5 pt-20">
        <div class="reveal w-full max-w-sm">
            {{-- Logo --}}
            <div class="mb-8 text-center">
                <img src="/img/Logo.png" class="mx-auto h-10 w-auto" alt="Pondok Pesantren Darussalam Blokagung Dua">
                <h1 class="mt-4 font-serif text-2xl font-semibold text-apple-text">Buat Akun</h1>
                <p class="mt-1 text-sm text-apple-text-secondary">Daftar untuk melanjutkan</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label for="name" class="block text-sm font-medium text-apple-text">Nama</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                           class="mt-1 block w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-apple-text transition-all duration-300 ease-apple placeholder:text-apple-text-secondary focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                           placeholder="Nama lengkap">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-apple-text">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                           class="mt-1 block w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-apple-text transition-all duration-300 ease-apple placeholder:text-apple-text-secondary focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                           placeholder="email@example.com">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-apple-text">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                           class="mt-1 block w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-apple-text transition-all duration-300 ease-apple placeholder:text-apple-text-secondary focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                           placeholder="Minimal 8 karakter">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-apple-text">Verifikasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                           class="mt-1 block w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-apple-text transition-all duration-300 ease-apple placeholder:text-apple-text-secondary focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                           placeholder="Ulangi password">
                </div>

                <button type="submit"
                        class="w-full rounded-full bg-emerald-600 px-6 py-3 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700 hover:shadow-lg">
                    Daftar
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-apple-text-secondary">
                Sudah punya akun?
                <a href="/login" class="font-medium text-emerald-600 transition-colors duration-300 hover:text-emerald-700">Login</a>
            </p>
        </div>
    </section>
@endsection
