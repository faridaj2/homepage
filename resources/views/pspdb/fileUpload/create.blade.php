@extends('pspdb.layout')
@section('content')
    <div class="mx-auto max-w-2xl">
        {{-- Header --}}
        <div class="mb-8 text-center">
            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50">
                <ion-icon name="cloud-upload" class="text-3xl text-emerald-600"></ion-icon>
            </div>
            <h1 class="mt-4 font-serif text-2xl font-semibold tracking-tight text-[#1d1d1f]">Upload Dokumen Pendukung</h1>
            <p class="mt-1 text-sm text-[#86868b]">Upload dokumen yang diperlukan untuk pendaftaran</p>
        </div>

        @if (session('status'))
            <div class="mb-6 flex items-center gap-3 rounded-2xl bg-emerald-50 px-5 py-4 text-sm text-emerald-800 shadow-sm" role="alert">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-emerald-100">
                    <ion-icon name="checkmark-circle" class="text-lg text-emerald-600"></ion-icon>
                </div>
                <div>{{ session('status') }}</div>
            </div>
        @endif

        <div class="rounded-2xl bg-white p-6 shadow-apple-sm sm:p-8">
            <form action="/pspdb/dokumen-pendukung" method="POST" enctype="multipart/form-data" x-data="uploadApp">
                @csrf
                <input type="hidden" value="{{ session('id') }}" name="id">

                {{-- Dropzone --}}
                <div class="mb-6">
                    <label for="dropzone-file"
                           class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-apple-border bg-[#f5f5f7] p-8 transition-all duration-200 hover:border-emerald-600/50 hover:bg-emerald-50/30"
                           x-bind:class="file ? 'border-emerald-400 bg-emerald-50/50' : ''">
                        <template x-if="!file">
                            <div class="flex flex-col items-center">
                                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white shadow-apple-sm">
                                    <ion-icon name="cloud-upload-outline" class="text-3xl text-emerald-600"></ion-icon>
                                </div>
                                <p class="mt-4 text-sm font-medium text-[#1d1d1f]">Klik untuk mengupload file</p>
                                <p class="mt-1 text-xs text-[#86868b]">PDF, JPG, PNG — Maks. 2 MB</p>
                            </div>
                        </template>
                        <template x-if="file">
                            <div class="flex flex-col items-center">
                                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-50">
                                    <ion-icon name="document-attach" class="text-3xl text-emerald-600"></ion-icon>
                                </div>
                                <p class="mt-3 text-sm font-medium text-[#1d1d1f]" x-text="file.name"></p>
                                <p class="mt-1 text-xs text-emerald-600">Klik untuk mengganti file</p>
                                <div class="mt-3 h-1.5 w-48 overflow-hidden rounded-full bg-[#f5f5f7]">
                                    <div class="h-full rounded-full bg-emerald-500 transition-all duration-500" style="width: 100%"></div>
                                </div>
                            </div>
                        </template>
                        <input id="dropzone-file" name="file" type="file" accept="image/*,.pdf" @change="selectFile($event)" class="hidden"/>
                    </label>
                </div>

                {{-- Tipe Dokumen --}}
                <div class="mb-6">
                    <label for="fileType" class="mb-1.5 block text-sm font-medium text-[#1d1d1f]">Tipe Dokumen</label>
                    <select id="fileType" name="fileType"
                            class="w-full rounded-xl border border-apple-border bg-white px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20">
                        <option value="Kartu Keluarga">Fotokopi Kartu Keluarga</option>
                        <option value="Akta Kelahiran">Fotokopi Akta Kelahiran</option>
                        <option value="Ijazah">Fotokopi Ijazah Terakhir</option>
                        <option value="Raport">Fotokopi Raport Terakhir</option>
                    </select>
                </div>

                {{-- Actions --}}
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <a href="/pspdb/{{ session('id') }}"
                       class="inline-flex items-center justify-center gap-2 rounded-xl border border-apple-border bg-white px-6 py-2.5 text-sm font-medium text-[#86868b] transition-colors hover:bg-[#f5f5f7]">
                        <ion-icon name="checkmark"></ion-icon>
                        Selesai
                    </a>
                    <button type="submit"
                            class="inline-flex items-center justify-center gap-2 rounded-full bg-emerald-600 px-8 py-3 text-sm font-medium text-white shadow-sm transition-all duration-200 hover:bg-emerald-700 hover:shadow-md active:scale-[0.97]">
                        <ion-icon name="cloud-upload" class="text-lg"></ion-icon>
                        Upload File
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('uploadApp', () => ({
                file: null,
                imageUrl: null,
                selectFile(e) {
                    const selectedFile = e.target.files[0];
                    if (!selectedFile) return;
                    this.file = selectedFile;
                    if (selectedFile.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = (ev) => { this.imageUrl = ev.target.result; };
                        reader.readAsDataURL(selectedFile);
                    }
                }
            }));
        });
    </script>
    @endpush
@endsection
