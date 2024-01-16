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
            <img class="rounded-md block mx-auto max-xs:w-full " src="{{ $data->image_url }}" alt="">

            <div class="text-clip text-wrap overflow-hidden max-w-sm md:max-w-none">
                {!! $data->content !!}
            </div>
        </div>
    </div>
    <div class="clear-left"></div>
@endsection
