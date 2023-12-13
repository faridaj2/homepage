<div class="shadow-md" x-data="{ open: false }">
    <div class="container mx-auto sm:hidden">
        <div x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
            class="flex justify-between p-3  px-5 items-center" x-show="open == false">
            <ion-icon name="menu-outline" class="text-3xl font-bold" @click="open=!open"></ion-icon>
            <span>Logo</span>
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
                <li class="text-amber-400 flex items-center justify-between"><a href="#">Beranda</a>
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                </li>
                <li class="flex items-center justify-between"><a href="#">Tentang</a><ion-icon
                        name="chevron-forward-outline"></ion-icon></li>
                <li class="flex items-center justify-between"><a href="#">Sejarah</a><ion-icon
                        name="chevron-forward-outline"></ion-icon></li>
                <li class="flex items-center justify-between"><a href="#">Warta</a><ion-icon
                        name="chevron-forward-outline"></ion-icon></li>
                <li class="flex items-center justify-between"><a href="#">Pendaftaran</a><ion-icon
                        name="chevron-forward-outline"></ion-icon></li>
                <li class="flex items-center justify-between"><a href="#">Kontak & Alamat</a><ion-icon
                        name="chevron-forward-outline"></ion-icon></li>
            </ul>
        </div>
    </div>
    <div class="container mx-auto justify-between p-3  px-5 items-center sm:flex hidden">
        <span
            class="transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:hover:transform-none">Logo</span>
        <div class="flex gap-x-10">
            <ul class="flex gap-x-6 font-Petrona font-bold">
                <li class="line"><a href="#">Beranda</a></li>
                <li class="line"><a href="#">Tentang</a></li>
                <li class="line"><a href="#">Sejarah</a></li>
                <li class="line"><a href="#">Warta</a></li>
                <li class="line"><a href="#">Pendaftaran</a></li>
                <li class="line"><a href="#">Kontak & Alamat</a></li>
            </ul>
            <ion-icon name="search-outline" class="text-2xl"></ion-icon>
        </div>
    </div>

</div>
