<div x-show="open" 
     x-cloak
     x-transition:enter="transition-all duration-300 ease-apple"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-all duration-200 ease-apple"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 flex items-center justify-center p-4">
    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
    
    {{-- Modal --}}
    <div x-show="open"
         x-transition:enter="transition-all duration-300 ease-apple"
         x-transition:enter-start="opacity-0 scale-95 translate-y-4"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition-all duration-200 ease-apple"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-95 translate-y-4"
         @click.outside="open = false"
         class="relative w-full max-w-sm rounded-2xl bg-white p-6 shadow-2xl">
        {{-- Icon --}}
        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-red-50">
            <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
            </svg>
        </div>

        {{-- Content --}}
        <div class="mt-4 text-center">
            <h3 class="text-lg font-semibold text-[#1d1d1f]">Konfirmasi Hapus</h3>
            <p class="mt-2 text-sm text-[#86868b]">
                Apakah Anda yakin ingin menghapus 
                <span class="font-medium text-[#1d1d1f]" x-html="data.title"></span>?
            </p>
            <p class="mt-1 text-xs text-[#86868b]">Tindakan ini tidak dapat dibatalkan.</p>
        </div>

        {{-- Actions --}}
        <div class="mt-6 flex items-center justify-center gap-3">
            <button @click="open = false"
                    class="rounded-full border border-gray-200 px-6 py-2.5 text-sm font-medium text-[#86868b] transition-all duration-200 hover:bg-gray-50 hover:text-[#1d1d1f]">
                Batal
            </button>
            <button @click="hapus()"
                    class="rounded-full bg-red-500 px-6 py-2.5 text-sm font-medium text-white transition-all duration-200 hover:bg-red-600 hover:shadow-lg">
                Hapus
            </button>
        </div>
    </div>
</div>
