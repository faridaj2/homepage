@extends('pspdb.layout')
@section('content')
    <div class="mx-auto max-w-2xl">
        {{-- Header --}}
        <div class="mb-8 text-center">
            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-50">
                <ion-icon name="create" class="text-3xl text-blue-600"></ion-icon>
            </div>
            <h1 class="mt-4 font-serif text-2xl font-semibold tracking-tight text-[#1d1d1f]">Edit Pendaftaran</h1>
            <p class="mt-1 text-sm text-[#86868b]">Perbarui data pendaftaran santri</p>
        </div>

        {{-- Form --}}
        <form action="/pspdb/{{ $data->id }}" method="POST" class="rounded-2xl bg-white p-6 shadow-apple-sm sm:p-8">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

            {{-- Data Siswa --}}
            <div class="mb-8">
                <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-[#86868b]">Data Siswa</h2>
                <div class="space-y-4">
                    <div>
                        <label for="Nama" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">Nama Lengkap <span class="text-red-400">*</span></label>
                        <input type="text" name="nama" id="Nama" value="{{ $data->nama }}" required
                               class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                               placeholder="Nama lengkap santri">
                    </div>
                    <div class="grid gap-4 sm:grid-cols-3">
                        <div>
                            <label for="nik" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">NIK</label>
                            <input type="number" name="nik" id="nik" value="{{ $data->nik }}"
                                   class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                                   placeholder="Nomor NIK">
                        </div>
                        <div>
                            <label for="nisn" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">NISN</label>
                            <input type="text" name="nisn" id="nisn" value="{{ $data->nisn }}"
                                   class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                                   placeholder="Nomor NISN">
                        </div>
                        <div>
                            <label for="kk" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">No. KK</label>
                            <input type="text" name="kk" id="kk" value="{{ $data->kk }}"
                                   class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                                   placeholder="Nomor KK">
                        </div>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="tpt_lahir" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">Tempat Lahir</label>
                            <input type="text" name="tpt_lahir" id="tpt_lahir" value="{{ $data->tpt_lahir }}"
                                   class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                                   placeholder="Tempat lahir">
                        </div>
                        <div>
                            <label for="small-input" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" id="small-input" value="{{ $data->tgl_lahir }}"
                                   class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20">
                        </div>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="asal_sklh" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">Asal Sekolah</label>
                            <input type="text" name="asal_sklh" id="asal_sklh" value="{{ $data->asal_sekolah }}"
                                   class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                                   placeholder="Asal sekolah sebelumnya">
                        </div>
                        <div>
                            <label for="jenis_kelamin" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="kelamin"
                                    class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20">
                                <option value="L" {{ $data->kelamin == 'L' ? 'selected' : '' }}>Santri Putra</option>
                                <option value="P" {{ $data->kelamin == 'P' ? 'selected' : '' }}>Santri Putri</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tingkatan --}}
            <div class="mb-8">
                <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-[#86868b]">Tingkatan</h2>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label for="tingkat_formal" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">Tingkat Formal</label>
                        <select id="tingkat_formal" name="formal"
                                class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20">
                            @foreach (['1 smp','2 smp','3 smp','1 smk','2 smk','3 smk'] as $opt)
                                <option value="{{ $opt }}" {{ $data->formal == $opt ? 'selected' : '' }}>{{ strtoupper($opt) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="tingkat_diniyah" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">Tingkat Diniyah</label>
                        <select id="tingkat_diniyah" name="diniyah"
                                class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20">
                            @foreach (['1 ula','2 ula','3 ula','4 ula','1 wustho','2 wustho','1 ulya','2 ulya'] as $opt)
                                <option value="{{ $opt }}" {{ $data->diniyah == $opt ? 'selected' : '' }}>{{ strtoupper(str_replace(' ', ' ', $opt)) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {{-- Kontak & Alamat --}}
            <div class="mb-8">
                <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-[#86868b]">Kontak & Alamat</h2>
                <div class="space-y-4">
                    <div>
                        <label for="email" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">Email</label>
                        <input type="email" name="email" id="email" value="{{ $data->email }}"
                               class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                               placeholder="email@example.com">
                    </div>
                    <div>
                        <label for="alamat" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">Alamat</label>
                        <textarea id="alamat" rows="3" name="alamat"
                                  class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                                  placeholder="Alamat lengkap">{{ $data->alamat }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Data Orang Tua --}}
            <div class="mb-8">
                <h2 class="mb-4 text-sm font-semibold uppercase tracking-wider text-[#86868b]">Data Orang Tua</h2>
                <div class="space-y-4">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="nama_ayah" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">Nama Ayah</label>
                            <input type="text" name="nama_ayah" id="nama_ayah" value="{{ $data->ayah }}"
                                   class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                                   placeholder="Nama ayah">
                        </div>
                        <div>
                            <label for="tlp_ayah" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">No. Telp Ayah</label>
                            <input type="number" name="tlp_ayah" id="tlp_ayah" value="{{ $data->no_ayah }}"
                                   class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                                   placeholder="08xxxxx">
                        </div>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="nama_ibu" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">Nama Ibu</label>
                            <input type="text" name="nama_ibu" id="nama_ibu" value="{{ $data->ibu }}"
                                   class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                                   placeholder="Nama ibu">
                        </div>
                        <div>
                            <label for="tlp_ibu" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">No. Telp Ibu</label>
                            <input type="number" name="tlp_ibu" id="tlp_ibu" value="{{ $data->no_ibu }}"
                                   class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                                   placeholder="08xxxxx">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="flex gap-3">
                <a href="/pspdb/{{ $data->id }}"
                   class="flex-1 rounded-xl border border-apple-border bg-white px-4 py-3 text-center text-sm font-medium text-[#86868b] transition-colors hover:bg-[#f5f5f7] sm:flex-none">
                    Batal
                </a>
                <button type="submit"
                        class="flex-1 rounded-full bg-emerald-600 px-8 py-3 text-sm font-medium text-white shadow-sm transition-all duration-200 hover:bg-emerald-700 hover:shadow-md active:scale-[0.97] sm:flex-none">
                    <ion-icon name="save" class="-mt-0.5 mr-1.5 inline-block"></ion-icon>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
