@php
    $navbarData = app('App\\Http\\Controllers\\Controller')->navData();
    $currentUrl = request()->path();
    $isHome = $currentUrl === '/';
@endphp

{{-- Navbar --}}
<nav x-data="{ 
    mobileOpen: false,
    scrolled: false,
    init() {
        window.addEventListener('scroll', () => {
            this.scrolled = window.scrollY > 20;
        });
    }
}"
     @close-mobile.window="mobileOpen = false; document.body.style.overflow = ''" 
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 ease-apple"
    :class="scrolled || {{ $isHome ? 'false' : 'true' }} ? 'bg-white/80 backdrop-blur-xl shadow-apple-sm border-b border-gray-100/50' : 'bg-transparent'">
    
    <div class="mx-auto flex h-12 max-w-7xl items-center justify-between px-5 md:h-14 lg:px-8">
        {{-- Logo --}}
        <a href="/" class="flex items-center gap-2 transition-opacity duration-300 hover:opacity-80">
            <img src="/img/Logo.png" class="h-7 w-auto md:h-8" alt="Pondok Pesantren Darussalam Blokagung 2">
        </a>

        {{-- Desktop Nav --}}
        <div class="hidden md:flex md:items-center md:gap-1">
            <a href="/" 
               class="nav-link px-4 py-2 text-sm font-medium transition-all duration-300 ease-apple"
               :class="(scrolled || {{ $isHome ? 'false' : 'true' }}) ? 'text-apple-text' : 'text-white'"
               style="{{ $currentUrl === '/' ? 'color: #10b981;' : '' }}">
                Beranda
            </a>

            {{-- Tentang Dropdown --}}
            <div x-data="{ open: false }" class="relative"
                 @mouseenter="open = true" 
                 @mouseleave="open = false">
                <button class="nav-link flex items-center gap-1 px-4 py-2 text-sm font-medium transition-all duration-300 ease-apple"
                        :class="(scrolled || {{ $isHome ? 'false' : 'true' }}) ? 'text-apple-text' : 'text-white'"
                        style="{{ strpos($currentUrl, 'profil-pimpinan') !== false || strpos($currentUrl, 'pendidikan') !== false ? 'color: #10b981;' : '' }}">
                    Tentang
                    <svg class="h-3 w-3 transition-transform duration-300 ease-apple" 
                         :class="open ? 'rotate-180' : ''"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
                <div x-show="open" 
                     x-cloak
                     x-transition:enter="transition-all duration-300 ease-apple"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition-all duration-200 ease-apple"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-2"
                     class="absolute left-0 top-full mt-1 w-56 rounded-2xl bg-white/95 backdrop-blur-xl p-2 shadow-apple-lg ring-1 ring-black/5">
                    <div x-data="{ subOpen: false }" class="relative">
                        <button @click="subOpen = !subOpen"
                                class="flex w-full items-center justify-between rounded-xl px-4 py-2.5 text-sm text-apple-text transition-all duration-200 hover:bg-emerald-50">
                            Profil Pimpinan
                            <svg class="h-3 w-3 transition-transform duration-300" 
                                 :class="subOpen ? 'rotate-180' : ''"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </button>
                        <div x-show="subOpen" 
                             x-cloak
                             x-transition:enter="transition-all duration-200 ease-apple"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             class="ml-3 space-y-0.5 border-l-2 border-emerald-100 pl-2">
                            @forelse ($navbarData['pemimpin'] as $item)
                                <a href="/profil-pimpinan/{{ $item->slug }}"
                                   class="block truncate rounded-lg px-3 py-2 text-sm text-apple-text-secondary transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-600">
                                    {{ $item->title }}
                                </a>
                            @empty
                                <span class="block px-3 py-2 text-sm text-apple-text-tertiary">Belum ada data</span>
                            @endforelse
                        </div>
                    </div>
                    <div x-data="{ subOpen: false }" class="relative">
                        <button @click="subOpen = !subOpen"
                                class="flex w-full items-center justify-between rounded-xl px-4 py-2.5 text-sm text-apple-text transition-all duration-200 hover:bg-emerald-50">
                            Pendidikan
                            <svg class="h-3 w-3 transition-transform duration-300" 
                                 :class="subOpen ? 'rotate-180' : ''"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                            </svg>
                        </button>
                        <div x-show="subOpen" 
                             x-cloak
                             x-transition:enter="transition-all duration-200 ease-apple"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             class="ml-3 space-y-0.5 border-l-2 border-emerald-100 pl-2">
                            @forelse ($navbarData['pendidikan'] as $item)
                                <a href="/pendidikan/{{ $item->slug }}"
                                   class="block truncate rounded-lg px-3 py-2 text-sm text-apple-text-secondary transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-600">
                                    {{ $item->title }}
                                </a>
                            @empty
                                <span class="block px-3 py-2 text-sm text-apple-text-tertiary">Belum ada data</span>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sejarah Dropdown --}}
            <div x-data="{ open: false }" class="relative"
                 @mouseenter="open = true" 
                 @mouseleave="open = false">
                <button class="nav-link flex items-center gap-1 px-4 py-2 text-sm font-medium transition-all duration-300 ease-apple"
                        :class="(scrolled || {{ $isHome ? 'false' : 'true' }}) ? 'text-apple-text' : 'text-white'"
                        style="{{ strpos($currentUrl, 'sejarah') !== false ? 'color: #10b981;' : '' }}">
                    Sejarah
                    <svg class="h-3 w-3 transition-transform duration-300 ease-apple" 
                         :class="open ? 'rotate-180' : ''"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
                <div x-show="open" 
                     x-cloak
                     x-transition:enter="transition-all duration-300 ease-apple"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition-all duration-200 ease-apple"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-2"
                     class="absolute left-0 top-full mt-1 w-56 rounded-2xl bg-white/95 backdrop-blur-xl p-2 shadow-apple-lg ring-1 ring-black/5">
                    @forelse ($navbarData['sejarah'] as $item)
                        <a href="/sejarah/{{ $item->slug }}"
                           class="block rounded-xl px-4 py-2.5 text-sm text-apple-text transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-600">
                            {{ $item->title }}
                        </a>
                    @empty
                        <span class="block px-4 py-2.5 text-sm text-apple-text-tertiary">Belum ada data</span>
                    @endforelse
                </div>
            </div>

            <a href="/warta" 
               class="nav-link px-4 py-2 text-sm font-medium transition-all duration-300 ease-apple"
               :class="(scrolled || {{ $isHome ? 'false' : 'true' }}) ? 'text-apple-text' : 'text-white'"
               style="{{ strpos($currentUrl, 'warta') !== false ? 'color: #10b981;' : '' }}">
                Warta
            </a>
            <a href="/pendaftaran" 
               class="nav-link px-4 py-2 text-sm font-medium transition-all duration-300 ease-apple"
               :class="(scrolled || {{ $isHome ? 'false' : 'true' }}) ? 'text-apple-text' : 'text-white'"
               style="{{ $currentUrl === 'pendaftaran' ? 'color: #10b981;' : '' }}">
                Pendaftaran
            </a>
            <a href="/kontak" 
               class="nav-link px-4 py-2 text-sm font-medium transition-all duration-300 ease-apple"
               :class="(scrolled || {{ $isHome ? 'false' : 'true' }}) ? 'text-apple-text' : 'text-white'"
               style="{{ $currentUrl === 'kontak' ? 'color: #10b981;' : '' }}">
                Kontak
            </a>
        </div>

        {{-- Right side --}}
        <div class="flex items-center gap-3">
            @auth
                <a href="/pspdb" 
                   class="hidden rounded-full bg-emerald-600 px-5 py-1.5 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700 hover:shadow-lg md:inline-flex">
                    Dashboard
                </a>
            @endauth
            @guest
                <a href="/login" 
                   class="hidden rounded-full border px-5 py-1.5 text-sm font-medium transition-all duration-300 ease-apple hover:shadow-lg md:inline-flex"
                   :class="(scrolled || {{ $isHome ? 'false' : 'true' }}) ? 'border-emerald-600 text-emerald-600 hover:bg-emerald-600 hover:text-white' : 'border-white/70 text-white hover:bg-white hover:text-emerald-600'">
                    Login
                </a>
            @endguest

            {{-- Hamburger --}}
            <button @click="$dispatch('toggle-mobile'); mobileOpen = !mobileOpen; if(mobileOpen) document.body.style.overflow = 'hidden'; else document.body.style.overflow = ''" 
                    class="relative z-50 flex h-9 w-9 items-center justify-center rounded-full transition-all duration-300 md:hidden"
                    :class="(scrolled || {{ $isHome ? 'false' : 'true' }}) ? 'text-apple-text hover:bg-gray-100' : 'text-white hover:bg-white/20'">
                <svg x-show="!mobileOpen" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
                <svg x-show="mobileOpen" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
