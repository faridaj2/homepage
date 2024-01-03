@php
    $navbarData = app('App\Http\Controllers\Controller')->navData();
@endphp

<div class="shadow-md" x-data="navbar">
    <div class="container mx-auto sm:hidden">
        <div x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
            class="flex justify-between p-3  px-5 items-center" x-show="open == false">
            <ion-icon name="menu-outline" class="text-3xl font-bold" @click="open=!open"></ion-icon>
            <div class="h-10">
                <x-logo.logo class="" />
            </div>
            <ion-icon name="search-outline" @click="search=!search" class="text-2xl"></ion-icon>
        </div>
        <div x-show="open" x-transition:enter="transition-all ease-out duration-300"
            x-transition:enter-start="-left-full" x-transition:enter-end="left-0"
            x-transition:leave="transition-all ease-in duration-300" x-transition:leave-start="left-0"
            x-transition:leave-end="left-full opacity-0"
            class="bg-black text-white min-h-screen px-3 absolute w-full top-0 z-50">
            <div class="text-white flex justify-end text-2xl p-5" @click="open=!open"><ion-icon
                    name="close-outline"></ion-icon></div>
            <ul class="flex flex-col gap-x-5 transition-all gap-y-3 pt-3 font-semibold px-5">
                <li class="text-amber-400 flex items-center justify-between"><a href="/">Beranda</a>

                </li>
                <li class="group/submenu flex flex-wrap items-center justify-between"><a href="#">Tentang
                    </a><ion-icon name="chevron-forward-outline"
                        class="block group-hover/submenu:hidden"></ion-icon><ion-icon name="chevron-down-outline"
                        class="hidden group-hover/submenu:block"></ion-icon>
                    <ul class="flex-col w-full text-xs gap-3 my-3 ml-5 pr-5 hidden group-hover/submenu:flex">
                        <li class="flex flex-wrap justify-between items-center group/submenu2">Profil Pimpinan <ion-icon
                                name="chevron-forward-outline"
                                class="block group-hover/submenu2:hidden"></ion-icon><ion-icon
                                name="chevron-down-outline" class="hidden group-hover/submenu2:block"></ion-icon>
                            <ul class="w-full ml-5 my-3 group-hover/submenu2:block hidden">
                                @foreach ($navbarData['pemimpin'] as $item)
                                    <li class="py-3"><a
                                            href="/profil-pimpinan/{{ $item->id }}">{{ $item->title }}</a></li>
                                @endforeach


                            </ul>
                        </li>
                        <li class="flex flex-wrap justify-between items-center group/submenu2">Pendidikan <ion-icon
                                name="chevron-forward-outline"
                                class="block group-hover/submenu2:hidden"></ion-icon><ion-icon
                                name="chevron-down-outline" class="hidden group-hover/submenu2:block"></ion-icon>
                            <ul class="w-full ml-5 my-3 group-hover/submenu2:block hidden">
                                @foreach ($navbarData['pendidikan'] as $item)
                                    <li class="py-3"><a href="/pendidikan/{{ $item->id }}">{{ $item->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="group/submenu flex flex-wrap items-center justify-between"><a href="#">Sejarah
                    </a><ion-icon name="chevron-forward-outline"
                        class="block group-hover/submenu:hidden"></ion-icon><ion-icon name="chevron-down-outline"
                        class="hidden group-hover/submenu:block"></ion-icon>
                    <ul class="flex-col w-full text-xs gap-3 my-3 ml-5 pr-5 hidden group-hover/submenu:flex">
                        @foreach ($navbarData['sejarah'] as $item)
                            <li class="py-3"><a href="/sejarah/{{ $item->id }}">{{ $item->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="flex items-center justify-between"><a href="/warta">Warta</a></li>
                <li class="flex items-center justify-between"><a href="/pendaftaran">Pendaftaran</a></li>
                <li class="flex items-center justify-between"><a href="/kontak">Kontak & Alamat</a></li>
                @auth

                    <li class="flex items-center justify-between"><a href="/logout">Logout</a></li>
                @endauth
                @guest
                    <li class="flex items-center justify-between"><a href="/login">Login</a></li>

                @endguest
            </ul>
        </div>
    </div>
    <div class="container mx-auto justify-between px-5 items-center sm:flex hidden">
        <span
            class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none">
            <div class="h-10">
                <x-logo.logo class="" />
            </div>
        </span>
        <div class="flex gap-x-10 items-center">
            <ul class="flex gap-x-6 font-Petrona font-bold">
                <li class="line"><a href="/">Beranda</a></li>
                <li class="line group/submenu"><a href="#">Tentang <ion-icon
                            name="chevron-down-outline"></ion-icon>
                    </a>
                    <div
                        class="absolute bg-white shadow top-12 z-40 group-hover/submenu:block hidden hover:block text-xs">
                        <ul class="flex flex-col gap-3 py-3">
                            <li class="group/submenu2 submenu menu-hover">
                                <div class="flex items-center w-52 justify-between"><span>Profil Pimpinan</span>
                                    <ion-icon class="order-3" name="chevron-forward-outline"></ion-icon>
                                </div>
                                <div
                                    class="absolute bg-white shadow top-0 left-full z-40 w-52 group-hover/submenu2:block hidden hover:block group-hover/submenu:text-black">
                                    <ul class="flex flex-col py-3 gap-3">

                                        @foreach ($navbarData['pemimpin'] as $item)
                                            <li class="submenu menu-hover"><a
                                                    href="/profil-pimpinan/{{ $item->id }}">{{ $item->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li class="group/submenu2 submenu menu-hover">
                                <div class="flex items-center w-52 justify-between"><span>Pendidikan</span>
                                    <ion-icon class="order-3" name="chevron-forward-outline"></ion-icon>
                                </div>
                                <div
                                    class="absolute bg-white shadow top-0 left-full z-40 w-52 group-hover/submenu2:block hidden hover:block group-hover/submenu:text-black">
                                    <ul class="flex flex-col py-3 gap-3">

                                        @foreach ($navbarData['pendidikan'] as $item)
                                            <li class="submenu menu-hover"><a
                                                    href="/pendidikan/{{ $item->id }}">{{ $item->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                </li>
                <li class="line group/submenu"><a href="#">Sejarah <ion-icon
                            name="chevron-down-outline"></ion-icon></a>
                    <div
                        class="absolute bg-white shadow top-12 z-40 group-hover/submenu:block hidden hover:block text-xs">
                        <ul class="flex flex-col gap-3 py-3">

                            @foreach ($navbarData['sejarah'] as $item)
                                <li class="submenu menu-hover"><a class="flex items-center w-52 justify-between"
                                        href="/sejarah/{{ $item->id }}">{{ $item->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="line"><a href="/warta">Warta</a></li>
                <li class="line"><a href="/pendaftaran">Pendaftaran</a></li>
                <li class="line"><a href="/kontak">Kontak & Alamat</a></li>


            </ul>
            <ion-icon name="search-outline" class="text-2xl hover:cursor-pointer"
                @click="searchDesktop = !searchDesktop"></ion-icon>
            @auth

                <div
                    class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                    <a href="/logout">Logout</a>
                </div>
            @endauth
            @guest
                <div
                    class="text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                    <a href="/login">Login</a>
                </div>
            @endguest
        </div>
    </div>

    <div class="fixed bg-black/90 z-50 backdrop-blur-md shadow w-full h-screen top-0" x-show="search"
        x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="w-2 -top-52"
        x-transition:enter-end="top-0" x-transition:leave="transition-all ease-in duration-300"
        x-transition:leave-start="top-0" x-transition:leave-end="top-52 w-2">
        <div>
            <div class="text-white flex justify-end"><ion-icon name="close-outline" @click="search=!search"
                    class="text-4xl m-3 cursor-pointer"></ion-icon>
            </div>
            <div class="text-xs text-white text-center">Search</div>
            <div class="mx-4">
                <input type="text"
                    class="bg-black outline-none border-b border-x-0 border-t-0 w-full  focus:ring-0 text-white"
                    name="" id="" x-model="input" @change="handleSubmit">
            </div>
            <div class="py-3 flex flex-col gap-3">
                <template x-for="news in news">
                    <a href="#" :href="`/warta/${news.id}`" class="text-white">
                        <div class="gap-2 flex justify-normal mx-2">
                            <div class="w-[100px] h-[100px] overflow-hidden text-white shrink-0">
                                <img class="object-cover w-full h-full" :src="news.image_url" alt="">
                            </div>
                            <div>
                                <p class="line-clamp-3 font-semibold overflow-clip" x-text="news.title">news.title
                                </p>

                                <span class="text-xs font-light my-5 text-white/70" x-text="news.created_at">31,
                                    December 2023</span>
                            </div>

                        </div>
                    </a>
                </template>
                <div class="text-white text-center" x-show="notFound">Hasil Tidak Ditemukan</div>
                <div class="w-full flex justify-center pt-20" x-show="loadingSearchMobile">
                    <div class="lds-roller mobile">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div x-show="news.length > 0" class="mt-auto text-center"><a href="" :href="`/warta?q=${url}`"
                        class="text-xs text-violet-300 hover:text-violet-800">Lihat Selengkapnya...</a>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute w-full top-0 bg-black/25 h-screen z-20 backdrop-blur-sm flex justify-center items-center"
        x-show="searchDesktop">
        <div class="w-full max-w-xl bg-white shadow flex justify-start flex-col p-4 h-96 rounded"
            @click.outside="searchDesktop = !searchDesktop">

            <input type="text" name="" id="" class="rounded w-full" x-model="input"
                @change="handleSubmit">
            <div class="flex flex-col gap-2 mt-3 overflow-y-scroll scroll-style">
                <template x-for="news in news">
                    <a href="#" :href="`/warta/${news.id}`" class="">
                        <div class="gap-2 flex justify-normal mx-2">
                            <div class="w-[100px] h-[100px] overflow-hidden text-black shrink-0">
                                <img class="object-cover w-full h-full" :src="news.image_url" alt="">
                            </div>
                            <div>
                                <p class="line-clamp-3 font-semibold overflow-clip" x-text="news.title">news.title
                                </p>

                                <span class="text-xs font-light my-5 text-black/70" x-text="news.created_at">31,
                                    December 2023</span>
                            </div>

                        </div>
                    </a>
                </template>
            </div>
            <div class="w-full flex justify-center pt-20" x-show="loadingSearchMobile">
                <div class="lds-roller md-screen">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="w-full h-full" x-show="notFound">
                <div class="text-5xl w-full flex justify-center">
                    <div class="flex flex-col justify-center items-center gap-6">
                        <ion-icon name="alert-circle-outline"></ion-icon>
                        <h1 class="text-xs text-slate-400 tracking-wide">Tidak ditemukan....</h1>
                    </div>
                </div>
            </div>
            <div x-show="news.length > 0" class="mt-auto"><a href="" :href="`/warta?q=${url}`"
                    class="text-xs text-violet-300 hover:text-violet-800">Lihat Selengkapnya...</a>
            </div>
        </div>
    </div>

</div>
