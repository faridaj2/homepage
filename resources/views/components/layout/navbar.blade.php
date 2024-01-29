@php
    $navbarData = app('App\Http\Controllers\Controller')->navData();
    $currentUrl = request()->path();

@endphp
<nav class="container mx-auto max-lg:px-2 md:px-0  max-w-7xl" x-data="{ nav: false }">
    <div class="flex justify-between items-center px-5 py-5 max-w-7xl">
        <div class="text-3xl text-accentDark flex items-center lg:hidden">
            <ion-icon name="menu-outline" @click="nav = true"
                class="text-gray-500 bg-gray-100 px-3 py-2  rounded-lg tra hover:bg-blue-100 hover:text-blue-700 transition ease-in-out delay-150"></ion-icon>

        </div>
        <a href="/" class="h-9">
            <img src="/img/Logo.png" class="h-full w-full" alt="">
        </a>
        <div class="lg:flex gap-3 items-center">
            <div class="lg:flex gap-5 hidden text-gray-500" id="menu-lg">
                <a href="/"
                    class="p-1 rounded-xl hover:bg-gray-100 px-3 {{ $currentUrl === '/' ? 'active' : '' }}">Berada</a>
                <button
                    class="p-1 rounded-xl hover:bg-gray-100 px-3 menu-parent relative {{ strpos($currentUrl, 'profil-pimpinan') !== false || strpos($currentUrl, 'pendidikan') !== false ? 'active' : '' }}">

                    <div>Tentang <ion-icon name="chevron-down-outline" class="transition  icon"></ion-icon>
                    </div>
                    <div
                        class="absolute w-52 z-50 h-0 overflow-hidden border-gray-100  bg-white mt-3 shadow text-left rounded menu-child">
                        <div class="child-menu">
                            <div class="flex items-center p-2 justify-between  hover:bg-slate-100">Profil
                                Pimpinan
                                <ion-icon name="chevron-down-outline" class="icon transition"></ion-icon>
                            </div>
                            <div class="h-0 child-item ml-2 overflow-hidden">
                                @foreach ($navbarData['pemimpin'] as $item)
                                    <a class="pl-3 border-l-2 border-gray-300 block truncate pr-5"
                                        href="/profil-pimpinan/{{ $item->id }}">{{ $item->title }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="child-menu">
                            <div class="flex items-center p-2 justify-between hover:bg-slate-100">Pendidikan
                                <ion-icon name="chevron-down-outline" class="icon transition"></ion-icon>
                            </div>
                            <div class="h-0 child-item ml-2 overflow-hidden">
                                @foreach ($navbarData['pendidikan'] as $item)
                                    <a class="pl-3 border-l-2 border-gray-300 block truncate pr-5"
                                        href="/pendidikan/{{ $item->id }}">{{ $item->title }}</a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </button>
                <button
                    class="p-1 rounded-xl hover:bg-gray-100 px-3 menu-parent relative {{ strpos($currentUrl, 'sejarah') !== false ? 'active' : '' }}">
                    <div>Sejarah <ion-icon name="chevron-down-outline" class="icon transition"></ion-icon></div>
                    <div
                        class="absolute w-52 z-50 h-0 overflow-hidden border-gray-100  bg-white mt-3 shadow text-left rounded menu-child">
                        @foreach ($navbarData['sejarah'] as $item)
                            <a class="pl-3 border-l block truncate hover:bg-gray-100"
                                href="/sejarah/{{ $item->id }}">{{ $item->title }}</a>
                        @endforeach
                    </div>
                </button>
                <a href="/warta"
                    class="p-1 rounded-xl hover:bg-gray-100 px-3 {{ strpos($currentUrl, 'warta') !== false ? 'active' : '' }}">Warta</a>
                <a href="/pendaftaran"
                    class="p-1 rounded-xl hover:bg-gray-100 px-3 {{ $currentUrl === 'pendaftaran' ? 'active' : '' }}">Pendaftaran</a>
                <a href="/kontak"
                    class="p-1 rounded-xl hover:bg-gray-100 px-3 {{ $currentUrl === 'kontak' ? 'active' : '' }}">Kontak
                    & Alamat</a>
            </div>
            @auth
                <a href="/pspdb"
                    class="text-gray-500 bg-gray-100 px-3 py-2  rounded-lg tra hover:bg-blue-100 hover:text-blue-700 transition ease-in-out delay-150 font-semibold">
                    Dashboard
                </a>
            @endauth
            @guest
                <a href="/login"
                    class="text-gray-500 bg-gray-100 px-3 py-2  rounded-lg tra hover:bg-blue-100 hover:text-blue-700 transition ease-in-out delay-150 font-semibold">
                    Login
                </a>
            @endguest
        </div>
    </div>
    {{-- Mobile Menu Aside --}}
    <div class="fixed z-50 top-0 bg-white min-h-screen w-72 border-r border-gray-100 p-3 transition-all ease-in-out"
        :class="nav ? 'left-0' : '-left-96'"">
        <div class="py-3 px-3 flex justify-between items-center text-xl">
            <h2 class="font-semibold text-blue-500 h-10">
                <img src="/img/Logo.png" class="h-full w-full" alt="">
            </h2>
            <ion-icon name="close" class="text-blue-500" @click="nav = false"></ion-icon>
        </div>
        <div class="flex flex-col px-3 gap-2 mt-5 overflow-hidden" id="menu">
            <a class="text-gray-500 text-md p-3 rounded {{ $currentUrl === '/' ? 'active' : '' }}"
                href="/">Beranda</a>
            <div
                class="text-gray-500 text-md rounded menu-parent {{ strpos($currentUrl, 'profil-pimpinan') !== false || strpos($currentUrl, 'pendidikan') !== false ? 'active' : '' }}">
                <div class="flex justify-between items-center menu-item p-3 rounded">Tentang <ion-icon
                        name="chevron-down-outline" class="icon transition-all"></ion-icon>
                </div>
                <div class="h-0 menu-child overflow-hidden ml-3">
                    <div class="block pl-3 border-l-2 first:mt-3 last:mb-3 py-2 child-menu ">
                        <div class="flex justify-between items-center pr-3">Profil Pimpinan <ion-icon
                                name="chevron-down-outline" class="icon transition-all"></ion-icon></div>
                        <div class="h-0 child-item transition-all ease-in-out overflow-hidden ">
                            @foreach ($navbarData['pemimpin'] as $item)
                                <a href="/profil-pimpinan/{{ $item->id }}"
                                    class="pl-3 block border-l-2 first:mt-3 last:mb-3 py-2 truncate">
                                    {{ $item->title }}
                                </a>
                            @endforeach

                        </div>
                    </div>
                    <div href class="pl-3 border-l-2 first:mt-3 last:mb-3 py-2 child-menu">
                        <div class="flex justify-between items-center pr-3">Pendidikan <ion-icon
                                name="chevron-down-outline" class="icon transition-all"></ion-icon></div>
                        <div class="ml-2 h-0 child-item transition-all ease-in-out overflow-hidden item-menu">
                            @foreach ($navbarData['pendidikan'] as $item)
                                <a href="/pendidikan/{{ $item->id }}"
                                    class="pl-3 block border-l-2 first:mt-3 last:mb-3 py-2 truncate">
                                    {{ $item->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-gray-500 text-md rounded menu-parent {{ strpos($currentUrl, 'sejarah') !== false ? 'active' : '' }}"
                href="#">
                <div class="flex justify-between items-center menu-item rounded p-3">Sejarah <ion-icon
                        name="chevron-down-outline" class="icon transition-all"></ion-icon>
                </div>
                <div class="h-0 menu-child transition-all ease-in-out overflow-hidden item-menu ml-3">
                    <div class="pl-3  border-l-2 first:mt-3 last:mb-3 py-2">
                        @foreach ($navbarData['sejarah'] as $item)
                            <a href="/sejarah/{{ $item->id }}"
                                class="block justify-between items-center pr-3 truncate">{{ $item->title }}</a>
                        @endforeach
                    </div>

                </div>
            </div>
            <a class="text-gray-500 text-md p-3 rounded {{ strpos($currentUrl, 'warta') !== false ? 'active' : '' }}"
                href="/warta">Warta</a>
            <a class="text-gray-500 text-md p-3 rounded {{ $currentUrl === 'pendaftaran' ? 'active' : '' }}"
                href="/pendaftaran">Pendaftaran</a>
            <a class="text-gray-500 text-md p-3 rounded {{ $currentUrl === 'kontak' ? 'active' : '' }}"
                href="/kontak">Kontak & Alamat</a>
            @auth
                <div class="p-3 px-5 absolute bottom-1 left-0 w-full">
                    <a href="/pspdb" class="bg-blue-100 rounded p-2 px-5 text-blue-500 block">
                        Dashboard PSPDB
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>
