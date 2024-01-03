@extends('layout.dashboard')
@section('content')
    <div class="flex justify-between p-3">

        <div>
            <h1 class="font-bold text-xl">Info Pendaftaran</h1>
            <h6 class="text-xs text-slate-400">Lorem ipsum dolor sit amet.</h6>
        </div>
        <a href="/dashboard/kontak/create"
            class="flex items-center gap-1 bg-violet-400 hover:bg-violet-500 text-white px-6 font-semibold rounded-md">
            <ion-icon name="create-outline"></ion-icon>
            Edit</a>
    </div>
    <div class="px-2 md:px-0 flex flex-col gap-3" x-data="app">
        <div class="px-3">
            @if ($data)
                <div class="prose max-w-none bg-white w-full border rounded-xl p-3">
                    {!! $data->content !!}
                </div>
            @else
                <div>Data tidak ditemukan</div>
            @endif
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
                editor.on('change', function() {
                    content = editor.getContent();
                });
            },
            plugins: 'textcolor ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss image',
            toolbar: 'forecolor backcolor | undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            image_uploadtab: true,
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                "See docs to implement AI Assistant")),

        });
    </script>
@endsection

@push('headScript')
    <script src="/tinymce/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
