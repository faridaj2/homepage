@extends('layout.dashboard')
@section('content')
    <x-dashboard.form.edit :data="$data" :url="'/dashboard/berita'" :slug="'slug-berita'" :title="'Edit Artikel'" />
@endsection

@push('headScript')
    <script src="/tinymce/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
