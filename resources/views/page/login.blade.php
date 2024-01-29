@extends('layout.home')
@section('content')
    <div class="container mx-auto flex items-center justify-center my-20">
        <div class="w-full max-w-sm px-5 md:w-1/3">
            <h1 class="font-semibold text-3xl text-green-600 mb-2">Login</h1>
            <p class="text-xs text-gray-400">Masuk ke akunmu untuk melihat lebih jauh</p>
            <form method="post" class="flex flex-col text-slate-500 gap-3 mt-10" action="{{ route('login') }}">
                @csrf
                <div class="border px-2 py-1 rounded-md flex items-center text-xl">
                    <ion-icon name="person-circle-outline" class="text-gray-400 px-2 border-r border-gray-300"></ion-icon>
                    <input class="w-full border-none focus:ring-0" id="email" class="block mt-1 w-full" type="email"
                        name="email" value="{{ old('email') }}" autocomplete="username">
                </div>

                <div class="border px-2 py-1 rounded-md flex items-center text-xl mt-3">
                    <ion-icon name="lock-closed" class="text-gray-400 px-2 border-r border-gray-300"></ion-icon></ion-icon>
                    <input class="w-full border-none focus:ring-0" id="password" class="block mt-1 w-full" type="password"
                        name="password" required autocomplete="current-password">
                </div>
                <div class="flex justify-between items-center my-5">
                    <input type="submit" value="Login"
                        class="text-white bg-blue-500 w-1/2 hover:bg-blue-500/75 focus:ring-4 focus:ring-[#4285F4]/50 font-medium rounded-full text-sm px-5 py-2.5 text-center items-center cursor-pointer">
                </div>
            </form>
            <div class="flex gap-5 items-center mt-7">
                <span class="text-gray-400 text-sm">Login with</span>
                <a href="{{ route('google.redirect') }}"
                    class="text-white focus:ring-4 border hover:shadow hover:border-gray-300 focus:ring-[#4285F4]/50 font-medium rounded-full text-sm p-2 text-center flex justify-center items-center">
                    <svg class="w-4 h-4 text-[#4285F4]" aria-hidden="true" focusable="false" data-prefix="fab"
                        data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512">
                        <path fill="currentColor"
                            d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                        </path>
                    </svg>
                </a>
            </div>
            @if ($errors->any())
                <x-notification :error="$errors" />
            @endif





        </div>
    </div>
@endsection
