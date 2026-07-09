@extends('layout.dashboard')

@section('content')
    <div class="space-y-6">
        {{-- Header --}}
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="font-serif text-xl font-semibold text-[#1d1d1f]">Data PSPDB</h1>
                <p class="mt-0.5 text-sm text-[#86868b]">Daftar siswa yang terdaftar dalam Penerimaan Santri Baru</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-600">
                    {{ count($data) }} total
                </span>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-hidden rounded-2xl bg-white shadow-apple-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="border-b border-apple-border/50 bg-[#f5f5f7]">
                            <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-[#86868b]">Nama</th>
                            <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-[#86868b] hidden sm:table-cell">Formal</th>
                            <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-[#86868b] hidden md:table-cell">Diniyah</th>
                            <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-[#86868b] hidden lg:table-cell">Tanggal</th>
                            <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-[#86868b]">Status</th>
                            <th class="px-5 py-3.5 text-xs font-semibold uppercase tracking-wider text-[#86868b]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-apple-border/50">
                        @forelse ($data as $siswa)
                            <tr class="transition-colors hover:bg-[#fafafa]">
                                <td class="px-5 py-4">
                                    <div class="font-medium text-[#1d1d1f]">{{ $siswa->nama }}</div>
                                    <div class="text-xs text-[#86868b]">{{ $siswa->user->name ?? '-' }}</div>
                                </td>
                                <td class="px-5 py-4 text-[#86868b] hidden sm:table-cell">{{ $siswa->formal ?: '-' }}</td>
                                <td class="px-5 py-4 text-[#86868b] hidden md:table-cell">{{ $siswa->diniyah ?: '-' }}</td>
                                <td class="px-5 py-4 text-[#86868b] hidden lg:table-cell whitespace-nowrap">
                                    {{ $siswa->created_at ? $siswa->created_at->format('d M Y H:i') : '-' }}
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
                                        <a href="/pspdb/{{ $siswa->id }}"
                                           class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600 transition-all duration-200 hover:bg-emerald-600 hover:text-white"
                                           title="Lihat">
                                            <ion-icon name="eye" class="text-sm"></ion-icon>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-12 text-center text-[#86868b]">
                                    <div class="flex flex-col items-center">
                                        <ion-icon name="people" class="text-3xl text-apple-border"></ion-icon>
                                        <p class="mt-2 text-sm">Belum ada data pendaftaran</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
