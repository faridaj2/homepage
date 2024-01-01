@extends('layout.home')
@section('content')
    <div class="container mx-auto mt-5 px-2 -z-10">
        <div class="px-4 flex flex-wrap">
            <div class="w-full md:w-12/12 lg:w-10/12 flex flex-wrap">
                @foreach ($data as $item)
                    <div class="w-full md:w-1/3 lg:w-1/4 p-2">
                        <div class="w-full h-36 overflow-hidden">
                            <img src="{{ $item->image_url }}" alt="" class="w-full h-full object-center object-cover">
                        </div>
                        <div>
                            <h1 class="font-Petrona font-bold line-clamp-2">{{ $item->title }}</h1>
                            <span class="text-xs text-slate-400">24, Nov 2023</span>
                            <p class="text-xs text-slate-500 line-clamp-3 my-4">
                                {{ html_entity_decode(strip_tags($item->content)) }}</p>
                            <a href="/warta/{{ $item->id }}"
                                class="my-3 bg-green-600 transition hover:bg-black text-sm p-2 font-bold text-white mt-3">Read
                                more...</a>
                        </div>
                    </div>
                @endforeach
                <div class="w-full">
                    {{ $data->links() }}
                </div>
            </div>

            <div class="px-3 lg:pl-8 w-full lg:w-2/12">
                <h1 class="font-bold text-green-600 uppercase tracking-wide my-3">Random Artikel</h1>
                <hr>
                <div class="flex flex-col gap-4">
                    @foreach ($random as $item)
                        <a href="/warta/{{ $item->id }}" class="hover:text-green-600">
                            <span class="text-sm font-Petrona tracking-tight cursor-pointer ">{{ $item->title }}</span><br>
                            <span class="text-xs bg-green-700 text-white p-1 hover:bg-green-500">Santri</span>
                        </a>
                    @endforeach


                </div>
            </div>
        </div>

    </div>
@endsection
