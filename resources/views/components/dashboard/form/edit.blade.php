<div class="mx-3" x-data="app">
    <div>
        <h1 class="font-bold text-3xl">Edit Artikel</h1>
    </div>
    <form method="POST" action="/dashboard/berita" class="mt-5" @submit.prevent="submitArticleLeader()">
        @csrf
        <div class="">
            <h1 class="text-sm my-2 ml-2 text-gray-500">{{ $title }}</h1>
            <input type="text" name="title" id="" x-model="title" @input.debounce.500ms="checkSlug"
                class="w-full focus:ring-0 rounded-md focus:outline-none border-2 border-gray-200 focus:border-gray-100">
        </div>
        <div class="">
            <h1 class="text-sm my-2 ml-2 text-gray-500">Slug</h1>
            <input type="text" name="title" id="" x-model="slug" disabled
                class="w-full focus:ring-0 rounded-md focus:outline-none border-2 border-gray-200 focus:border-gray-100">
        </div>
        <div class="">
            <h1 class="text-sm my-2 ml-2 text-gray-500">Thumbnail Image</h1>
            <input type="url" name="image" id="" x-model="img"
                class="w-full focus:ring-0 rounded-md focus:outline-none border-2 border-gray-200 focus:border-gray-100">
        </div>
        <div class=" mt-4">
            <h1 class="text-sm my-2 ml-2 text-gray-500">Isi Artikel ini</h1>
            <textarea name="" id="myTextarea" cols="30" rows="10"
                class="w-full outline-none border-2 focus:ring-0 bg-background text-2xl"></textarea>
        </div>
        <input type="submit" value="Simpan" x-bind:disabled="loading"
            class="bg-violet-500 hover:bg-violet-700 px-3 py-2 text-white rounded-lg border-t mt-5 cursor-pointer disabled:cursor-progress disabled:bg-slate-500"
            name="content" id="">
    </form>
</div>


<x-toast />

{{-- end --}}
<script>
    let content;
    const app = {
        title: '{{ $data->title }}',
        img: '{{ $data->image_url }}',
        slug: '{{ $data->slug }}',
        loading: false,
        content: '',
        csrfToken: document.cookie.match(/XSRF-TOKEN=([^;]+)/)[1],
        async submitArticleLeader() {
            this.loading = true
            await axios.put('{{ $url }}' + '/' + {{ $data->id }}, {
                    title: this.title,
                    slug: this.slug,
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
                            window.location.replace(
                                '{{ $url == '/dashboard/article-leader' ? '/dashboard/pemimpin' : $url }}'
                            )
                        }, 500);
                })
                .catch(error => {
                    this.loading = false;
                    console.log(error)
                    this.$dispatch('notice', {
                        type: 'error',
                        text: '✖️ Terjadi Kesalahan'
                    })
                })
        },
        async checkSlug() {
            let url = this.title
            // Menghapus spasi dan karakter khusus
            let cleanURL = url.trim().replace(/[^a-zA-Z0-9]/g, '-');
            // Mengonversi huruf besar menjadi kecil
            cleanURL = cleanURL.toLowerCase();
            // Menggabungkan beberapa tanda strip menjadi satu
            cleanURL = cleanURL.replace(/-+/g, '-');
            this.slug = cleanURL;
            await axios.get(`/api/{{ $slug }}?slug=${this.slug}`)
                .then(r => {
                    if (r.data.exists) {
                        this.slug += `-${r.data.exists}`;
                    }
                })
                .catch(err => {
                    console.log(err)
                })
        }
    }

    tinymce.init({
        selector: 'textarea',
        height: "1052",
        setup: function(editor) {
            editor.on('change', function() {
                content = editor.getContent();
            });
            editor.on('init', function() {
                editor.setContent(`{!! $data->content !!}`);
                content = `{!! $data->content !!}`;
            });
        },
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
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
