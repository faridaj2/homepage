@extends('pspdb.layout')
@section('content')
    <div x-data="pspdbApp">
        {{-- Header --}}
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="font-serif text-2xl font-semibold tracking-tight text-[#1d1d1f]">Dashboard PSPDB</h1>
                <p class="mt-1 text-sm text-[#86868b]">Kelola data pendaftaran santri baru</p>
            </div>
            <a href="/pspdb/create"
               class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm transition-all duration-200 hover:bg-emerald-700 hover:shadow-md active:scale-[0.97]">
                <ion-icon name="add" class="text-lg"></ion-icon>
                Pendaftaran Baru
            </a>
        </div>

        {{-- Alert --}}
        @if (session('status'))
            <div class="mb-6 flex items-center gap-3 rounded-2xl bg-emerald-50 px-5 py-4 text-sm text-emerald-800 shadow-sm" role="alert">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-100">
                    <ion-icon name="checkmark-circle" class="text-lg text-emerald-600"></ion-icon>
                </div>
                <div>{{ session('status') }}</div>
            </div>
        @endif

        {{-- Stats Cards --}}
        <div class="mb-8 grid gap-4 sm:grid-cols-3">
            <div class="rounded-2xl bg-white p-5 shadow-apple-sm">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                        <ion-icon name="people" class="text-xl"></ion-icon>
                    </div>
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-[#86868b]">Total Pendaftar</p>
                        <p class="mt-0.5 text-2xl font-semibold text-[#1d1d1f]">{{ count($data) }}</p>
                    </div>
                </div>
            </div>
            <div class="rounded-2xl bg-white p-5 shadow-apple-sm">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-50 text-sky-600">
                        <ion-icon name="checkmark-done" class="text-xl"></ion-icon>
                    </div>
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-[#86868b]">Diterima</p>
                        <p class="mt-0.5 text-2xl font-semibold text-[#1d1d1f]">{{ $data->where('status', 1)->count() }}</p>
                    </div>
                </div>
            </div>
            <div class="rounded-2xl bg-white p-5 shadow-apple-sm">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                        <ion-icon name="time" class="text-xl"></ion-icon>
                    </div>
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-[#86868b]">Pending</p>
                        <p class="mt-0.5 text-2xl font-semibold text-[#1d1d1f]">{{ $data->where('status', 0)->count() }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table --}}
        @if ($data->isEmpty())
            <div class="flex flex-col items-center justify-center rounded-2xl bg-white py-16 shadow-apple-sm">
                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-[#f5f5f7]">
                    <ion-icon name="document-text" class="text-3xl text-[#86868b]"></ion-icon>
                </div>
                <h3 class="mt-4 text-lg font-semibold text-[#1d1d1f]">Belum ada pendaftaran</h3>
                <p class="mt-1 text-sm text-[#86868b]">Mulai pendaftaran santri baru sekarang</p>
                <a href="/pspdb/create"
                   class="mt-4 inline-flex items-center gap-2 rounded-full bg-emerald-600 px-5 py-2.5 text-sm font-medium text-white transition-all duration-200 hover:bg-emerald-700">
                    <ion-icon name="add"></ion-icon>
                    Daftar Sekarang
                </a>
            </div>
        @else
            <div class="overflow-hidden rounded-2xl bg-white shadow-apple-sm">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr class="border-b border-apple-border/50 bg-[#f5f5f7]">
                                <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-[#86868b]">Nama</th>
                                <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-[#86868b] hidden sm:table-cell">Tingkat</th>
                                <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-[#86868b] hidden md:table-cell">Tanggal</th>
                                <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-[#86868b]">Status</th>
                                <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-[#86868b]">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-apple-border/50">
                            @foreach ($data as $siswa)
                                <tr class="transition-colors hover:bg-[#fafafa]">
                                    <td class="px-5 py-4">
                                        <a href="/pspdb/{{ $siswa->id }}"
                                           class="font-medium text-[#1d1d1f] transition-colors hover:text-emerald-600">
                                            {{ $siswa->nama }}
                                        </a>
                                    </td>
                                    <td class="px-5 py-4 text-[#86868b] hidden sm:table-cell">
                                        {{ $siswa->formal ?: '-' }}
                                    </td>
                                    <td class="px-5 py-4 text-[#86868b] hidden md:table-cell">
                                        {{ $siswa->created_at ? $siswa->created_at->format('d M Y') : '-' }}
                                    </td>
                                    <td class="px-5 py-4">
                                        @if ($siswa->status == 1)
                                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                Diterima
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-2">
                                            <a href="/pspdb/{{ $siswa->id }}/edit"
                                               class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600 transition-all duration-200 hover:bg-blue-600 hover:text-white"
                                               title="Edit">
                                                <ion-icon name="pencil" class="text-sm"></ion-icon>
                                            </a>
                                            <button @click="openModal('{{ $siswa->id }}', '{{ $siswa->nama }}')"
                                                    class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 text-red-500 transition-all duration-200 hover:bg-red-500 hover:text-white"
                                                    title="Hapus">
                                                <ion-icon name="trash" class="text-sm"></ion-icon>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        {{-- Delete Modal --}}
        <div x-show="modal" x-cloak
             x-transition:enter="transition duration-200 ease-out"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition duration-150 ease-in"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[100] flex items-center justify-center bg-black/40 backdrop-blur-sm p-4"
             @click="closeModal()">
            <div @click.stop
                 x-transition:enter="transition duration-200 ease-out"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="w-full max-w-sm rounded-2xl bg-white p-6 text-center shadow-2xl">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-red-50">
                    <ion-icon name="warning" class="text-3xl text-red-500"></ion-icon>
                </div>
                <h3 class="mt-4 text-lg font-semibold text-[#1d1d1f]">Hapus Pendaftaran?</h3>
                <p class="mt-1 text-sm text-[#86868b]">Data <span class="font-medium text-[#1d1d1f]" x-text="dataOriginalName"></span> akan dihapus permanen.</p>
                <form :action="`/pspdb/${dataToDelete}`" method="post" class="mt-6 flex gap-3">
                    @csrf
                    @method('DELETE')
                    <button type="button" @click="closeModal()"
                            class="flex-1 rounded-xl border border-apple-border bg-white px-4 py-2.5 text-sm font-medium text-[#86868b] transition-colors hover:bg-[#f5f5f7]">
                        Batal
                    </button>
                    <button type="submit"
                            class="flex-1 rounded-xl bg-red-500 px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-red-600">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
