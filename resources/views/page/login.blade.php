@extends('layout.home')
@section('content')
    <div class="container mx-auto flex items-center justify-center my-20">
        <div class="w-full px-5 md:w-1/3">
            <h1 class="font-bold text-3xl text-green-600 font-Petrona text-center underline mb-3">Login</h1>
            <form method="post" class="flex flex-col text-slate-500 gap-3 " action="{{ route('login') }}">
                @csrf
                <div class="shadow p-3 rounded-md flex items-center text-xl">
                    <ion-icon name="person-circle-outline"></ion-icon> <input class="w-full border-none focus:ring-0"
                        id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}"
                        autocomplete="username">
                </div>

                <div class="shadow p-3 rounded-md flex items-center text-xl">
                    <ion-icon name="lock-closed"></ion-icon></ion-icon> <input class="w-full border-none focus:ring-0"
                        id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password">
                </div>
                <div class="flex justify-between items-center"> <span>Lupa <a href="#"
                            class="underline text-blue-500">Password?</a></span>
                    <input type="submit" value="Login"
                        class="bg-sky-400 text-white font-bold text-xl rounded py-2 px-4 mt-5 hover:bg-sky-600 cursor-pointer transition">
                </div>
            </form>
            @if ($errors->any())
                <x-notification :error="$errors" />
            @endif





        </div>
    </div>
@endsection
