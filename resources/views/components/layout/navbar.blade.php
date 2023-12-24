@php
    $navbarData = app('App\Http\Controllers\Controller')->navData();
@endphp

<div class="shadow-md" x-data="{ open: false }">
    <div class="container mx-auto sm:hidden">
        <div x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
            class="flex justify-between p-3  px-5 items-center" x-show="open == false">
            <ion-icon name="menu-outline" class="text-3xl font-bold" @click="open=!open"></ion-icon>
            <div class="h-10">
                <x-logo.logo class="" />
            </div>
            <ion-icon name="search-outline" class="text-2xl"></ion-icon>
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
                                <li class="py-3"><a href="/profil-pimpinan/1">KH. M. Hisyam
                                        Syafaat</a></li>
                                <li class="py-3">KH. M. Riza Azizy, M.IEB</li>
                                <li class="py-3">KH. M. Bahrul Ulum Mubarok</li>

                                @foreach ($navbarData['pendidikan'] as $item)
                                    <li class="py-3">{{ $item->title }}</li>
                                @endforeach


                            </ul>
                        </li>
                        <li class="flex flex-wrap justify-between items-center group/submenu2">Pendidikan <ion-icon
                                name="chevron-forward-outline"
                                class="block group-hover/submenu2:hidden"></ion-icon><ion-icon
                                name="chevron-down-outline" class="hidden group-hover/submenu2:block"></ion-icon>
                            <ul class="w-full ml-5 my-3 group-hover/submenu2:block hidden">
                                <li class="py-3">Madin Darul Adzkiya'</li>
                                <li class="py-3">SMK Darussalam Blokagung 2</li>
                                <li class="py-3">SMP Darussalam Blokagung 2</li>
                                <li class="py-3">TK Miftahul Huda</li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="group/submenu flex flex-wrap items-center justify-between"><a href="#">Sejarah
                    </a><ion-icon name="chevron-forward-outline"
                        class="block group-hover/submenu:hidden"></ion-icon><ion-icon name="chevron-down-outline"
                        class="hidden group-hover/submenu:block"></ion-icon>
                    <ul class="flex-col w-full text-xs gap-3 my-3 ml-5 pr-5 hidden group-hover/submenu:flex">
                        <li class="">Latar Belakang
                        </li>
                        <li class="">Selayang Pandang
                        </li>
                        <li class="">Sintesa
                        </li>
                    </ul>
                </li>
                <li class="flex items-center justify-between"><a href="#">Warta</a></li>
                <li class="flex items-center justify-between"><a href="#">Pendaftaran</a></li>
                <li class="flex items-center justify-between"><a href="#">Kontak & Alamat</a></li>
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
                                        href="/pendidikan/{{ $item->id }}">{{ $item->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li class="line"><a href="#">Warta</a></li>
                <li class="line"><a href="#">Pendaftaran</a></li>
                <li class="line"><a href="#">Kontak & Alamat</a></li>
            </ul>
            <ion-icon name="search-outline" class="text-2xl"></ion-icon>
        </div>
    </div>

</div>
