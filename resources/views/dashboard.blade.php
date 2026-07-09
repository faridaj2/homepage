@extends('layout.dashboard')

@section('content')
    <div class="space-y-8">
        {{-- Header --}}
        <div>
            <h1 class="font-serif text-2xl font-semibold tracking-tight text-[#1d1d1f] md:text-3xl">Dashboard</h1>
            <p class="mt-1 text-sm text-[#86868b]">Selamat datang kembali, {{ Auth::user()->name }}!</p>
        </div>

        {{-- Stat Cards --}}
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
            {{-- Stat: Berita --}}
            <div class="group rounded-2xl border border-gray-100/80 bg-white p-5 shadow-apple-sm transition-all duration-300 ease-apple hover:shadow-apple-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-[#86868b]">Berita</p>
                        <p class="mt-1.5 text-2xl font-semibold text-[#1d1d1f]">{{ $beritaCount ?? 0 }}</p>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                        <ion-icon name="newspaper-outline" class="text-xl"></ion-icon>
                    </div>
                </div>
            </div>

            {{-- Stat: Pemimpin --}}
            <div class="group rounded-2xl border border-gray-100/80 bg-white p-5 shadow-apple-sm transition-all duration-300 ease-apple hover:shadow-apple-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-[#86868b]">Pemimpin</p>
                        <p class="mt-1.5 text-2xl font-semibold text-[#1d1d1f]">{{ $pemimpinCount ?? 0 }}</p>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                        <ion-icon name="people-outline" class="text-xl"></ion-icon>
                    </div>
                </div>
            </div>

            {{-- Stat: Pendidikan --}}
            <div class="group rounded-2xl border border-gray-100/80 bg-white p-5 shadow-apple-sm transition-all duration-300 ease-apple hover:shadow-apple-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-[#86868b]">Pendidikan</p>
                        <p class="mt-1.5 text-2xl font-semibold text-[#1d1d1f]">{{ $pendidikanCount ?? 0 }}</p>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-violet-50 text-violet-600">
                        <ion-icon name="business-outline" class="text-xl"></ion-icon>
                    </div>
                </div>
            </div>

            {{-- Stat: Sejarah --}}
            <div class="group rounded-2xl border border-gray-100/80 bg-white p-5 shadow-apple-sm transition-all duration-300 ease-apple hover:shadow-apple-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-[#86868b]">Sejarah</p>
                        <p class="mt-1.5 text-2xl font-semibold text-[#1d1d1f]">{{ $sejarahCount ?? 0 }}</p>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                        <ion-icon name="flag-outline" class="text-xl"></ion-icon>
                    </div>
                </div>
            </div>

            {{-- Stat: PSPDB --}}
            <div class="group rounded-2xl border border-gray-100/80 bg-white p-5 shadow-apple-sm transition-all duration-300 ease-apple hover:shadow-apple-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-[#86868b]">PSPDB</p>
                        <p class="mt-1.5 text-2xl font-semibold text-[#1d1d1f]">{{ $pspdbCount ?? 0 }}</p>
                    </div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-rose-50 text-rose-600">
                        <ion-icon name="document-text-outline" class="text-xl"></ion-icon>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="rounded-2xl border border-gray-100/80 bg-white p-6 shadow-apple-sm">
            <h2 class="text-base font-semibold text-[#1d1d1f]">Aksi Cepat</h2>
            <div class="mt-4 flex flex-wrap gap-3">
                <a href="/dashboard/berita/create"
                   class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-5 py-2.5 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700 hover:shadow-lg">
                    <ion-icon name="add-outline"></ion-icon>
                    Berita Baru
                </a>
                <a href="/dashboard/pendidikan/create"
                   class="inline-flex items-center gap-2 rounded-full border border-gray-200 px-5 py-2.5 text-sm font-medium text-[#1d1d1f] transition-all duration-300 ease-apple hover:border-emerald-600 hover:text-emerald-600">
                    <ion-icon name="add-outline"></ion-icon>
                    Pendidikan Baru
                </a>
                <a href="{{ route('file') }}"
                   class="inline-flex items-center gap-2 rounded-full border border-gray-200 px-5 py-2.5 text-sm font-medium text-[#1d1d1f] transition-all duration-300 ease-apple hover:border-emerald-600 hover:text-emerald-600">
                    <ion-icon name="cloud-upload-outline"></ion-icon>
                    Upload File
                </a>
            </div>
        </div>

        {{-- Recent Activity Placeholder --}}
        <div class="rounded-2xl border border-gray-100/80 bg-white p-6 shadow-apple-sm">
            <h2 class="text-base font-semibold text-[#1d1d1f]">Aktivitas Terbaru</h2>
            <p class="mt-2 text-sm text-[#86868b]">Pantau perubahan konten terbaru di sini.</p>
            <div class="mt-4 space-y-3">
                @if(isset($recentActivities) && count($recentActivities) > 0)
                    @foreach($recentActivities as $activity)
                        <div class="flex items-center gap-3 rounded-xl bg-gray-50/50 p-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">
                                <ion-icon name="create-outline" class="text-sm"></ion-icon>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-[#1d1d1f]">{{ $activity->title }}</p>
                                <p class="text-xs text-[#86868b]">{{ $activity->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-sm text-[#86868b]">Belum ada aktivitas terbaru.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
