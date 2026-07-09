<div x-data="app">
    {{-- Header --}}
    <div class="mb-8">
        <a href="{{ url()->previous() }}" class="mb-4 inline-flex items-center gap-1 text-sm text-[#86868b] transition-colors hover:text-emerald-600">
            <ion-icon name="arrow-back-outline"></ion-icon>
            Kembali
        </a>
        <h1 class="font-serif text-2xl font-semibold text-[#1d1d1f]">{{ $title }}</h1>
    </div>

    <form method="POST" action="/dashboard/article-leader" class="max-w-3xl" @submit.prevent="submitArticleLeader()">
        @csrf
        
        {{-- Title --}}
        <div class="mb-6">
            <label class="mb-2 block text-sm font-medium text-[#1d1d1f]">Judul Artikel</label>
            <input type="text" name="title" x-model="title" @input.debounce.500ms="checkSlug"
                   class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                   placeholder="Masukkan judul artikel...">
        </div>

        {{-- Slug --}}
        <div class="mb-6">
            <label class="mb-2 block text-sm font-medium text-[#1d1d1f]">Slug</label>
            <input type="text" name="slug" x-model="slug" disabled
                   class="w-full rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-[#86868b]">
        </div>

        {{-- Image --}}
        <div class="mb-6">
            <label class="mb-2 block text-sm font-medium text-[#1d1d1f]">URL Thumbnail</label>
            <input type="url" name="image" x-model="img"
                   class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm text-[#1d1d1f] transition-all duration-200 placeholder:text-[#86868b] focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/20"
                   placeholder="https://example.com/image.jpg">
            <div x-show="img" class="mt-3 overflow-hidden rounded-xl border border-gray-100">
                <img :src="img" class="h-40 w-full object-cover" alt="Preview">
            </div>
        </div>

        {{-- Content --}}
        <div class="mb-8">
            <label class="mb-2 block text-sm font-medium text-[#1d1d1f]">Konten</label>
            <textarea name="content" id="contentEditor" cols="30" rows="10"
                      class="w-full rounded-xl border border-gray-200 bg-white"></textarea>
        </div>

        {{-- Submit --}}
        <div class="flex items-center gap-3">
            <button type="submit" x-bind:disabled="loading"
                    class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-8 py-3 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700 hover:shadow-lg disabled:cursor-not-allowed disabled:opacity-50">
                <span x-show="!loading">Simpan</span>
                <span x-show="loading" class="flex items-center gap-2">
                    <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    Menyimpan...
                </span>
            </button>
            <a href="{{ url()->previous() }}" class="text-sm font-medium text-[#86868b] transition-colors hover:text-[#1d1d1f]">Batal</a>
        </div>
    </form>
</div>

<x-toast />

<script>
    let content;
    const app = {
        title: '',
        img: '',
        slug: '',
        content: '',
        csrfToken: document.cookie.match(/XSRF-TOKEN=([^;]+)/)?.[1] || '',
        loading: false,
        async submitArticleLeader() {
            this.loading = true;
            await axios.post('{{ $url }}', {
                    title: this.title,
                    slug: this.slug,
                    img: this.img,
                    content: content
                }, {
                    'X-CSRF-TOKEN': this.csrfToken
                })
                .then(r => {
                    this.$dispatch('notice', { type: 'success', text: '✔️ Data Berhasil Terkirim' });
                    setTimeout(() => {
                        window.location.replace('{{ $url == '/dashboard/article-leader' ? '/dashboard/pemimpin' : $url }}');
                    }, 1000);
                })
                .catch(error => {
                    this.$dispatch('notice', { type: 'error', text: '✖️ Terjadi Kesalahan' });
                    this.loading = false;
                });
        },
        async checkSlug() {
            let url = this.title.trim().replace(/[^a-zA-Z0-9]/g, '-').toLowerCase().replace(/-+/g, '-');
            this.slug = url;
            await axios.get(`/api/{{ $slug }}?slug=${this.slug}`)
                .then(r => { if (r.data.exists) this.slug += `-${r.data.exists}`; })
                .catch(err => console.log(err));
        }
    };
    tinymce.init({
        selector: '#contentEditor',
        height: "520",
        setup: function(editor) {
            editor.on('change', function() { content = editor.getContent(); });
        },
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        promotion: false,
        file_picker_callback: (cb, value, meta) => {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.addEventListener('change', (e) => {
                const file = e.target.files[0];
                const reader = new FileReader();
                reader.addEventListener('load', () => {
                    const id = 'blobid' + Date.now();
                    const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    const base64 = reader.result.split(',')[1];
                    const blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                });
                reader.readAsDataURL(file);
            });
            input.click();
        }
    });
</script>
