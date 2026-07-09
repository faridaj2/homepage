@php
    $currentRoute = Route::current()->getName();
    $currentPath = request()->path();
@endphp

<div x-data="{ 
    kontenOpen: true,
    pengaturanOpen: false
}" 
    class="flex h-full w-64 flex-col bg-[#1d1d1f]">
    
    {{-- Logo & Title --}}
    <div class="flex items-center gap-3 border-b border-white/[0.06] px-6 py-5">
        <img src="/img/Logo.png" class="h-7 w-auto brightness-0 invert" alt="">
        <span class="text-sm font-semibold text-white">Dashboard</span>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto px-3 py-4">
        <ul class="space-y-1">
            {{-- Dashboard --}}
            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-medium transition-all duration-200 ease-apple"
                   :class="'{{ $currentRoute == 'dashboard' ? 'text-emerald-400 bg-emerald-500/10' : 'text-[#86868b] hover:text-[#f5f5f7] hover:bg-white/[0.06]' }}'">
                    <ion-icon name="albums-outline" class="text-lg"></ion-icon>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Separator --}}
            <li class="px-4 py-2">
                <div class="h-px bg-white/[0.06]"></div>
            </li>

            {{-- Konten Group --}}
            <li>
                <button @click="kontenOpen = !kontenOpen"
                        class="flex w-full items-center justify-between rounded-xl px-4 py-2.5 text-xs font-semibold uppercase tracking-wider text-[#86868b] transition-all duration-200 hover:text-[#f5f5f7]">
                    <span>Konten</span>
                    <svg class="h-3 w-3 transition-transform duration-300 ease-apple" 
                         :class="kontenOpen ? 'rotate-180' : ''"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
                <div x-show="kontenOpen" 
                     x-collapse.duration.300ms
                     class="mt-1 space-y-0.5">
                    <a href="{{ route('pemimpin') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-2.5 pl-10 text-sm font-medium transition-all duration-200 ease-apple"
                       :class="'{{ request()->is('*pemimpin*') ? 'text-emerald-400 bg-emerald-500/10' : 'text-[#86868b] hover:text-[#f5f5f7] hover:bg-white/[0.06]' }}'">
                        <ion-icon name="people-outline" class="text-base"></ion-icon>
                        <span>Pemimpin</span>
                    </a>
                    <a href="/dashboard/pendidikan"
                       class="flex items-center gap-3 rounded-xl px-4 py-2.5 pl-10 text-sm font-medium transition-all duration-200 ease-apple"
                       :class="'{{ request()->is('*pendidikan*') ? 'text-emerald-400 bg-emerald-500/10' : 'text-[#86868b] hover:text-[#f5f5f7] hover:bg-white/[0.06]' }}'">
                        <ion-icon name="business-outline" class="text-base"></ion-icon>
                        <span>Pendidikan</span>
                    </a>
                    <a href="/dashboard/sejarah"
                       class="flex items-center gap-3 rounded-xl px-4 py-2.5 pl-10 text-sm font-medium transition-all duration-200 ease-apple"
                       :class="'{{ request()->is('*sejarah*') ? 'text-emerald-400 bg-emerald-500/10' : 'text-[#86868b] hover:text-[#f5f5f7] hover:bg-white/[0.06]' }}'">
                        <ion-icon name="flag-outline" class="text-base"></ion-icon>
                        <span>Sejarah</span>
                    </a>
                    <a href="{{ route('berita') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-2.5 pl-10 text-sm font-medium transition-all duration-200 ease-apple"
                       :class="'{{ request()->is('*berita*') ? 'text-emerald-400 bg-emerald-500/10' : 'text-[#86868b] hover:text-[#f5f5f7] hover:bg-white/[0.06]' }}'">
                        <ion-icon name="newspaper-outline" class="text-base"></ion-icon>
                        <span>Berita</span>
                    </a>
                </div>
            </li>

            {{-- Pengaturan Group --}}
            <li>
                <button @click="pengaturanOpen = !pengaturanOpen"
                        class="flex w-full items-center justify-between rounded-xl px-4 py-2.5 text-xs font-semibold uppercase tracking-wider text-[#86868b] transition-all duration-200 hover:text-[#f5f5f7]">
                    <span>Pengaturan</span>
                    <svg class="h-3 w-3 transition-transform duration-300 ease-apple" 
                         :class="pengaturanOpen ? 'rotate-180' : ''"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
                <div x-show="pengaturanOpen" 
                     x-collapse.duration.300ms
                     class="mt-1 space-y-0.5">
                    <a href="{{ route('file') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-2.5 pl-10 text-sm font-medium transition-all duration-200 ease-apple"
                       :class="'{{ request()->is('*file*') ? 'text-emerald-400 bg-emerald-500/10' : 'text-[#86868b] hover:text-[#f5f5f7] hover:bg-white/[0.06]' }}'">
                        <ion-icon name="cloud-upload-outline" class="text-base"></ion-icon>
                        <span>File Upload</span>
                    </a>
                    <a href="{{ route('pendaftaran') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-2.5 pl-10 text-sm font-medium transition-all duration-200 ease-apple"
                       :class="'{{ request()->is('*pendaftaran*') ? 'text-emerald-400 bg-emerald-500/10' : 'text-[#86868b] hover:text-[#f5f5f7] hover:bg-white/[0.06]' }}'">
                        <ion-icon name="help-circle-outline" class="text-base"></ion-icon>
                        <span>Info Pendaftaran</span>
                    </a>
                    <a href="{{ route('kontak') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-2.5 pl-10 text-sm font-medium transition-all duration-200 ease-apple"
                       :class="'{{ request()->is('*kontak*') ? 'text-emerald-400 bg-emerald-500/10' : 'text-[#86868b] hover:text-[#f5f5f7] hover:bg-white/[0.06]' }}'">
                        <ion-icon name="call-outline" class="text-base"></ion-icon>
                        <span>Kontak & Alamat</span>
                    </a>
                    <a href="{{ route('pspdb') }}"
                       class="flex items-center gap-3 rounded-xl px-4 py-2.5 pl-10 text-sm font-medium transition-all duration-200 ease-apple"
                       :class="'{{ request()->is('*pspdb*') ? 'text-emerald-400 bg-emerald-500/10' : 'text-[#86868b] hover:text-[#f5f5f7] hover:bg-white/[0.06]' }}'">
                        <ion-icon name="document-text-outline" class="text-base"></ion-icon>
                        <span>PSPDB</span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    {{-- Bottom: Logout --}}
    <div class="border-t border-white/[0.06] px-3 py-4">
        <div class="mb-3 px-4">
            <div class="h-px bg-white/[0.06]"></div>
        </div>
        <a href="/logout"
           class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-medium text-[#86868b] transition-all duration-200 ease-apple hover:bg-red-500/10 hover:text-red-400">
            <ion-icon name="log-out-outline" class="text-lg"></ion-icon>
            <span>Logout</span>
        </a>
    </div>
</div>
