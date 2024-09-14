<div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
    class=" bg-base rounded-lg py-3 mb-0 max-sm:fixed max-sm:w-full md:inline-block z-[999] w-full h-full top-0 overflow-scroll md:overflow-hidden">
    <div class="text-3xl absolute right-8 md:hidden">
        <ion-icon name="close-outline" @click="open=!open"></ion-icon>
    </div>
    <div class="text-center font-bold mt-10 md:mt-2 flex justify-start border-b pb-3">
        <div class="flex items-center gap-2 pl-8">
            <x-icon.dashboard />
            <h2 class="font-semibold text-gray-700 text-xl">Dashboard</h2>
        </div>
    </div>
    <div class="px-5">

    </div>

    <ul class="mt-10 mx-5 flex-col gap-4 text-sm tracking-wide hidden md:flex">
        <a href="{{ route('dashboard') }}" class="flex">
            <div class=" w-full  {{ Route::current()->getName() == 'dashboard' ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="albums-outline"></ion-icon>
                Dashboard
            </div>
        </a>
        <a href="{{ route('pemimpin') }}" class="flex">
            <div class="w-full  {{ request()->is('*pemimpin*') ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="people-outline"></ion-icon>
                Pemimpin
            </div>
        </a>
        <a href="/dashboard/pendidikan" class="flex">
            <div class="w-full  {{ request()->is('*pendidikan*') ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="business-outline"></ion-icon>
                Pendidikan
            </div>
        </a>
        <a href="/dashboard/sejarah" class="flex">
            <div class="w-full  {{ request()->is('*sejarah*') ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="flag-outline"></ion-icon>
                Sejarah
            </div>
        </a>
        <a href="{{ route('berita') }}" class="flex">
            <div class="w-full  {{ request()->is('*berita*') ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="newspaper-outline"></ion-icon>
                Berita
            </div>
        </a>
        <a href="{{ route('file') }}" class="flex">
            <div class="w-full  {{ request()->is('*file*') ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="cloud-upload"></ion-icon>
                File Upload
            </div>
        </a>

        <a href="{{ route('pendaftaran') }}" class="flex">
            <div class=""></div>
            <div class="text-nowrap w-full  {{ request()->is('*pendaftaran*') ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="help-circle-outline"></ion-icon>
                Info Pendaftaran
            </div>
        </a>
        <a href="{{ route('kontak') }}" class="flex">
            <div class=""></div>
            <div class="text-nowrap w-full  {{ request()->is('*kontak*') ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="help-circle-outline"></ion-icon>
                Kontak & Alamat
            </div>
        </a>
        <a href="{{ route('pspdb') }}" class="flex">
            <div class=""></div>
            <div class="text-nowrap w-full  {{ request()->is('*pspdb*') ? 'activeDmenu' : 'Dmenu' }}">
                <ion-icon name="help-circle-outline"></ion-icon>
                PSPDB
            </div>
        </a>
        <li class="flex">
            <div class=""></div>
            <div class="w-full Dmenu">
                <ion-icon name="images-outline"></ion-icon>
                Galeri
            </div>
        </li>
        <a href="/logout" class="flex">
            <div class=""></div>
            <div class="w-full Dmenu">
                <ion-icon name="log-out-outline"></ion-icon>
                Logout
            </div>
        </a>
    </ul>
    <ul class="flex flex-col px-3 grow mt-16 gap-3 md:hidden ">
        <li
            class="text-center font-bold text-sm  {{ Route::current()->getName() == 'dashboard' ? 'bg-black text-white' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a class="block h-full" href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li
            class="text-center font-bold text-sm  {{ Route::current()->getName() == 'pemimpin' ? 'bg-black text-white' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a class="block h-full" href="{{ route('pemimpin') }}">Pemimpin</a>
        </li>
        <li
            class="text-center font-bold text-sm  {{ Route::current()->getName() == 'pendidikan' ? 'bg-black text-white' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a class="block h-full" href="{{ route('pendidikan') }}">Pendidikan</a>
        </li>
        <li
            class="text-center font-bold text-sm  {{ Route::current()->getName() == 'sejarah' ? 'bg-black text-white' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a class="block h-full" href="{{ route('sejarah') }}">Sejarah</a>
        </li>
        <li
            class="text-center font-bold text-sm  {{ Route::current()->getName() == 'berita' ? 'bg-black text-white' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a class="block h-full" href="{{ route('berita') }}">Berita</a>
        </li>
        <li
            class="text-center font-bold text-sm  {{ Route::current()->getName() == 'file' ? 'bg-black text-white' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a class="block h-full" href="{{ route('file') }}">File Upload</a>
        </li>
        <li
            class="text-center font-bold text-sm  {{ Route::current()->getName() == 'pendaftaran' ? 'bg-black text-white' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a class="block h-full" href="{{ route('pendaftaran') }}">Pendaftaran</a>
        </li>
        <li
            class="text-center font-bold text-sm  {{ Route::current()->getName() == 'kontak' ? 'bg-black text-white' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a class="block h-full" href="{{ route('kontak') }}">Kontak & Alamat</a>
        </li>
        <li
            class="text-center font-bold text-sm  {{ Route::current()->getName() == 'pspdb' ? 'bg-black text-white' : 'bg-slate-100' }} rounded text-slate-900 py-3">
            <a class="block h-full" href="{{ route('pspdb') }}">PSPDB</a>
        </li>
        <li class="text-center font-bold text-sm   rounded text-slate-900 py-3">
            <a href="/logout">Log Out</a>
        </li>

    </ul>
</div>
