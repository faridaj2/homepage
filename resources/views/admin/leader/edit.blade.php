@extends('layout.dashboard')
@section('content')
    <x-dashboard.form.edit :url="'/dashboard/article-leader'" :slug="'slug-pemimpin'" :title="'Edit Artikel Pemimpin'" :data="$data" />
@endsection

@push('headScript')
    {{-- <script src="https://cdn.tiny.cloud/1/vpmk19vvugfq61rgwhooflulvv0o9h9qd7wgaasn09hwm646/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script> --}}
    <script src="/tinymce/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
