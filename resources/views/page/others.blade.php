@extends('layout.home')
@section('content')
    <div class="container mx-auto">
        {{-- Breadcumbs --}}
        <div class="text-slate-400 flex items-center gap-1 text-xs p-5 ">
            <ion-icon name="home"></ion-icon><ion-icon name="chevron-forward"></ion-icon>{{ $page }}<ion-icon
                name="chevron-forward"></ion-icon><span>{{ $title }}</span>
        </div>
        <div class="p-5 prose md:max-w-none">
            <div class="text-clip text-wrap overflow-hidden max-w-sm md:max-w-none">
                @if (isset($content->content))
                    {!! $content->content !!}
                @endif
            </div>
        </div>
    </div>
    <div class="clear-left"></div>
@endsection
