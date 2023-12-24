@extends('layout.dashboard')
@section('content')
    <div class="flex gap-3 px-4 justify-end">
        <a href="/dashboard/article-leader/{{ $article->id }}/edit"
            class="p-2 px-3 rounded-md text-white hover:bg-sky-500 bg-sky-400 flex items-center gap-2">
            <ion-icon name="create-outline"></ion-icon> Edit</a>
        <button class="p-2 px-3 rounded-md text-white hover:bg-sky-500 bg-sky-400 flex items-center gap-2"> <ion-icon
                name="eye-outline"></ion-icon>
            View in web</button>
    </div>
    <div class="prose max-w-none">
        <h1>{{ $article->title }}</h1>
        <div class="w-full ">
            <img src="{{ $article->image_url }}" class="float-left m-3 rounded shadow" alt="">
            {!! $article->content !!}
        </div>
    </div>
@endsection
