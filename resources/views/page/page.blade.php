@extends('layout.home')
@section('content')
    <div class="container mx-auto">
        {{-- Breadcumbs --}}
        <div class="text-slate-400 flex items-center gap-2 text-xs p-5">
            <ion-icon name="home"></ion-icon><ion-icon name="chevron-forward"></ion-icon><span
                class="truncate">{{ $page }}</span><ion-icon name="chevron-forward"></ion-icon><span
                class="truncate w-28">{{ $data->title }}</span>
        </div>
        <div class="prose md:max-w-none">
            <div
                class="bg-gray-50 md:bg-transparent md:border-b md:pb-20 p-5 grid grid-cols-1 md:grid-cols-2 md:gap-10 xl:gap-20">
                <div class="h-72 md:h-96 overflow-hidden rounded-xl">
                    <img src="{{ $data->image_url }}" class="w-full h-full rounded-xl object-contain" alt="">
                </div>
                <div>
                    <div class="my-10 md:my-7">
                        <span
                            class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs shadow-md shadow-blue-300">Darussalam
                            Blokagung 2</span>
                    </div>
                    <div class="font-bold text-3xl">
                        {{ $data->title }}
                    </div>
                </div>
            </div>

            <div class="text-clip text-wrap overflow-hidden max-w-sm md:max-w-none px-5">

                {!! $data->content !!}
            </div>
        </div>
    </div>
    <div class="clear-left"></div>
@endsection
