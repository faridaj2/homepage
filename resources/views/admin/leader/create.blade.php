@extends('layout.dashboard')
@section('content')
    <div class="mx-3" x-data="app">
        <div>
            <h1 class="font-bold text-3xl">Buat Artikel Baru</h1>
        </div>
        <form method="POST" action="/dashboard/article-leader" class="mt-5" @submit.prevent="submitArticleLeader()">
            @csrf
            <div class="">
                <h1 class="text-sm my-2 ml-2 text-gray-500">Judul Artikel Ini...?</h1>
                <input type="text" name="title" id="" x-model="title"
                    class="w-full focus:ring-0 rounded-md focus:outline-none border-2 border-gray-200 focus:border-gray-100">
            </div>
            <div class="">
                <h1 class="text-sm my-2 ml-2 text-gray-500">Thumbnail Image</h1>
                <input type="url" name="image" id="" x-model="img"
                    class="w-full focus:ring-0 rounded-md focus:outline-none border-2 border-gray-200 focus:border-gray-100">
            </div>
            <div class=" mt-4">
                <h1 class="text-sm my-2 ml-2 text-gray-500">Isi Artikel ini</h1>
                <textarea name="" id="" cols="30" rows="10"
                    class="w-full outline-none border-2 focus:ring-0 bg-background text-2xl"></textarea>
            </div>
            <input type="submit" value="Simpan"
                class="bg-violet-300 hover:bg-violet-500 px-3 py-2 text-white rounded-lg border-t mt-5 cursor-pointer"
                name="content" id="">
        </form>
    </div>


    <x-toast />

    {{-- end --}}
    <script>
        let content
        const app = {
            title: '',
            img: '',
            content: '',
            csrfToken: document.cookie.match(/XSRF-TOKEN=([^;]+)/)[1],
            submitArticleLeader() {
                axios.post('/dashboard/article-leader', {
                        title: this.title,
                        img: this.img,
                        content: content
                    }, {
                        'X-CSRF-TOKEN': this.csrfToken
                    })
                    .then(r => {
                        this.$dispatch('notice', {
                                type: 'success',
                                text: '✔️ Data Berhasil Terkirim'
                            }),
                            setTimeout(() => {
                                window.location.replace('/dashboard/pemimpin')
                            }, 3000);
                    })
                    .catch(error => {
                        this.$dispatch('notice', {
                            type: 'error',
                            text: '✖️ Terjadi Kesalahan'
                        })
                    })
            }
        }
        tinymce.init({
            selector: 'textarea',
            setup: function(editor) {
                editor.on('change', function() {
                    content = editor.getContent();
                });
            },
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss image',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
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
    <script src="https://cdn.tiny.cloud/1/vpmk19vvugfq61rgwhooflulvv0o9h9qd7wgaasn09hwm646/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
