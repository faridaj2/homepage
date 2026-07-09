<div class="group relative overflow-hidden rounded-2xl border border-gray-100/80 bg-white shadow-apple-sm transition-all duration-500 ease-apple hover:shadow-apple-lg">
    <a href="#" class="aspect-[4/3] overflow-hidden">
        <img class="h-full w-full object-cover transition-transform duration-700 ease-apple group-hover:scale-105" src="{{ $item->image_url }}" alt="{{ $item->title }}" />
    </a>
    <div class="p-5">
        <h5 class="line-clamp-2 font-serif text-base font-semibold leading-snug text-[#1d1d1f]">
            <a href="#" class="transition-colors duration-300 hover:text-emerald-600">{{ $item->title }}</a>
        </h5>
        <p class="mt-1.5 line-clamp-2 text-sm text-[#86868b]">
            {{ html_entity_decode(strip_tags($item->content ?? $item->description ?? '')) }}
        </p>
        @if(isset($item->updated_at))
            <p class="mt-2 text-xs text-[#86868b]">{{ $item->updated_at->format('d M Y') }}</p>
        @endif
    </div>
    <div class="absolute right-3 top-3 flex gap-1.5">
        <a href="/dashboard/{{ $url }}/{{ $item->id }}"
           class="flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-[#86868b] shadow-apple-sm backdrop-blur-sm transition-all duration-200 hover:bg-emerald-500 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                <circle cx="12" cy="12" r="3" />
            </svg>
        </a>
        <a href="/dashboard/{{ $url }}/{{ $item->id }}/edit"
           class="flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-[#86868b] shadow-apple-sm backdrop-blur-sm transition-all duration-200 hover:bg-blue-500 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                <path d="m15 5 4 4" />
            </svg>
        </a>
        <button @click="$dispatch('open-delete', { id: {{ $item->id }}, title: '{{ addslashes($item->title) }}' })"
           class="flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-[#86868b] shadow-apple-sm backdrop-blur-sm transition-all duration-200 hover:bg-red-500 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 6h18" />
                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                <line x1="10" x2="10" y1="11" y2="17" />
                <line x1="14" x2="14" y1="11" y2="17" />
            </svg>
        </button>
    </div>
</div>
