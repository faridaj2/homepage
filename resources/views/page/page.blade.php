@extends('layout.home')
@slot('scriptHead')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor89s+R7ZgvYgS6ZS+9lpjOP8Imw1XWhWcqE4l9F45D9w7j4lI9RpP/i9c="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endslot
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
                    <div class="my-10 md:my-7 flex justify-center md:justify-start">
                        <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs shadow-md shadow-blue-300 ">PP.
                            Darussalam
                            Blokagung 2</span>
                    </div>
                    <div class="font-bold text-3xl">
                        {{ $data->title }}
                    </div>
                </div>
            </div>

            <div class="text-clip text-wrap text-justify overflow-hidden max-w-sm md:max-w-none px-5">

                {!! $data->content !!}
            </div>
        </div>
        <b>Share This:</b>
        @php
            $post = $data;
            $url = url()->current();
            $title = $post->title;
            $imageUrl = $post->image_url;
        @endphp

        <a target="_blank" href="http://www.facebook.com/sharer.php?u={{ urlencode($url) }}&t={{ urlencode($title) }}">
            <ion-icon name="logo-facebook"></ion-icon>
        </a> |
        <a href="http://twitter.com/share?text={{ urlencode($title) }}&url={{ urlencode($url) }}&via=shemul49rmc&related={{ urlencode('shemul49rmc:Support me') }}"
            title="Share on Twitter" rel="nofollow" target="_blank">
            <ion-icon name="logo-twitter"></ion-icon>
        </a> |
        <a href="https://plus.google.com/share?url={{ urlencode($url) }}"
            onclick="window.open('https://plus.google.com/share?url={{ urlencode($url) }}','gplusshare','width=600,height=400,left='+(screen.availWidth/2-225)+',top='+(screen.availHeight/2-150)+'');return false;">
            <ion-icon name="logo-google"></ion-icon>
        </a> |
        <a href="https://api.whatsapp.com/send?text={{ urlencode($title) }}%20-%20{{ urlencode($url) }}" target="_blank">
            <ion-icon name="logo-whatsapp"></ion-icon>
        </a> |

    </div>
    </div>

    <div class="clear-left"></div>
@endsection
