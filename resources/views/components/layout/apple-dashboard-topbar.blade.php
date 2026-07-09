<div class="sticky top-0 z-40 flex h-14 items-center justify-between border-b border-gray-100/80 bg-white px-6">
    {{-- Left: Hamburger + Page Title --}}
    <div class="flex items-center gap-4">
        <button @click="$dispatch('toggle-sidebar')" 
                class="flex h-9 w-9 items-center justify-center rounded-lg text-[#86868b] transition-all duration-200 hover:bg-gray-100 hover:text-[#1d1d1f] md:hidden">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
            </svg>
        </button>
        <h1 class="text-base font-semibold text-[#1d1d1f] md:text-lg">
            {{ $title ?? 'Dashboard' }}
        </h1>
    </div>

    {{-- Right: User Area --}}
    <div class="flex items-center gap-3">
        @auth
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                        class="flex items-center gap-2 rounded-xl px-3 py-1.5 text-sm text-[#86868b] transition-all duration-200 hover:bg-gray-100">
                    <div class="flex h-7 w-7 items-center justify-center rounded-full bg-emerald-100 text-xs font-semibold text-emerald-600">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <span class="hidden text-sm font-medium text-[#1d1d1f] md:inline">{{ Auth::user()->name }}</span>
                    <svg class="h-3 w-3 transition-transform duration-200" 
                         :class="open ? 'rotate-180' : ''" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                    </svg>
                </button>
                <div x-show="open" 
                     x-cloak
                     @click.outside="open = false"
                     x-transition:enter="transition-all duration-200 ease-apple"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="absolute right-0 top-full mt-2 w-48 rounded-2xl bg-white p-2 shadow-apple-lg ring-1 ring-black/5">
                    <a href="/logout"
                       class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-sm font-medium text-[#86868b] transition-all duration-200 hover:bg-red-50 hover:text-red-500">
                        <ion-icon name="log-out-outline" class="text-base"></ion-icon>
                        Logout
                    </a>
                </div>
            </div>
        @endauth
    </div>
</div>
