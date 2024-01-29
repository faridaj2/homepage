@extends('pspdb.layout')

@section('content')
    {{-- @if (!session('id'))
        <script>
            window.location.href = '/pspdb/';
        </script>
    @endif --}}
    @if (session('status'))
        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50" role="alert">
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
                class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
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
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-3 mb-3">

            <option value="Kartu Keluarga">Fotokopi Kartu Keluarga</option>
            <option value="Akta Kelahiran">Fotokopi Akta Kelahiran</option>
            <option value="Ijazah">Fotokopi Ijazah Terakhir</option>
            <option value="Raport">Fotokopi Raport Terakhir</option>
        </select>
        <button class="bg-blue-100 hover:bg-blue-200 text-blue-700 p-3 rounded-full font-medium" type="submit">Upload
            File</button> <a href="/pspdb/{{ session('id') }}"
            class="bg-yellow-100 text-yellow-700 hover:bg-yellow-200  tracking-wide p-3 rounded-full mt-5 font-semibold">Selesai</a>
    </form>
@endsection

@push('scripts')
    <script>
        const app = {
            file: null,
            imageUrl: null,
            selectFile(e) {
                const self = this;
                this.file = e.target.files[0];

                const maxWidth = 1000;
                const maxHeight = 1000;
                const quality = 0.7; // Mengubah kualitas menjadi 70%

                compressImage(this.file, maxWidth, maxHeight, quality)
                    .then(function(blob) {
                        const url = URL.createObjectURL(blob);
                        self.imageUrl = url;
                        console.log(url);

                        const compressedFileInput = document.getElementById('dropzone-file');
                        const newFileInput = compressedFileInput.cloneNode(true);
                        compressedFileInput.replaceWith(newFileInput);

                        const fileList = new DataTransfer();
                        fileList.items.add(new File([blob], self.file.name));

                        newFileInput.files = fileList.files;
                    })
                    .catch(function(error) {
                        console.error('Terjadi kesalahan:', error);
                    });
            }
        };

        function compressImage(file, maxWidth, maxHeight, quality) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(event) {
                    const image = new Image();
                    image.src = event.target.result;
                    image.onload = function() {
                        let width = image.width;
                        let height = image.height;

                        const aspectRatio = width / height;
                        const maxAspectRatio = maxWidth / maxHeight;

                        if (aspectRatio > maxAspectRatio) {
                            if (width > maxWidth) {
                                height *= maxWidth / width;
                                width = maxWidth;
                            }
                        } else {
                            if (height > maxHeight) {
                                width *= maxHeight / height;
                                height = maxHeight;
                            }
                        }

                        const canvas = document.createElement('canvas');
                        canvas.width = width;
                        canvas.height = height;

                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(image, 0, 0, width, height);

                        canvas.toBlob(
                            function(blob) {
                                resolve(blob);
                            },
                            file.type,
                            quality
                        );
                    };
                };
                reader.onerror = function(error) {
                    reject(error);
                };
            });
        }
    </script>
@endpush
