@extends('layout.dashboard')
@section('content')
    <div class="mx-2" x-data="app">
        <div class="flex justify-start my-3">
            <button class="bg-blue-300 p-2 px-4 rounded-full" @click="upload=!upload"><ion-icon name="cloud-upload"></ion-icon>
                Upload
                File</button>
        </div>
        <div class="flex flex-wrap gap-3">
            @foreach ($file as $item)
                <div class="bg-white p-3 border inline-block rounded-md w-[200px] max-md:w-full">
                    <div class="overflow-hidden h-[200px] object-center relative">
                        <img src="{{ in_array($item->ext, ['png', 'svg', 'jpg', 'jpeg']) ? asset('/storage/file/' . $item->name) : 'https://img.icons8.com/fluency/240/file.png' }}"
                            class="rounded object-contain w-full" alt="">
                        <div class="absolute top-0 right-0 bg-white text-green-700 flex gap-3 px-2 rounded-bl">
                            <button class="hover:text-green-950"
                                @click="() => copy('{{ '/storage/file/' . $item->name }}')"><ion-icon
                                    name="link"></ion-icon></button>
                            <button class="hover:text-green-950 cursor-pointer"
                                @click="()=> deleteItem({{ $item }})"><ion-icon name="trash"></ion-icon></button>
                        </div>
                    </div>
                    <div>
                        {{-- @php
                            $fileName = $item->originalName;
                            $newFileName;

                            // Memotong nama file menjadi 7 karakter pertama
                            if (strlen($fileName) > 7) {
                                $shortenedName = substr($fileName, 0, 7);

                                // Mendapatkan ekstensi file
                                $extension = pathinfo($fileName, PATHINFO_EXTENSION);

                                // Menggabungkan nama file yang dipotong dengan ekstensi
                                $newFileName = $shortenedName . '.. .' . $extension;
                            } else {
                                $newFileName = $item->originalName;
                            }

                        @endphp --}}
                        <p class="font-bold py-3 text-xs truncate">{{ $item->originalName }}</p>
                    </div>
                </div>
            @endforeach


        </div>
        <div class="mt-2">
            {{ $file->links() }}
        </div>
        <div class="fixed top-0 left-0 w-full h-full bg-white flex items-center justify-center" x-show="upload">
            <button @click="upload=!upload" class="absolute top-10 right-10 text-3xl text-sky-400 hover:text-sky-700">
                <ion-icon name="close-circle"></ion-icon>
            </button>

            <div class=" p-3 rounded max-w-md">


                <input type="file" name="" id="fileInput" hidden @change="uploadFile">
                <div>

                    <h1 class="font-bold text-violet-400 text-center my-4">Upload Image</h1>
                    <div class="w-full border-dashed border-2 border-violet-400 flex items-center justify-center flex-col rounded cursor-pointer p-28"
                        x-show="loader">
                        <div class="lds-default ">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="text-blue-500 mt-4 text-center w-full">loading...</div>
                    </div>
                    <div x-show="!loader"
                        class="w-full border-dashed border-2 border-violet-400 flex items-center justify-center flex-col rounded cursor-pointer p-28"
                        @click="fileClick">

                        <div class="text-5xl text-violet-400">
                            <ion-icon name="cloud-upload"></ion-icon>
                        </div>
                        <p class="text-md font-bold text-violet-500 text-center">Drag & Drop to Upload</p>
                        <p class="text-xs text-slate-500">or browse</p>
                    </div>
                </div>
                <div class="w-full hidden md:block" id="uploading" x-show="loading">
                    <div class="shadow flex items-center p-3 text-violet-400 mt-3 rounded-md">
                        <div class="text-5xl text-violet-500 mr-3"><ion-icon name="document"></ion-icon></div>
                        <div class="w-full">
                            <div class="flex justify-between w-full mb-3">
                                <div class="text-blue-700 font-semibold text-sm truncate" x-text="fileUploadName">File
                                    Name.jpg</div>
                                <div class="text-xs font-semibold"><span x-text="percent"></span>%</div>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-[2px]">
                                <div class="bg-blue-600 h-[2px] rounded-full" id="progressBar" style="width: 0%"></div>
                            </div>
                        </div>
                        <div class="flex items-center pl-2">
                            <button class="bg-sky-100 rounded-full flex items-center p-3"><ion-icon
                                    name="close"></ion-icon></button>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <div x-show="open" class="fixed top-0 left-0 w-full h-full bg-white/90  flex items-center justify-center">
            <div class="shadow-lg p-3 bg-white rounded-lg text-center">
                <h1 class="font-bold p-4">Apakah Yakin Akan menghapus</h1>
                <p class="py-2 font-bold text-2xl truncate" x-html="data.originalName"></p>
                <hr>
                <div class="flex justify-around">
                    <button class="p-3 text-slate-500 w-full hover:bg-sky-100" @click="hapus()">Hapus</button>
                    <button class="p-3 text-slate-500 w-full hover:bg-sky-100" @click="open=!open">Batal</button>
                </div>
            </div>
        </div>

    </div>
    <x-toast />
    <script>
        const csrfToken = document.cookie.match(/XSRF-TOKEN=([^;]+)/)[1];
        const app = {
            open: false,
            data: {},
            upload: false,
            fileInput: document.getElementById('fileInput'),
            uploading: document.getElementById('uploading'),
            uploaded: document.getElementById('uploaded'),
            progressBar: document.getElementById('progressBar'),
            percent: 0,
            loading: false,
            fileUploadName: 'as',
            loader: false,
            fileClick() {
                this.fileInput.click();
            },
            uploadFile(files) {
                let file = files.target.files[0];
                handleUpload(file, this);
            },
            deleteItem(item) {
                this.open = true;
                this.data = item
            },
            async hapus() {
                await axios.delete('/dashboard/file/' + this.data.id)
                    .then(r => {
                        this.open = false,
                            this.$dispatch('notice', {
                                type: 'success',
                                text: '✔️ Data Berhasil dihapus'
                            }),
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                    })
                    .catch(e => console.log(e))
            },
            copy(copy) {
                const stringToCopy ='https://' + window.location.host + copy;
                const tempInput = document.createElement('input');
                tempInput.value = stringToCopy;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);
                this.$dispatch('notice', {
                    type: 'success',
                    text: '📜 Tautan telah disalin'
                })
            }
        };


        const handleUpload = async (file, app) => {
            app.loader = true
            const formData = new FormData();
            formData.append('file', file);

            const image = new Image();
            const reader = new FileReader();

            reader.onload = function(e) {
                image.onload = function() {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');

                    // Menghitung tinggi dan lebar baru berdasarkan rasio kompresi
                    const compressionRatio = 0.7; // Rasio kompresi 70%
                    const maxWidth = 1300;
                    const maxHeight = 1300;
                    let newWidth = image.width;
                    let newHeight = image.height;

                    if (newWidth > maxWidth || newHeight > maxHeight) {
                        const widthRatio = maxWidth / newWidth;
                        const heightRatio = maxHeight / newHeight;
                        const ratio = Math.min(widthRatio, heightRatio);

                        newWidth *= ratio;
                        newHeight *= ratio;
                    }

                    canvas.width = newWidth;
                    canvas.height = newHeight;

                    // Menggambar gambar pada elemen canvas dengan ukuran yang telah dikompressi
                    ctx.drawImage(image, 0, 0, newWidth, newHeight);

                    // Mengubah gambar pada elemen canvas menjadi blob
                    canvas.toBlob(async (compressedBlob) => {
                        formData.append('file', compressedBlob, file.name);

                        await axios
                            .post('/dashboard/file', formData, {
                                headers: {
                                    'Content-Type': 'multipart/form-data',
                                },
                                'X-CSRF-TOKEN': csrfToken,
                                onUploadProgress: (progressEvent) => {
                                    const progress = Math.round(
                                        (progressEvent.loaded / progressEvent
                                            .total) * 100
                                    );
                                    app.loading = true;
                                    app.percent = progress;
                                    app.progressBar.style.width = progress + '%';
                                    app.fileUploadName = file.name;


                                },
                            })
                            .then((response) => {
                                // Handle successful upload
                                console.log(response.data);
                                location.reload(true);
                            })
                            .catch((error) => {
                                // Handle upload error
                                console.error(error);
                            });
                    }, file.type);
                };

                image.src = e.target.result;
            };

            reader.readAsDataURL(file);
        };
    </script>
@endsection

@push('headScript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
