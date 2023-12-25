@extends('layout.home')
@section('content')
    <div class="container mx-auto">
        {{-- Breadcumbs --}}
        <div class="text-slate-400 flex items-center gap-3 text-xs p-5">
            <ion-icon name="home"></ion-icon><ion-icon name="chevron-forward"></ion-icon>{{ $page }}<ion-icon
                name="chevron-forward"></ion-icon><span>{{ $data->title }}</span>
        </div>
        <div class="p-5 prose max-w-none text-justify">
            <h1>{{ $data->title }}</h1>
            <img class="max-w-sm rounded-md shadow-costum1 md:m-5 mx-auto md:float-left" src="{{ $data->image_url }}"
                alt="">
            {!! $data->content !!}
        </div>
    </div>
    <div class="clear-left"></div>
@endsection
