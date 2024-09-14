@extends('layout.dashboard')
@section('content')
    <div class="flex justify-between p-3">
        <div>
            <h1 class="font-bold text-xl">Edit Info Pendaftaran</h1>
        </div>

    </div>
    <div class="px-2 md:px-0 flex flex-col gap-3" x-data="app">
        <div class=" mt-4">

            <h1 class="text-sm my-2 ml-2 text-gray-500">Info pendaftaran</h1>
            <form action="/dashboard/info-pendaftaran" method="post">
                @csrf
                <textarea name="content" id="" cols="30" rows="10"
                    class="w-full outline-none border-2 focus:ring-0 bg-background text-2xl"></textarea>
                <input type="submit" name="" id="" value="Simpan"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-5">
            </form>
        </div>
        <x-toast />
        <div x-show="open" class="fixed top-0 left-0 w-full h-full bg-white/90  flex items-center justify-center">
            <div class="shadow-lg p-3 bg-white rounded-lg text-center">
                <h1 class="font-bold p-4">Apakah Yakin Akan menghapus</h1>
                <p class="py-2 font-bold text-2xl" x-html="data.title"></p>
                <hr>
                <div class="flex justify-around">
                    <button class="p-3 text-slate-500 w-full hover:bg-sky-100" @click="hapus()">Hapus</button>
                    <button class="p-3 text-slate-500 w-full hover:bg-sky-100" @click="open=!open">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const app = {
            open: false,
            data: {},
            async hapus() {
                await axios.delete('/dashboard/pendidikan/' + this.data.id)
                    .then(r => {
                        this.open = false,
                            this.$dispatch('notice', {
                                type: 'success',
                                text: '✔️ Data Berhasil dihapus'
                            }),
                            setTimeout(() => {
                                window.location.replace('/dashboard/pendidikan')
                            }, 1000);
                    })
                    .catch(e => console.log(e))
            }
        }
        tinymce.init({
            selector: 'textarea',
            height: "720",
            setup: function(editor) {
                @if ($data)
                    editor.on('init', function() {
                        editor.setContent(`{!! $data->content !!}`)
                    });
                @endif
            },
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Farid',
            file_picker_types: 'image',
            promotion: false,
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.addEventListener('change', (e) => {
                    const file = e.target.files[0];

                    const reader = new FileReader();
                    reader.addEventListener('load', () => {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        const id = 'blobid' + (new Date()).getTime();
                        const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(',')[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    });
                    reader.readAsDataURL(file);
                });

                input.click();
            }

        });
    </script>
@endsection

@push('headScript')
    <script src="/tinymce/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
