@extends('layout.home')
@section('content')
    <div class="container mx-auto">
        {{-- Breadcumbs --}}
        <div class="text-slate-400 flex items-center gap-3 text-xs p-5">
            <ion-icon name="home"></ion-icon><ion-icon name="chevron-forward"></ion-icon>{{ $page }}<ion-icon
                name="chevron-forward"></ion-icon><span>{{ $data->title }}</span>
        </div>
        <div class="p-5 prose md:max-w-none">
            <h1 class="text-left">{{ $data->title }}</h1>
            <div class="max-h-96 w-52 mx-auto overflow-hidden">
                <img src="{{ $data->image_url }}" class="w-full h-full object-cover object-center m-3 rounded shadow"
                    alt="">
            </div>

            <div class="text-clip text-wrap overflow-hidden max-w-sm md:max-w-none">
                {!! $data->content !!}
            </div>
        </div>
    </div>
    <div class="clear-left"></div>
@endsection
