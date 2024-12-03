<div class="max-w-sm w-full bg-white flex flex-col relative rounded-3xl overflow-hidden">
    <a href="#" class="overflow-hidden">
        <img class="w-full h-44 object-cover object-center" src="{{ $item->image_url }}" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 line-clamp-2">{{ $item->title }}
            </h5>
        </a>
        <p class="mb-3 font-normal text-slate-400 text-xs line-clamp-2">
            {{ html_entity_decode(strip_tags($item->content)) }}</p>
    </div>
    <div class="flex p-2 gap-2 justify-end flex-wrap mt-auto items-center absolute">
        <a href="/dashboard/{{ $url }}/{{ $item->id }}"
            class="text-black bg-gray-200 w-10 h-10 rounded-full flex items-center justify-center shadow-md hover:bg-gray-300 transition-all">
            <ion-icon name="search-outline"></ion-icon>
        </a>
        <a href="/dashboard/{{ $url }}/{{ $item->id }}/edit"
            class="text-black bg-gray-200 w-10 h-10 rounded-full flex items-center justify-center shadow-md hover:bg-gray-300 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-pencil">
                <path
                    d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                <path d="m15 5 4 4" />
            </svg>
        </a>
        <button
            class="text-black bg-gray-200 w-10 h-10 rounded-full flex items-center justify-center shadow-md hover:bg-gray-300 transition-all"
            @click="open=!open, data.id = {{ $item->id }}, data.title = '{{ $item->title }}'">
            <ion-icon name="trash"></ion-icon></button>
    </div>
</div>
