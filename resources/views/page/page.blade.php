@extends('layout.home')
@push('scriptHead')
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
                    <div>
                        <button @click="share" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Bagikan
                            halaman ini.</button>
                    </div>
                </div>
            </div>

            <div class="text-clip text-wrap text-justify overflow-hidden max-w-sm md:max-w-none px-5">
                {!! $data->content !!}

            </div>

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
