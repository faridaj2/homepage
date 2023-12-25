@extends('layout.home')
@section('content')
    <div class="container mx-auto mt-5 px-2 -z-10">
        <div class="px-4 flex flex-wrap">
            <div class="w-full md:w-12/12 lg:w-10/12 flex flex-wrap">
                @for ($i = 0; $i < 7; $i++)
                    <div class="w-full md:w-1/3 lg:w-1/4 p-2">
                        <div class="w-full h-36 overflow-hidden">
                            <img src="http://127.0.0.1:8000/storage/file/Bt1suBtU8FSC6XGHCoggj3DpfPQ0kCagRhObY0Rh.png"
                                alt="" class="w-full h-full object-center object-cover">
                        </div>
                        <div>
                            <h1 class="font-Petrona font-bold">Lorem ipsum dolor sit.</h1>
                            <span class="text-xs text-slate-400">24, Nov 2023</span>
                            <hr>
                            <p class="text-xs text-slate-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                Saepe
                                laborum, voluptas
                                explicabo
                                corrupti animi ullam perferendis expedita, sequi asperiores magni labore at soluta....</p>
                            <button
                                class="my-3 bg-green-600 transition hover:bg-black text-sm p-2 font-bold text-white">Read
                                more...</button>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="px-3 lg:pl-8 w-full lg:w-2/12">
                <h1 class="font-bold text-green-600 uppercase tracking-wide my-3">Random Artikel</h1>
                <hr>
                <div class="flex flex-col gap-4">
                    @for ($i = 0; $i < 7; $i++)
                        <div class="">
                            <a class="text-xl font-Petrona tracking-tight cursor-pointer">Lorem ipsum dolor sit.</a><br>
                            <span class="text-xs bg-green-700 text-white p-1">Santri</span>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
