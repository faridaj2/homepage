@extends('layout.dashboard')
@section('content')
    <div x-data="app">
        {{-- Header --}}
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="font-serif text-xl font-semibold text-[#1d1d1f]">File Upload</h1>
                <p class="mt-1 text-sm text-[#86868b]">Kelola file dan gambar pondok pesantren</p>
            </div>
            <button @click="upload=!upload"
               class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-5 py-2.5 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700 hover:shadow-lg">
                <ion-icon name="cloud-upload-outline"></ion-icon>
                Upload
            </button>
        </div>

        {{-- File Grid --}}
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse ($file as $item)
                <div class="group relative overflow-hidden rounded-2xl border border-gray-100/80 bg-white shadow-apple-sm transition-all duration-300 ease-apple hover:shadow-apple-lg">
                    <div class="aspect-square overflow-hidden bg-gray-50">
                        <img src="{{ in_array($item->ext, ['png', 'svg', 'jpg', 'jpeg']) ? asset('/storage/file/' . $item->name) : 'https://img.icons8.com/fluency/240/file.png' }}"
                             class="h-full w-full object-contain p-4">
                    </div>
                    <div class="p-3">
                        <p class="truncate text-sm font-medium text-[#1d1d1f]">{{ $item->originalName }}</p>
                        <p class="text-xs text-[#86868b]">{{ strtoupper($item->ext) }} file</p>
                    </div>
                    <div class="absolute right-2 top-2 flex gap-1 opacity-0 transition-all duration-200 group-hover:opacity-100">
                        <button @click="copy('{{ '/storage/file/' . $item->name }}')"
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-[#86868b] shadow-apple-sm backdrop-blur-sm transition-all duration-200 hover:bg-emerald-500 hover:text-white">
                            <ion-icon name="link-outline" class="text-sm"></ion-icon>
                        </button>
                        <button @click="deleteItem({{ $item->id }}, '{{ $item->originalName }}')"
                                class="flex h-8 w-8 items-center justify-center rounded-full bg-white/90 text-[#86868b] shadow-apple-sm backdrop-blur-sm transition-all duration-200 hover:bg-red-500 hover:text-white">
                            <ion-icon name="trash-outline" class="text-sm"></ion-icon>
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-full flex flex-col items-center justify-center rounded-2xl border border-dashed border-gray-200 py-16 text-center">
                    <ion-icon name="cloud-upload-outline" class="text-4xl text-[#86868b]"></ion-icon>
                    <p class="mt-3 text-sm text-[#86868b]">Belum ada file.</p>
                    <button @click="upload=true" class="mt-2 text-sm font-medium text-emerald-600 hover:text-emerald-700">Upload sekarang</button>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if(method_exists($file, 'links'))
            <div class="mt-6">
                {{ $file->links() }}
            </div>
        @endif

        {{-- Upload Modal --}}
        <div x-show="upload" 
             x-cloak
             x-transition:enter="transition-all duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="fixed inset-0 z-50 flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="upload=false"></div>
            <div x-show="upload"
                 x-transition:enter="transition-all duration-300 ease-apple"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="relative w-full max-w-md rounded-2xl bg-white p-8 shadow-2xl">
                <button @click="upload=false" class="absolute right-4 top-4 text-2xl text-[#86868b] hover:text-[#1d1d1f]">
                    <ion-icon name="close"></ion-icon>
                </button>

                <input type="file" id="fileInput" hidden @change="uploadFile">
                
                {{-- Upload Area --}}
                <div x-show="!loader"
                     class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-emerald-200 p-12 transition-all duration-300 hover:border-emerald-400 hover:bg-emerald-50/50"
                     @click="fileClick">
                    <div class="text-5xl text-emerald-400">
                        <ion-icon name="cloud-upload-outline"></ion-icon>
                    </div>
                    <p class="mt-4 text-sm font-medium text-[#1d1d1f]">Upload File</p>
                    <p class="text-xs text-[#86868b]">Klik untuk memilih file</p>
                </div>

                {{-- Loading --}}
                <div x-show="loader" class="flex flex-col items-center justify-center py-12">
                    <div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                    <p class="mt-4 text-sm text-emerald-600">Uploading...</p>
                </div>

                {{-- Progress --}}
                <div x-show="loading && !loader" class="mt-4">
                    <div class="flex items-center gap-3">
                        <ion-icon name="document-outline" class="text-2xl text-emerald-500"></ion-icon>
                        <div class="flex-1">
                            <div class="flex justify-between text-xs text-[#86868b]">
                                <span class="truncate" x-text="fileUploadName"></span>
                                <span x-text="percent + '%'"></span>
                            </div>
                            <div class="mt-1 h-1.5 w-full rounded-full bg-gray-100">
                                <div class="h-1.5 rounded-full bg-emerald-500 transition-all duration-300" id="progressBar" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Delete Modal --}}
        <div x-show="open" 
             x-cloak
             x-transition:enter="transition-all duration-300 ease-apple"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="fixed inset-0 z-50 flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
            <div x-show="open"
                 x-transition:enter="transition-all duration-300 ease-apple"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="relative w-full max-w-sm rounded-2xl bg-white p-6 shadow-2xl">
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-red-50">
                    <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                    </svg>
                </div>
                <div class="mt-4 text-center">
                    <h3 class="text-lg font-semibold text-[#1d1d1f]">Konfirmasi Hapus</h3>
                    <p class="mt-2 text-sm text-[#86868b]">
                        Apakah Anda yakin ingin menghapus 
                        <span class="font-medium text-[#1d1d1f]" x-html="data.originalName"></span>?
                    </p>
                </div>
                <div class="mt-6 flex justify-center gap-3">
                    <button @click="open=false" class="rounded-full border border-gray-200 px-6 py-2.5 text-sm font-medium text-[#86868b] transition-all hover:bg-gray-50">Batal</button>
                    <button @click="hapus()" class="rounded-full bg-red-500 px-6 py-2.5 text-sm font-medium text-white transition-all hover:bg-red-600">Hapus</button>
                </div>
            </div>
        </div>

        <x-toast />
    </div>

    <script>
        const csrfToken = document.cookie.match(/XSRF-TOKEN=([^;]+)/)[1];
        const app = {
            open: false,
            data: { id: null, originalName: '' },
            upload: false,
            fileInput: document.getElementById('fileInput'),
            progressBar: document.getElementById('progressBar'),
            percent: 0,
            loading: false,
            fileUploadName: '',
            loader: false,
            fileClick() {
                document.getElementById('fileInput').click();
            },
            uploadFile(files) {
                let file = files.target.files[0];
                handleUpload(file, this);
            },
            deleteItem(id, name) {
                this.data = { id, originalName: name };
                this.open = true;
            },
            async hapus() {
                await axios.delete('/dashboard/file/' + this.data.id)
                    .then(r => {
                        this.open = false;
                        this.$dispatch('notice', { type: 'success', text: '✔️ File Berhasil dihapus' });
                        setTimeout(() => location.reload(), 1000);
                    })
                    .catch(e => console.log(e));
            },
            copy(copy) {
                const stringToCopy = 'https://' + window.location.host + copy;
                const tempInput = document.createElement('input');
                tempInput.value = stringToCopy;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);
                this.$dispatch('notice', { type: 'success', text: '📜 Tautan telah disalin' });
            }
        };

        const handleUpload = async (file, app) => {
            app.loader = true;
            const formData = new FormData();
            formData.append('file', file);

            const image = new Image();
            const reader = new FileReader();
            reader.onload = function(e) {
                image.onload = function() {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    const compressionRatio = 0.7;
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
                    ctx.drawImage(image, 0, 0, newWidth, newHeight);
                    canvas.toBlob(async (compressedBlob) => {
                        formData.append('file', compressedBlob, file.name);
                        await axios.post('/dashboard/file', formData, {
                            headers: { 'Content-Type': 'multipart/form-data' },
                            'X-CSRF-TOKEN': csrfToken,
                            onUploadProgress: (progressEvent) => {
                                const progress = Math.round((progressEvent.loaded / progressEvent.total) * 100);
                                app.loading = true;
                                app.percent = progress;
                                app.progressBar.style.width = progress + '%';
                                app.fileUploadName = file.name;
                            },
                        }).then(() => location.reload())
                          .catch(error => console.error(error));
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
