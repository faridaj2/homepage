@extends('pspdb.layout')

@section('content')
    @if (!session('id'))
        <script>
            window.location.href = '/pspdb/';
        </script>
    @endif
    @if (session('status'))
        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 shadow my-3"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                {{ session('status') }}
            </div>
        </div>
    @endif
    <form action="/pspdb/dokumen-pendukung" method="POST" enctype="multipart/form-data" x-data="app">
        @csrf
        <input type="hidden" value="{{ session('id') }}" name="id">
        <div class="flex items-center justify-center w-full mt-5">
            <label for="dropzone-file"
                class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6 p-5 ">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"
                        x-html="!file? 'Klik Untuk mengupload file': file.name">
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400"
                        x-html="file ? 'Klik untuk mengubah file' : 'Silahkan Upload File Dokumen Anda'">
                    </p>
                </div>
                <img class="m-4" :src="imageUrl" alt="">

                <input id="dropzone-file" name="file" type="file" @change="selectFile($event)" class="hidden" />
            </label>
        </div>

        <select id="fileType" name="fileType"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-3">

            <option value="Kartu Keluarga">Fotokopi Kartu Keluarga</option>
            <option value="Akta Kelahiran">Fotokopi Akta Kelahiran</option>
            <option value="Ijazah">Fotokopi Ijazah Terakhir</option>
            <option value="Raport">Fotokopi Raport Terakhir</option>
        </select>
        <button class="bg-black text-white tracking-wide p-3 rounded-md mt-5" type="submit">Upload
            File</button> <a href="/pspdb/{{ session('id') }}"
            class="bg-yellow-300 text-yellow-700 tracking-wide p-3 rounded-md mt-5 font-semibold">Selesai</a>
    </form>
@endsection

@push('scripts')
    <script>
        const app = {
            file: null,
            imageUrl: null,
            selectFile(e) {
                this.file = e.target.files[0]
                this.imageUrl = URL.createObjectURL(this.file)
            }
        }
    </script>
@endpush
