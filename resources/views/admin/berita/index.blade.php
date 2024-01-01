@extends('layout.dashboard')
@section('content')
    @php
        function cutString($string)
        {
            $words = str_word_count($string, 1); // Mengubah string menjadi array kata-kata
            $words = array_slice($words, 0, 15); // Memotong array kata-kata menjadi 15 kata pertama
            $cutString = implode(' ', $words); // Menggabungkan kembali kata-kata menjadi string

            return $cutString;
        }
    @endphp
    <div class="" x-data="app">
        <div class="flex justify-between items-center m-2">
            <div>
                <h1>Berita berita</h1>
            </div>
            <a href="/dashboard/berita/create" type="button"
                class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 ">Create</a>
        </div>
        <div class="flex flex-wrap justify-center lg:justify-normal gap-2">


            @foreach ($data as $item)
                <div class="max-w-sm w-full bg-white flex flex-col">
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
                    <div class="flex p-2 gap-2 justify-end flex-wrap mt-auto">
                        <a href="/dashboard/berita/{{ $item->id }}"
                            class="text-violet-300 hover:text-violet-500"><ion-icon name="eye"></ion-icon></a>
                        <a href="/dashboard/berita/{{ $item->id }}/edit"
                            class="text-violet-300 hover:text-violet-500"><ion-icon name="create"></ion-icon></a>
                        <button class="text-violet-300 hover:text-violet-500"
                            @click="open=!open, data.id = {{ $item->id }}, data.title = '{{ $item->title }}'">
                            <ion-icon name="trash"></ion-icon></button>
                    </div>
                </div>
            @endforeach


        </div>
        <div class="mx-5 mt-3">
            {{ $data->links() }}

        </div>
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
            hapus() {
                axios.delete('/dashboard/berita/' + this.data.id)
                    .then(r => {
                        this.open = false,
                            this.$dispatch('notice', {
                                type: 'success',
                                text: '✔️ Data Berhasil dihapus'
                            }),
                            setTimeout(() => {
                                window.location.replace('/dashboard/berita')
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
