@extends('layout.dashboard')
@section('content')
    <div class="pt-5 px-4 flex flex-col md:flex-row gap-5">
        <div>
            <h1 class="font-bold tracking-wide text-3xl text-slate-700">
                Hi, User🚀<br>
                Apa yang ingin <br>
                Kamu lakukan hari ini😍
            </h1>
            <p class="mt-2 font-light text-slate-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe
                provident
                necessitatibus
                minima?</p>
        </div>
        <div class="flex flex-wrap gap-3 items-start max-sm:mt-10 ">
            <button class="bg-sky-500 hover:bg-sky-700 p-4 text-white font-bold rounded">
                Dashboard
            </button>
            <button class="bg-amber-500 hover:bg-amber-700 p-4 text-white font-bold rounded">
                Pemimpin
            </button>
            <button class="bg-rose-500 hover:bg-rose-700 p-4 text-white font-bold rounded">
                Berita
            </button>
            <button class="bg-fuchsia-500 hover:bg-fuchsia-700 p-4 text-white font-bold rounded">
                Info Pendaftaran
            </button>
            <button class="bg-teal-500 hover:bg-teal-700 p-4 text-white font-bold rounded">
                Galeri
            </button>
        </div>
    </div>
    <div class="px-4 flex gap-3 pt-10">
        <div class="bg-base rounded-xl shadow pt-2 px-1 w-full md:w-1/3 lg:w-1/5">
            <div class="flex gap-3 h-24">
                <div class="w-[50px] h-[50px] rounded-full overflow-hidden">
                    <img src="" class="w-full h-full" alt="">
                </div>
                <div>
                    <h1 class="font-semibold text-sm">shangrifrontier@gmail.com</h1>
                    <h4 class="text-slate-500 text-xs">Admin</h4>
                </div>
            </div>
            <button
                class="bg-accentDark/60 hover:bg-accentDark transition w-full text-center font-bold py-2 text-white rounded-xl mb-1">Turn
                On</button>
        </div>
    </div>
@endsection
