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
            <x-dashboard.grid.grid :url="'article-leader'" :item="$item" />
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
