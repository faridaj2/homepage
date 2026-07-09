@extends('pspdb.layout')
@section('content')
    <div class="mx-auto max-w-4xl">
        {{-- Header --}}
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-3">
                <a href="/pspdb" class="flex h-9 w-9 items-center justify-center rounded-full text-[#86868b] transition-colors hover:bg-[#f5f5f7] hover:text-[#1d1d1f]">
                    <ion-icon name="arrow-back" class="text-xl"></ion-icon>
                </a>
                <div>
                    <h1 class="font-serif text-xl font-semibold tracking-tight text-[#1d1d1f]">{{ $data->nama }}</h1>
                    <p class="text-sm text-[#86868b]">Informasi Peserta Didik</p>
                </div>
            </div>
            <div class="flex gap-2">
                <a href="/pspdb/{{ $data->id }}/edit"
                   class="inline-flex items-center gap-2 rounded-full bg-blue-50 px-4 py-2 text-sm font-medium text-blue-600 transition-all duration-200 hover:bg-blue-100">
                    <ion-icon name="pencil" class="text-base"></ion-icon>
                    Edit
                </a>
                <a href="/pspdb/dokumen-pendukung/{{ $data->id }}/edit"
                   class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-4 py-2 text-sm font-medium text-emerald-600 transition-all duration-200 hover:bg-emerald-100">
                    <ion-icon name="cloud-upload" class="text-base"></ion-icon>
                    Upload
                </a>
            </div>
        </div>

        @if (session('status'))
            <div class="mb-6 flex items-center gap-3 rounded-2xl bg-emerald-50 px-5 py-4 text-sm text-emerald-800 shadow-sm" role="alert">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-100">
                    <ion-icon name="checkmark-circle" class="text-lg text-emerald-600"></ion-icon>
                </div>
                <div>{{ session('status') }}</div>
            </div>
        @endif

        <div class="grid gap-6 lg:grid-cols-3">
            {{-- Status Card --}}
            <div class="lg:col-span-3">
                <div class="rounded-2xl bg-white p-5 shadow-apple-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-[#86868b]">Status Pendaftaran</span>
                        @if ($data->status == 1)
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-4 py-1.5 text-sm font-semibold text-emerald-700">
                                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                Diterima
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-4 py-1.5 text-sm font-semibold text-amber-700">
                                <span class="h-2 w-2 rounded-full bg-amber-400"></span>
                                Pending
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Informasi Siswa --}}
            <div class="lg:col-span-2">
                <div class="rounded-2xl bg-white p-6 shadow-apple-sm">
                    <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-[#86868b]">Informasi Siswa</h2>
                    <div class="grid gap-x-8 gap-y-4 sm:grid-cols-2">
                        <div>
                            <p class="text-xs text-[#86868b]">Nama Lengkap</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->nama }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-[#86868b]">Jenis Kelamin</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->kelamin == 'P' ? 'Santri Putri' : 'Santri Putra' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-[#86868b]">Tempat Lahir</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->tpt_lahir ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-[#86868b]">Tanggal Lahir</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->tgl_lahir ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-[#86868b]">NIK</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->nik ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-[#86868b]">NISN</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->nisn ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-[#86868b]">No. KK</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->kk ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-[#86868b]">Asal Sekolah</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->asal_sekolah ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-[#86868b]">Tingkat Formal</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->formal ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-[#86868b]">Tingkat Diniyah</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->diniyah ?: '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar: Alamat + Orang Tua --}}
            <div class="space-y-6">
                <div class="rounded-2xl bg-white p-6 shadow-apple-sm">
                    <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-[#86868b]">Alamat</h2>
                    <p class="text-sm leading-relaxed text-[#1d1d1f]">{{ $data->alamat ?: '-' }}</p>
                </div>

                <div class="rounded-2xl bg-white p-6 shadow-apple-sm">
                    <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-[#86868b]">Orang Tua</h2>
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-[#86868b]">Nama Ayah</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->ayah ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-[#86868b]">No. Telp Ayah</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->no_ayah ?: '-' }}</p>
                        </div>
                        <div class="border-t border-apple-border/50 pt-3">
                            <p class="text-xs text-[#86868b]">Nama Ibu</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->ibu ?: '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-[#86868b]">No. Telp Ibu</p>
                            <p class="mt-0.5 font-medium text-[#1d1d1f]">{{ $data->no_ibu ?: '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Dokumen Pendukung --}}
            <div class="lg:col-span-3">
                <div class="rounded-2xl bg-white p-6 shadow-apple-sm">
                    <div class="mb-4 flex items-center justify-between">
                        <h2 class="text-sm font-semibold uppercase tracking-wider text-[#86868b]">Dokumen Pendukung</h2>
                        <a href="/pspdb/dokumen-pendukung/{{ $data->id }}/edit"
                           class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-4 py-1.5 text-xs font-medium text-emerald-600 transition-colors hover:bg-emerald-100">
                            <ion-icon name="cloud-upload"></ion-icon>
                            Upload
                        </a>
                    </div>
                    @php $documents = $data->fileuserinput()->get(); @endphp
                    @if ($documents->isEmpty())
                        <div class="flex flex-col items-center justify-center rounded-xl bg-[#f5f5f7] py-8">
                            <ion-icon name="document-text" class="text-3xl text-[#86868b]"></ion-icon>
                            <p class="mt-2 text-sm text-[#86868b]">Belum ada dokumen</p>
                        </div>
                    @else
                        <div class="overflow-hidden rounded-xl border border-apple-border/50">
                            <table class="w-full text-left text-sm">
                                <thead class="bg-[#f5f5f7]">
                                    <tr>
                                        <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-[#86868b]">Nama Dokumen</th>
                                        <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-[#86868b]">Tipe</th>
                                        <th class="px-4 py-3 text-xs font-semibold uppercase tracking-wider text-[#86868b]">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-apple-border/50">
                                    @foreach ($documents as $document)
                                        <tr class="transition-colors hover:bg-[#fafafa]">
                                            <td class="px-4 py-3 font-medium text-[#1d1d1f]">{{ $document->original_name }}</td>
                                            <td class="px-4 py-3">
                                                <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-medium text-sky-600">{{ $document->typeFile }}</span>
                                            </td>
                                            <td class="px-4 py-3">
                                                <form action="/pspdb/dokumen-pendukung/{{ $document->id }}" method="post"
                                                      onsubmit="return confirm('Hapus dokumen ini?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 text-red-500 transition-all duration-200 hover:bg-red-500 hover:text-white">
                                                        <ion-icon name="trash" class="text-sm"></ion-icon>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
