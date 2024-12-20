@extends('layout.home')
@section('content')
    <div class="container mx-auto mt-5 px-2 -z-10">

        <form class="mx-6 mb-5" method="get" action="/warta">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none ">
                    <svg class="w-4 h-4 text-gray-500 
                    " aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" name="q" id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-100 rounded-lg bg-gray-50 focus:border-gray-200  focus:ring-0 placeholder:text-gray-400
                    "
                    placeholder="Cari Berita..." required>
                <button type="submit"
                    class="text-green-700 absolute end-2.5 bottom-2.5 bg-green-300 hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 flex items-center h-9 ">Search</button>
            </div>
        </form>

        @if (count($beritas) == 0)
            <div class="px-6 flex justify-center">
                <div class="text-slate-500">Data tidak ditemukan</div>
            </div>
        @endif
        <div class="px-4 flex flex-wrap">
            <div class="w-full md:w-12/12 lg:w-10/12 flex flex-wrap">
                @foreach ($beritas as $item)
                    <div class="w-full md:w-1/3 lg:w-1/4 p-2">
                        <div class="w-full h-36 overflow-hidden">
                            <img src="{{ $item->image_url }}" alt=""
                                class="w-full h-full object-center object-cover">
                        </div>
                        <div>
                            <h1 class="font-Petrona font-bold line-clamp-2">{{ $item->title }}</h1>
                            <span class="text-xs text-slate-400">{{ $item->created_at->format('d F Y') }}</span>
                            <p class="text-xs text-slate-500 line-clamp-3 my-4">
                                {{ html_entity_decode(strip_tags($item->content)) }}</p>
                            <a href="/warta/{{ $item->slug }}"
                                class="my-3 bg-green-600 transition hover:bg-black text-sm p-2 font-bold text-white mt-3">Read
                                more...</a>
                        </div>
                    </div>
                @endforeach
                <div class="w-full">
                    {{ $beritas->links() }}
                </div>
            </div>

            <div class="px-3 lg:pl-8 w-full lg:w-2/12">
                <h1 class="font-bold text-green-600 uppercase tracking-wide my-3">Random Artikel</h1>
                <hr>
                <div class="flex flex-col gap-4">
                    @foreach ($random as $item)
                        <a href="/warta/{{ $item->slug }}" class="hover:text-green-600">
                            <span class="text-sm font-Petrona tracking-tight cursor-pointer ">{{ $item->title }}</span><br>
                            <span class="text-xs bg-green-700 text-white p-1 hover:bg-green-500">Santri</span>
                        </a>
                    @endforeach


                </div>
            </div>
        </div>


    </div>
@endsection
