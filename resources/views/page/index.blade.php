@extends('layout.home')

@section('content')
    <div class="container mx-auto mt-5 px-2 -z-10">
        {{-- Berita --}}
        <div class="bg-black text-white font-semibold inline-block p-2 text-xs mb-1">Berita Terkini</div>
        <div class="md:flex md:flex-row flex-wrap flex flex-col gap-5 md:gap-0">
            @foreach ($berita as $item)
                <a href="/warta/{{ $item->id }}"
                    class="group md:h-52 md:overflow-hidden md:[&:nth-child(1)]:w-1/2 md:[&:nth-child(2)]:w-1/2 md:w-1/4 relative p-[2px] px-[1px]">
                    <div class="group-[:nth-child(1)]:block flex gap-2">

                        <div
                            class="h-24 w-full md:h-52 overflow-hidden group-[:nth-child(1)]:w-full group-[:nth-child(1)]:h-52 bg-slate-500 relative">
                            <img src="{{ $item->image_url }}"
                                class="group-hover:scale-150 transition-all object-cover object-center h-full w-screen md:brightness-50 hover:brightness-100"
                                alt="">
                            <span class="absolute bottom-0 bg-black/75 text-white text-sm px-2 font-Petrona">Santri</span>
                        </div>
                        <div class="md:absolute md:transition-all md:-bottom-56 md:group-hover:bottom-7 md:px-2 w-full">
                            <h1
                                class="font-Petrona text-green-900 md:text-white font-bold text-xs group-[:nth-child(1)]:text-xl group-[:nth-child(1)]:md:text-xs">
                                {{ $item->title }}</h1>
                            <span class="text-xs text-slate-400">- {{ $item->created_at }}</span>
                            <p
                                class="text-sm text-slate-700 md:hidden hidden group-[:nth-child(1)]:line-clamp-2 max-w-sm group-[:nth-child(1)]:md:hidden">
                                {{ html_entity_decode(strip_tags($item->content)) }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>



        {{-- End Of Berita --}}
        {{-- Visi & Misi --}}
        <div class="border-b-2 block w-full border-solid border-black mb-10 mt-16">
            <div class="bg-black text-white font-semibold inline-block p-2 text-xs mt-5 ">Falsafah Pondok</div>
        </div>
        <div class="flex flex-col gap-32 md:flex-row md:justify-evenly lg:gap-52">
            <div>
                <h1 class="font-Petrona font-bold text-4xl text-center">Visi</h1>
                <p class="font-light text-slate-400 text-center px-5 my-5 ">
                    "Terwujudnya santri yang bertaqwa, Kuat & Mandiri".
                </p>

            </div>
            <div>
                <h1 class="font-Petrona font-bold text-4xl text-center">Misi</h1>
                <p class="font-light text-slate-400 text-center px-5 my-5 ">
                    Memberikan bekal <strong>Agama</strong> kuat. <br>
                    Meningkatkan Kualitas sumber daya menusia seutuhnya. <br>
                    Mencetak generasi muda yang berkualitas dalam agama dan pengetahuan umum. <br>
                    Memberi bekal dengan keterampilan, keagamaan, sosial, dan teknologi
                </p>

            </div>


        </div>
        {{-- end Visi & Misi --}}

        {{-- Contact --}}

        <div class="border-b-2 block w-full border-solid border-black mt-16">
            <div class="bg-black text-white font-semibold inline-block p-2 text-xs mt-5">Pusat Informasi</div>
        </div>
        <div class="p-5 flex gap-2">
            <a href="/pendaftaran" class="bg-black text-white font-bold py-2 px-4 rounded-md">
                Pusat Informasi Pendaftaran
            </a>
            <a href="/kontak" class="bg-black text-white font-bold py-2 px-4 rounded-md">
                Pusat Informasi Pondok Pesantren & Hubungan
            </a>
        </div>
        {{-- End Contact --}}








    </div>
@endsection
