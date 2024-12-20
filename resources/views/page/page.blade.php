@extends('layout.home')
@push('scriptHead')
    <link 
      href="https://cdn.jsdelivr.net/npm/shareon@2/dist/shareon.min.css"
      rel="stylesheet"
    >
    <script
      src="https://cdn.jsdelivr.net/npm/shareon@2/dist/shareon.iife.js"
      defer
      init
    ></script>
@endpush
@section('content')
    <div class="container mx-auto" x-data="data">
        {{-- Breadcumbs --}}
        <div class="text-slate-400 flex items-center gap-2 text-xs p-5">
            <ion-icon name="home"></ion-icon><ion-icon name="chevron-forward"></ion-icon><span
                class="truncate">{{ $page }}</span><ion-icon name="chevron-forward"></ion-icon><span
                class="truncate w-28">{{ $data->title }}</span>
        </div>
        <div class="prose md:max-w-none">
            <div class="bg-gray-50 md:bg-transparent md:pb-20 p-5 grid grid-cols-1 md:grid-cols-2 md:gap-10 xl:gap-20">
                <div class="h-72 md:h-96 overflow-hidden">
                    <img src="{{ $data->image_url }}" class="w-full h-full rounded-xl object-contain" alt="">
                </div>
                <div>
                    <div class="font-bold text-3xl text-center md:text-left my-3">
                        {{ $data->title }}
                    </div>
                    <div class="mx-auto mt-2">
                        <div class="shareon flex justify-center md:justify-start flex-wrap">
                            <a class="facebook"></a>
                            <a class="linkedin"></a>
                            <a class="pinterest"></a>
                            <a class="telegram"></a>
                            <a class="twitter"></a>
                            <a class="whatsapp"></a>
                            <a class="copy-url"></a>
                            <a class="email"></a>
                            <a class="print"></a>
                            <!-- Does not work in every browser -->
                            <a class="web-share"></a>
                        </div>
                    </div>

                </div>
            </div>



        </div>
        <div class="prose lg:prose-xl px-3 md:px-0 font-Inter">
            {!! $data->content !!}
        </div>
    </div>
    
    </div>

    <div class="clear-left"></div>
@endsection

@push('scriptBody')
    <script>
        const data = {
            share() {
                const data = {
                    title: "{{ $data->title }}",
                    url: "{{ url()->current() }}"
                }
                navigator.share(data);
            }
        }
    </script>
@endpush
