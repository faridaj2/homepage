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
            <img src="http://i.minus.com/i1UqMXjOhoUzH.jpg" alt="Facebook" width="64" height="64"></a> |
        <a href="http://twitter.com/share?text={{ urlencode($title) }}&url={{ urlencode($url) }}&via=shemul49rmc&related={{ urlencode('shemul49rmc:Support me') }}"
            title="Share on Twitter" rel="nofollow" target="_blank">
            <img src="http://i.minus.com/ibmtAwKz1BAcLO.png" alt="Twitter" width="64" height="64"></a> |
        <a href="https://plus.google.com/share?url={{ urlencode($url) }}"
            onclick="window.open('https://plus.google.com/share?url={{ urlencode($url) }}','gplusshare','width=600,height=400,left='+(screen.availWidth/2-225)+',top='+(screen.availHeight/2-150)+'');return false;">
            <img src="http://i.minus.com/izAImJGqELkX1.png" alt="Google Plus" width="64" height="64"></a> |
        <div>
            <a href="http://www.reddit.com/submit?url={{ urlencode($url) }}&amp;title={{ urlencode($title) }}"
                title="Reddit" rel="nofollow" target="_blank">Reddit</a> |
            <a href="http://www.stumbleupon.com/submit?url={{ urlencode($url) }}&amp;title={{ urlencode($title) }}"
                title="Stumble it" rel="nofollow" target="_blank">Stumble it</a> |
            <a href="http://digg.com/submit?url={{ urlencode($url) }}&amp;title={{ urlencode($title) }}"
                title="Digg this!" rel="nofollow" target="_blank">Digg this!</a> |
            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;title={{ urlencode($title) }}&amp;url={{ urlencode($url) }}"
                title="Share on LinkedIn" rel="external nofollow" rel="nofollow" target="_blank">Share on LinkedIn</a> |
            <a href="http://pinterest.com/pin/create/button/?url={{ urlencode($url) }}&media={{ urlencode($imageUrl) }}"
                title="Pinterest" rel="nofollow" target="_blank">Pinterest</a> |
            <a href="http://del.icio.us/post?url={{ urlencode($url) }}&amp;title={{ urlencode($title) }}"
                title="Bookmark on del.icio.us" rel="nofollow" target="_blank">Del.icio.us</a>
        </div>
    </div>
    </div>

    <div class="clear-left"></div>
@endsection
