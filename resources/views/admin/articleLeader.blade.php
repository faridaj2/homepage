@extends('layout.dashboard')
@section('content')
    <div class="flex justify-between p-3">
        <div>
            <h1 class="font-bold text-xl">Article Pemimpin</h1>
            <h6 class="text-xs text-slate-400">Lorem ipsum dolor sit amet.</h6>
        </div>
        <a href="/dashboard/article-leader"
            class="flex items-center gap-1 bg-black hover:bg-black/70 text-white px-6 font-semibold rounded-md"><ion-icon
                name="add-outline"></ion-icon>
            Create</a>
    </div>
    <div class="px-2 md:px-0 flex flex-col gap-3" x-data="app">
        @foreach ($article as $item)
            <div class="flex gap-3">
                <div
                    class="flex flex-col md:flex-row gap-3 relative bg-base border border-solid border-violet-200 shadow rounded-lg p-3 w-full">
                    <div class="md:h-[140px] h-[200px] w-full md:w-[350px] lg:w-[200px] overflow-hidden rounded-md ">
                        <img src="{{ $item->image_url }}" class="w-full h-full object-cover" alt="">
                    </div>
                    <div class="w-full">
                        <h1 class="font-bold">{{ $item->title }}</h1>
                        @php
                            $teks = substr(strip_tags($item->content), 0, 200);
                        @endphp
                        <p class="text-xs text-gray-400 mt-1 w-full line-clamp-2">
                            {{ html_entity_decode(strip_tags($item->content)) }}</p>
                        <div class="mt-5">
                            <span
                                class="text-xs bg-violet-100 p-1 rounded-full px-2 text-slate-600">{{ $item->created_at }}</span>
                            <span class="text-xs bg-violet-100 p-1 rounded-full px-2 text-slate-600">Santri</span>
                            <span class="text-xs bg-violet-100 p-1 rounded-full px-2 text-slate-600">Darussalam Blokagung
                                2</span>
                        </div>
                        <div class="mt-4 md:justify-end border-t flex  gap-2 text-xl items-center">
                            <a href="/dashboard/article-leader/{{ $item->id }}"
                                class="text-violet-300 hover:text-violet-500"><ion-icon name="eye"></ion-icon></a>
                            <a href="/dashboard/article-leader/{{ $item->id }}/edit"
                                class="text-violet-300 hover:text-violet-500"><ion-icon name="create"></ion-icon></a>
                            <button class="text-violet-300 hover:text-violet-500"
                                @click="open=!open, data.id = {{ $item->id }}, data.title = '{{ $item->title }}'"><ion-icon
                                    name="trash"></ion-icon></button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <x-toast />
        <div x-show="open" class="fixed top-0 left-0 w-full h-full bg-white/90  flex items-center justify-center">
            <div class="shadow-lg p-3 bg-white rounded-lg text-center">
                <h1 class="font-bold p-4">Apakah Yakin Akan menghapus</h1>
                <p class="py-2 font-bold text-2xl" x-html="data.title"></p>
                <hr>
                <div class="flex justify-around">
                    <button class="p-3 text-slate-500 w-full hover:bg-sky-100" @click="hapus()">Hapus</button>
                    <button class="p-3 text-slate-500 w-full hover:bg-sky-100" @click="open=!open">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const app = {
            open: false,
            data: {},
            async hapus() {
                await axios.delete('/dashboard/article-leader/' + this.data.id)
                    .then(r => {
                        this.open = false,
                            this.$dispatch('notice', {
                                type: 'success',
                                text: '✔️ Data Berhasil dihapus'
                            }),
                            setTimeout(() => {
                                window.location.replace('/dashboard/pemimpin')
                            }, 1000);
                    })
                    .catch(e => console.log(e))
            }
        }
    </script>
@endsection

@push('headScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
