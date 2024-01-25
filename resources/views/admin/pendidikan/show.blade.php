@extends('layout.dashboard')
@section('content')
    <div class="flex gap-3 px-4 justify-end">
        <a href="/dashboard/pendidikan/{{ $data->id }}/edit"
            class="p-2 px-3 rounded-md text-white hover:bg-sky-500 bg-sky-400 flex items-center gap-2">
            <ion-icon name="create-outline"></ion-icon> Edit</a>
        <button class="p-2 px-3 rounded-md text-white hover:bg-sky-500 bg-sky-400 flex items-center gap-2"> <ion-icon
                name="eye-outline"></ion-icon>
            View in web</button>
    </div>
    <section class="">
        <div class="prose max-w-none">
            <h1>{{ $data->title }}</h1>
            <div class="w-full">
                <div class="max-h-96 w-52 mx-auto overflow-hidden">
                    <img src="{{ $article->image_url }}" class="w-full h-full object-cover object-center m-3 rounded shadow"
                        alt="">
                </div>
                {!! $data->content !!}
            </div>
        </div>
    </section>
@endsection