</nav>

{{-- Mobile Menu (outside nav to avoid stacking context issues) --}}
<div x-data="{ mobileOpen: false }"
     @toggle-mobile.window="mobileOpen = !mobileOpen; if(mobileOpen) document.body.style.overflow = 'hidden'; else document.body.style.overflow = ''"
     @close-mobile.window="mobileOpen = false; document.body.style.overflow = ''"
     x-show="mobileOpen"
     x-cloak
     x-transition:enter="transition-all duration-300 ease-apple"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-all duration-200 ease-apple"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[100] flex md:hidden"
     style="overscroll-behavior: contain;"
     @click.self="$dispatch('close-mobile')">
    
    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"
         @click="$dispatch('close-mobile')"></div>
    
    {{-- Panel --}}
    <div class="relative ml-auto h-full w-72 overflow-y-auto bg-white shadow-2xl"
         @click.away="$dispatch('close-mobile')">
        <div class="flex min-h-full flex-col pt-16 pb-6">
            <div class="flex-1 space-y-1 px-4">
                <a href="/" 
                   @click="$dispatch('close-mobile')"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3.5 text-lg font-medium transition-all duration-300 ease-apple hover:bg-emerald-50 {{ $currentUrl === '/' ? 'text-emerald-600 bg-emerald-50' : 'text-apple-text' }}">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955a1.126 1.126 0 011.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>
                    Beranda
                </a>

                {{-- Mobile Tentang --}}
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                            class="flex w-full items-center justify-between gap-3 rounded-2xl px-4 py-3.5 text-lg font-medium transition-all duration-300 ease-apple hover:bg-emerald-50 {{ strpos($currentUrl, 'profil-pimpinan') !== false || strpos($currentUrl, 'pendidikan') !== false ? 'text-emerald-600 bg-emerald-50' : 'text-apple-text' }}">
                        <span class="flex items-center gap-3">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                            </svg>
                            Tentang
                        </span>
                        <svg class="h-4 w-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                    <div x-show="open" x-cloak
                         x-transition:enter="transition-all duration-300 ease-apple"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-96"
                         class="ml-8 space-y-0.5 overflow-hidden">
                        <div x-data="{ subOpen: false }">
                            <button @click="subOpen = !subOpen" class="flex w-full items-center justify-between rounded-xl px-4 py-2.5 text-sm text-apple-text transition-all duration-200 hover:bg-emerald-50">
                                Profil Pimpinan
                                <svg class="h-3 w-3 transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                </svg>
                            </button>
                            <div x-show="subOpen" x-cloak class="ml-4 space-y-0.5 border-l-2 border-emerald-100 pl-2">
                                @forelse ($navbarData['pemimpin'] as $item)
                                    <a href="/profil-pimpinan/{{ $item->slug }}"
                                       @click="$dispatch('close-mobile')"
                                       class="block truncate rounded-lg px-3 py-2 text-sm text-apple-text-secondary transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-600">{{ $item->title }}</a>
                                @empty
                                    <span class="block px-3 py-2 text-sm text-apple-text-tertiary">Belum ada data</span>
                                @endforelse
                            </div>
                        </div>
                        <div x-data="{ subOpen: false }">
                            <button @click="subOpen = !subOpen" class="flex w-full items-center justify-between rounded-xl px-4 py-2.5 text-sm text-apple-text transition-all duration-200 hover:bg-emerald-50">
                                Pendidikan
                                <svg class="h-3 w-3 transition-transform duration-300" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                </svg>
                            </button>
                            <div x-show="subOpen" x-cloak class="ml-4 space-y-0.5 border-l-2 border-emerald-100 pl-2">
                                @forelse ($navbarData['pendidikan'] as $item)
                                    <a href="/pendidikan/{{ $item->slug }}"
                                       @click="$dispatch('close-mobile')"
                                       class="block truncate rounded-lg px-3 py-2 text-sm text-apple-text-secondary transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-600">{{ $item->title }}</a>
                                @empty
                                    <span class="block px-3 py-2 text-sm text-apple-text-tertiary">Belum ada data</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Mobile Sejarah --}}
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                            class="flex w-full items-center justify-between gap-3 rounded-2xl px-4 py-3.5 text-lg font-medium transition-all duration-300 ease-apple hover:bg-emerald-50 {{ strpos($currentUrl, 'sejarah') !== false ? 'text-emerald-600 bg-emerald-50' : 'text-apple-text' }}">
                        <span class="flex items-center gap-3">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                            </svg>
                            Sejarah
                        </span>
                        <svg class="h-4 w-4 transition-transform duration-300" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>
                    <div x-show="open" x-cloak
                         x-transition:enter="transition-all duration-300 ease-apple"
                         x-transition:enter-start="opacity-0 max-h-0"
                         x-transition:enter-end="opacity-100 max-h-96"
                         class="ml-8 space-y-0.5 overflow-hidden">
                        @forelse ($navbarData['sejarah'] as $item)
                            <a href="/sejarah/{{ $item->slug }}"
                               @click="$dispatch('close-mobile')"
                               class="block rounded-xl px-4 py-2.5 text-sm text-apple-text transition-all duration-200 hover:bg-emerald-50 hover:text-emerald-600">{{ $item->title }}</a>
                        @empty
                            <span class="block px-4 py-2.5 text-sm text-apple-text-tertiary">Belum ada data</span>
                        @endforelse
                    </div>
                </div>

                <a href="/warta" @click="$dispatch('close-mobile')"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3.5 text-lg font-medium transition-all duration-300 ease-apple hover:bg-emerald-50 {{ strpos($currentUrl, 'warta') !== false ? 'text-emerald-600 bg-emerald-50' : 'text-apple-text' }}">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                    </svg>
                    Warta
                </a>
                <a href="/pendaftaran" @click="$dispatch('close-mobile')"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3.5 text-lg font-medium transition-all duration-300 ease-apple hover:bg-emerald-50 {{ $currentUrl === 'pendaftaran' ? 'text-emerald-600 bg-emerald-50' : 'text-apple-text' }}">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                    </svg>
                    Pendaftaran
                </a>
                <a href="/kontak" @click="$dispatch('close-mobile')"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3.5 text-lg font-medium transition-all duration-300 ease-apple hover:bg-emerald-50 {{ $currentUrl === 'kontak' ? 'text-emerald-600 bg-emerald-50' : 'text-apple-text' }}">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                    </svg>
                    Kontak
                </a>
            </div>

            <div class="border-t border-gray-100 px-4 py-6">
                @auth
                    <a href="/pspdb" class="flex w-full items-center justify-center rounded-full bg-emerald-600 px-5 py-3 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700">Dashboard</a>
                @endauth
                @guest
                    <a href="/login" class="flex w-full items-center justify-center rounded-full bg-emerald-600 px-5 py-3 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700">Login</a>
                @endguest
            </div>
        </div>
    </div>
</div>


