<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PSPDB - Pondok Pesantren Darussalam Blokagung 2</title>
    <x-head />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Petrona:ital,wght@0,100;0,200;0,500;0,600;0,700;0,800;0,900;1,300&display=swap" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
    </style>
    @stack('headScript')
</head>

<body class="bg-[#f5f5f7] font-['Figtree',sans-serif] antialiased">
    {{-- Apple-style Navbar --}}
    <nav class="sticky top-0 z-50 border-b border-apple-border/50 bg-white/80 backdrop-blur-xl" x-data="{ mobileOpen: false, profile: false }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                {{-- Left: Logo + Desktop Nav --}}
                <div class="flex items-center gap-8">
                    <a href="/pspdb" class="flex items-center gap-2 text-[#1d1d1f]">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-600">
                            <ion-icon name="school" class="text-lg text-white"></ion-icon>
                        </div>
                        <span class="text-sm font-semibold tracking-tight">PSPDB</span>
                    </a>
                    <div class="hidden items-center gap-1 sm:flex">
                        <a href="/pspdb"
                           class="rounded-full px-4 py-2 text-sm font-medium text-emerald-600 transition-all duration-200 hover:bg-emerald-50 {{ request()->is('pspdb') && !request()->is('pspdb/*') ? 'bg-emerald-50' : 'text-[#86868b] hover:text-[#1d1d1f]' }}">
                            <ion-icon name="grid" class="-mt-0.5 mr-1.5 inline-block text-base"></ion-icon>
                            Dashboard
                        </a>
                        <a href="/"
                           class="rounded-full px-4 py-2 text-sm font-medium text-[#86868b] transition-all duration-200 hover:text-[#1d1d1f] hover:bg-[#f5f5f7]">
                            <ion-icon name="home" class="-mt-0.5 mr-1.5 inline-block text-base"></ion-icon>
                            Beranda
                        </a>
                    </div>
                </div>

                {{-- Right: User Menu --}}
                <div class="flex items-center gap-3">
                    {{-- Mobile hamburger --}}
                    <button @click="mobileOpen = !mobileOpen" type="button"
                            class="flex h-9 w-9 items-center justify-center rounded-full text-[#86868b] transition-colors hover:bg-[#f5f5f7] hover:text-[#1d1d1f] sm:hidden">
                        <svg x-show="!mobileOpen" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        <svg x-show="mobileOpen" x-cloak class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    {{-- Profile dropdown --}}
                    <div class="relative" @click.outside="profile = false">
                        <button @click="profile = !profile"
                                class="flex h-9 w-9 items-center justify-center rounded-full text-emerald-600 transition-all duration-200 hover:bg-emerald-50">
                            <ion-icon name="person-circle" class="text-3xl"></ion-icon>
                        </button>
                        <div x-show="profile" x-cloak
                             @click.outside="profile = false"
                             class="absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-2xl bg-white py-2 shadow-apple-lg ring-1 ring-black/5">
                            <div class="border-b border-apple-border/50 px-4 pb-2 mb-1">
                                <p class="text-sm font-medium text-[#1d1d1f]">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-[#86868b]">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="/logout"
                               class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 transition-colors hover:bg-red-50">
                                <ion-icon name="log-out" class="text-base"></ion-icon>
                                Sign out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div x-show="mobileOpen" x-cloak
             class="border-t border-apple-border/50 bg-white sm:hidden">
            <div class="space-y-1 px-4 py-3">
                <a href="/pspdb" @click="mobileOpen = false"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-base font-medium transition-colors {{ request()->is('pspdb') && !request()->is('pspdb/*') ? 'bg-emerald-50 text-emerald-600' : 'text-[#86868b] hover:bg-[#f5f5f7] hover:text-[#1d1d1f]' }}">
                    <ion-icon name="grid" class="text-xl"></ion-icon>
                    Dashboard
                </a>
                <a href="/" @click="mobileOpen = false"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-base font-medium text-[#86868b] transition-colors hover:bg-[#f5f5f7] hover:text-[#1d1d1f]">
                    <ion-icon name="home" class="text-xl"></ion-icon>
                    Beranda
                </a>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('pspdbApp', () => ({
                profile: false,
                mobileOpen: false,
                modal: false,
                dataToDelete: null,
                dataOriginalName: null,
                openModal(id, name) {
                    this.modal = true;
                    this.dataToDelete = id;
                    this.dataOriginalName = name;
                },
                closeModal() {
                    this.modal = false;
                    this.dataToDelete = null;
                    this.dataOriginalName = null;
                }
            }));
        });
    </script>
    @stack('scripts')
</body>
</html>
