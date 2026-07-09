@extends('layout.dashboard')
@section('content')
    <div x-data="app">
        {{-- Header --}}
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="font-serif text-xl font-semibold text-[#1d1d1f]">Pendidikan</h1>
                <p class="mt-1 text-sm text-[#86868b]">Kelola artikel pendidikan pondok pesantren</p>
            </div>
            <a href="/dashboard/pendidikan/create"
               class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-5 py-2.5 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700 hover:shadow-lg">
                <ion-icon name="add-outline"></ion-icon>
                Tambah
            </a>
        </div>

        {{-- Grid --}}
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse ($data as $item)
                <x-dashboard.grid.grid :url="'pendidikan'" :item="$item" />
            @empty
                <div class="col-span-full flex flex-col items-center justify-center rounded-2xl border border-dashed border-gray-200 py-16 text-center">
                    <ion-icon name="business-outline" class="text-4xl text-[#86868b]"></ion-icon>
                    <p class="mt-3 text-sm text-[#86868b]">Belum ada artikel pendidikan.</p>
                    <a href="/dashboard/pendidikan/create" class="mt-2 text-sm font-medium text-emerald-600 hover:text-emerald-700">Tambah sekarang</a>
                </div>
            @endforelse
        </div>

        {{-- Delete Modal --}}
        <x-dashboard.delete-modal />
        <x-toast />
    </div>

    <script>
        const app = {
            open: false,
            data: { id: null, title: '' },
            openDelete(id, title) {
                this.data = { id, title };
                this.open = true;
            },
            async hapus() {
                await axios.delete('/dashboard/pendidikan/' + this.data.id)
                    .then(r => {
                        this.open = false;
                        this.$dispatch('notice', { type: 'success', text: '✔️ Data Berhasil dihapus' });
                        setTimeout(() => window.location.replace('/dashboard/pendidikan'), 1000);
                    })
                    .catch(e => console.log(e));
            }
        }
    </script>
@endsection

@push('headScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
