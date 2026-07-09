@extends('layout.dashboard')
@section('content')
    <div x-data="app">
        {{-- Header --}}
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="font-serif text-xl font-semibold text-[#1d1d1f]">Berita</h1>
                <p class="mt-1 text-sm text-[#86868b]">Kelola artikel berita pondok pesantren</p>
            </div>
            <a href="/dashboard/berita/create"
               class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-5 py-2.5 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700 hover:shadow-lg">
                <ion-icon name="add-outline"></ion-icon>
                Tambah
            </a>
        </div>

        {{-- Table --}}
        <div class="overflow-hidden rounded-2xl border border-gray-100/80 bg-white shadow-apple-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="border-b border-gray-100 bg-gray-50/50">
                        <tr>
                            <th class="px-5 py-3.5 font-medium text-[#86868b]">Judul</th>
                            <th class="px-5 py-3.5 font-medium text-[#86868b] hidden md:table-cell">Tanggal</th>
                            <th class="px-5 py-3.5 font-medium text-[#86868b] text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($data as $item)
                            <tr class="transition-colors duration-150 hover:bg-gray-50/50">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        @if($item->image_url)
                                            <img src="{{ $item->image_url }}" alt="" class="h-10 w-10 rounded-lg object-cover">
                                        @endif
                                        <div>
                                            <p class="font-medium text-[#1d1d1f] line-clamp-1">{{ $item->title }}</p>
                                            <p class="text-xs text-[#86868b] md:hidden">{{ $item->updated_at->format('d M Y') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="hidden px-5 py-4 text-[#86868b] md:table-cell">{{ $item->updated_at->format('d M Y') }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex justify-end gap-1">
                                        <a href="/dashboard/berita/{{ $item->id }}"
                                           class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-600 shadow-sm transition-all duration-200 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-600">
                                            <ion-icon name="eye-outline" class="text-base"></ion-icon>
                                        </a>
                                        <a href="/dashboard/berita/{{ $item->id }}/edit"
                                           class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-600 shadow-sm transition-all duration-200 hover:border-blue-200 hover:bg-blue-50 hover:text-blue-600">
                                            <ion-icon name="create-outline" class="text-base"></ion-icon>
                                        </a>
                                        <button @click="openDelete({{ $item->id }}, '{{ addslashes($item->title) }}')"
                                                class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-200 bg-white text-gray-600 shadow-sm transition-all duration-200 hover:border-red-200 hover:bg-red-50 hover:text-red-500">
                                            <ion-icon name="trash-outline" class="text-base"></ion-icon>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-5 py-12 text-center text-sm text-[#86868b]">
                                    Belum ada berita. 
                                    <a href="/dashboard/berita/create" class="text-emerald-600 hover:text-emerald-700">Buat sekarang</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if(method_exists($data, 'links'))
                <div class="border-t border-gray-100 px-5 py-3">
                    {{ $data->links() }}
                </div>
            @endif
        </div>

        {{-- Delete Modal --}}
        <x-dashboard.delete-modal />
    </div>

    <script>
        const app = {
            open: false,
            data: { id: null, title: '' },
            async openDelete(id, title) {
                this.data = { id, title };
                this.open = true;
            },
            async hapus() {
                await axios.delete('/dashboard/berita/' + this.data.id)
                    .then(r => {
                        this.$dispatch('notice', { type: 'success', text: '✔️ Data Berhasil dihapus' });
                        setTimeout(() => window.location.replace('/dashboard/berita'), 1000);
                    })
                    .catch(e => {
                        this.open = false;
                    });
            }
        }
    </script>
@endsection

@push('headScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
