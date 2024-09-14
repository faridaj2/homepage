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
            <div></div>
            <a href="/dashboard/berita/create" type="button"
                class="bg-blue-300 p-3 rounded-full text-sm hover:bg-blue-400 px-5">Create</a>
        </div>
        <div class="flex flex-wrap justify-center lg:justify-normal gap-2">


            @foreach ($data as $item)
                <x-dashboard.grid.grid :url="'berita'" :item="$item" />
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
            async hapus() {
                await axios.delete('/dashboard/berita/' + this.data.id)
                    .then(r => {
                        this.$dispatch('notice', {
                                type: 'success',
                                text: '✔️ Data Berhasil dihapus'
                            }),
                            setTimeout(() => {
                                window.location.replace('/dashboard/berita')
                            }, 1000);
                    })
                    .catch(e => {
                        console.log(e)
                        this.open = false;
                    })
            }
        }
    </script>
@endsection
@push('headScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
