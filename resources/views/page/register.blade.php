@extends('layout.home')
@section('content')
    <div class="container mx-auto flex items-center justify-center my-20">
        <div class="w-full px-5 md:w-1/3">
            <h1 class="font-bold text-3xl text-green-600 font-Petrona text-center underline mb-3">Register</h1>
            <form action="{{ route('register') }}" method="POST" class="flex flex-col text-slate-500 gap-3 ">
                @csrf
                <div class="shadow p-3 rounded-md flex items-center text-xl">
                    <ion-icon name="person-circle-outline"></ion-icon> <input placeholder="Nama"
                        class="w-full border-none focus:ring-0" type="text" name="name" :value="old('name')" required
                        autofocus autocomplete="name">
                </div>
                <div class="shadow p-3 rounded-md flex items-center text-xl">
                    <ion-icon name="person-circle-outline"></ion-icon> <input placeholder="Email"
                        class="w-full border-none focus:ring-0" type="email" name="email" :value="old('email')"
                        required autocomplete="username">
                </div>
                <div class="shadow p-3 rounded-md flex items-center text-xl">
                    <ion-icon name="lock-closed"></ion-icon></ion-icon> <input placeholder="Password"
                        class="w-full border-none focus:ring-0" type="password" name="password" required
                        autocomplete="new-password">
                </div>
                <div class="shadow p-3 rounded-md flex items-center text-xl">
                    <ion-icon name="lock-closed"></ion-icon></ion-icon> <input placeholder="Verifikasi Password"
                        class="w-full border-none focus:ring-0" type="password" name="password_confirmation" required
                        autocomplete="new-password">
                </div>
                <div class="flex justify-between items-center"> <span>Sudah Punya Akun? <a href="/login"
                            class="underline text-blue-500">Login</a></span>
                    <input type="submit" value="Login"
                        class="bg-black text-white font-bold text-xs rounded py-2 px-4 mt-5 hover:bg-sky-600 cursor-pointer transition">
                </div>
            </form>
        </div>
    </div>
@endsection
