<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard - Pondok Pesantren Darussalam Blokagung 2</title>

    {{-- Css & Js --}}
    <x-head />

    {{-- Icon IonIcons --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    {{-- Alpine JS (collapse plugin BEFORE Alpine core) --}}
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.13.3/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    @stack('headScript')
</head>

<body class="bg-white">
    <div x-data="{ 
        sidebarOpen: window.innerWidth >= 768,
        init() {
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 768) this.sidebarOpen = true;
            });
            this.$el.addEventListener('toggle-sidebar', () => {
                this.sidebarOpen = !this.sidebarOpen;
            });
        }
    }" class="flex min-h-screen">
        {{-- Desktop Sidebar (always visible) --}}
        <div x-show="sidebarOpen || window.innerWidth >= 768" 
             x-transition:enter="transition-all duration-400 ease-apple"
             x-transition:enter-start="-translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition-all duration-300 ease-apple"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full"
             class="fixed inset-y-0 left-0 z-50 md:relative md:z-auto"
             :class="sidebarOpen ? 'block' : 'hidden md:hidden'">
            <x-layout.apple-dashboard-sidebar />
        </div>

        {{-- Mobile overlay --}}
        <div x-show="sidebarOpen && window.innerWidth < 768" 
             x-cloak
             @click="sidebarOpen = false"
             x-transition:enter="transition-all duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-all duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-40 bg-black/40 backdrop-blur-sm md:hidden">
        </div>

        {{-- Main Content Area --}}
        <div class="flex flex-1 flex-col" :class="sidebarOpen ? 'md:ml-64' : ''">
            {{-- Top Bar --}}
            <x-layout.apple-dashboard-topbar />

            {{-- Content --}}
            <main class="flex-1 bg-white">
                <div class="mx-auto max-w-7xl px-4 py-6 md:px-6 lg:px-8">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    @stack('scriptBody')
</body>
</html>
