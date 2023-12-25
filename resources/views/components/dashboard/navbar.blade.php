<div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
    class="min-h-screen top-1 bg-base rounded-lg py-3 mb-0 max-sm:absolute max-sm:w-full md:m-5 md:inline-block z-[999]">
    <div class="text-3xl absolute right-8 md:hidden">
        <ion-icon name="close-outline" @click="open=!open"></ion-icon>
    </div>
    <div class="text-center font-bold mt-10 md:mt-2">Admin Page.</div>
    <div class="px-5">
        <div class="relative">
            <div class="overflow-hidden w-16 h-16 rounded-full mx-auto mt-10">
                <img src="https://i.pinimg.com/736x/e0/c6/fc/e0c6fc80860569cfdd947de67b391ae9.jpg"
                    class=" object-cover w-full h-full" alt="">

            </div>
        </div>
        <div class="flex flex-col text-center gap-0">
            <span
                class="font-bold text-lg -mb-1 mt-2 flex items-center justify-center gap-1 cursor-pointer">{{ Auth::user()->name }}
                <ion-icon class="text-xs text-slate-500" name="chevron-down-outline"></ion-icon></span>
            <span class="text-xs text-slate-400">New York, USA</span>
        </div>
    </div>

    <ul class="mt-10 mx-5 flex-col gap-4 text-sm tracking-wide hidden md:flex">
        <a href="{{ route('dashboard') }}" class="flex">
            <div class=" {{ Route::current()->getName() == 'dashboard' ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="albums-outline"></ion-icon>
                Dashboard
            </div>
        </a>
        <a href="{{ route('pemimpin') }}" class="flex">
            <div class="{{ Route::current()->getName() == 'pemimpin' ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="people-outline"></ion-icon>
                Pemimpin
            </div>
        </a>
        <a href="/dashboard/pendidikan" class="flex">
            <div class="{{ Route::current()->getName() == 'pendidikan' ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="business-outline"></ion-icon>
                Pendidikan
            </div>
        </a>
        <a href="/dashboard/sejarah" class="flex">
            <div class="{{ Route::current()->getName() == 'sejarah' ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="flag-outline"></ion-icon>
                Sejarah
            </div>
        </a>
        <a href="{{ route('berita') }}" class="flex">
            <div class="{{ Route::current()->getName() == 'berita' ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="newspaper-outline"></ion-icon>
                Berita
            </div>
        </a>
        <a href="{{ route('file') }}" class="flex">
            <div class="{{ Route::current()->getName() == 'file' ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="cloud-upload"></ion-icon>
                File Upload
            </div>
        </a>

        <li class="flex">
            <div class=""></div>
            <div class="Dmenu whitespace-nowrap">
                <ion-icon name="help-circle-outline"></ion-icon>
                Info Pendaftaran
            </div>
        </li>
        <li class="flex">
            <div class=""></div>
            <div class="Dmenu">
                <ion-icon name="images-outline"></ion-icon>
                Galeri
            </div>
        </li>
    </ul>
    <ul class="flex flex-col px-3 grow mt-16 gap-3 md:hidden">
        <li
            class="text-center font-bold text-xl  {{ Route::current()->getName() == 'dashboard' ? 'bg-sky-300' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li
            class="text-center font-bold text-xl  {{ Route::current()->getName() == 'pemimpin' ? 'bg-sky-300' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a href="{{ route('pemimpin') }}">Pemimpin</a>
        </li>
        <li
            class="text-center font-bold text-xl  {{ Route::current()->getName() == 'pendidikan' ? 'bg-sky-300' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a href="{{ route('pendidikan') }}">Pendidikan</a>
        </li>
        <li
            class="text-center font-bold text-xl  {{ Route::current()->getName() == 'sejarah' ? 'bg-sky-300' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a href="{{ route('sejarah') }}">Sejarah</a>
        </li>
        <li
            class="text-center font-bold text-xl  {{ Route::current()->getName() == 'berita' ? 'bg-sky-300' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a href="{{ route('berita') }}">Berita</a>
        </li>
        <li
            class="text-center font-bold text-xl  {{ Route::current()->getName() == 'file' ? 'bg-sky-300' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a href="{{ route('file') }}">file Upload</a>
        </li>

    </ul>
</div>
