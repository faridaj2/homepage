@extends('layout.dashboard')
@section('content')
    <div x-data="app">
        {{-- Header --}}
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="font-serif text-xl font-semibold text-[#1d1d1f]">Kontak & Alamat</h1>
                <p class="mt-1 text-sm text-[#86868b]">Kelola informasi kontak pondok pesantren</p>
            </div>
            <a href="/dashboard/kontak/create"
               class="inline-flex items-center gap-2 rounded-full bg-emerald-600 px-5 py-2.5 text-sm font-medium text-white transition-all duration-300 ease-apple hover:bg-emerald-700 hover:shadow-lg">
                <ion-icon name="create-outline"></ion-icon>
                Edit
            </a>
        </div>

        {{-- Content --}}
        <div class="rounded-2xl border border-gray-100/80 bg-white p-6 shadow-apple-sm">
            @if ($data)
                <div class="prose max-w-none">
                    {!! $data->content !!}
                </div>
            @else
                <div class="flex flex-col items-center justify-center py-12 text-center">
                    <ion-icon name="call-outline" class="text-4xl text-[#86868b]"></ion-icon>
                    <p class="mt-3 text-sm text-[#86868b]">Data tidak ditemukan</p>
                    <a href="/dashboard/kontak/create" class="mt-2 text-sm font-medium text-emerald-600 hover:text-emerald-700">Buat sekarang</a>
                </div>
            @endif
        </div>

        {{-- Delete Modal --}}
        <x-dashboard.delete-modal />
        <x-toast />
    </div>

    <script>
        const app = {
            open: false,
            data: { id: null, title: '' },
            openDelete(id, title) {
                this.data = { id, title };
                this.open = true;
            },
            async hapus() {
                await axios.delete('/dashboard/kontak/' + this.data.id)
                    .then(r => {
                        this.open = false;
                        this.$dispatch('notice', { type: 'success', text: '✔️ Data Berhasil dihapus' });
                        setTimeout(() => window.location.replace('/dashboard/kontak'), 1000);
                    })
                    .catch(e => console.log(e));
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
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            promotion: false,
        });
    </script>
@endsection

@push('headScript')
    <script src="/tinymce/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
