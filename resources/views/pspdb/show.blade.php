@extends('pspdb.layout')
@section('content')
    @if (session('status'))
        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 shadow"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                {{ session('status') }}
            </div>
        </div>
    @endif
    <div class="flex items-center justify-between">
        <h1 class="font-bold py-6 text-xl">Informasi Peserta Didik</h1>
        <a href="/pspdb/{{ $data->id }}/edit" class="btn">Edit</a>
    </div>
    <div class="flex flex-col md:flex-row gap-3 font-Poppins">
        <section class="bg-white p-3 rounded-md shadow w-full">
            <h3 class="font-bold mb-3">Informasi Siswa</h3>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">Nama:</h4>
                <span class="font-semibold">{{ $data->nama }}</span>
            </div>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">Gender:</h4>
                <span class="font-semibold">{{ $data->kelamin == 'P' ? 'Santri Putri' : 'Santri Putra' }}</span>
            </div>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">Tempat Lahir:</h4>
                <span class="font-semibold">{{ $data->tpt_lahir }}</span>
            </div>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">Tanggal Lahir:</h4>
                <span class="font-semibold">{{ $data->tgl_lahir }}</span>
            </div>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">NIK:</h4>
                <span class="font-semibold">{{ $data->nik }}</span>
            </div>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">NISN:</h4>
                <span class="font-semibold">{{ $data->nisn }}</span>
            </div>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">Asal Sekolah:</h4>
                <span class="font-semibold">{{ $data->asal_sekolah }}</span>
            </div>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">Kelas Formal:</h4>
                <span class="font-semibold">{{ $data->formal }}</span>
            </div>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">Kelas non Formal:</h4>
                <span class="font-semibold">{{ $data->diniyah }}</span>
            </div>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">Status:</h4>
                <span class="bg-red-500 px-2 text-xs rounded-md text-white">Menunggu konfirmasi</span>
            </div>
        </section>
        <section class="bg-white p-3 rounded-md shadow w-full">
            <h3 class="font-bold mb-3">Alamat</h3>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">Alamat:</h4>
                <span class="font-semibold">{{ $data->alamat }}</span>
            </div>
        </section>
        <section class="bg-white p-3 rounded-md shadow w-full">
            <h3 class="font-bold mb-3">Identitas Orang Tua</h3>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">Nama Ayah:</h4>
                <span class="font-semibold">{{ $data->ayah }}</span>
            </div>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">Nomor tlp. Ayah:</h4>
                <span class="font-semibold">{{ $data->no_ayah }}</span>
            </div>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">Nama Ibu:</h4>
                <span class="font-semibold">{{ $data->ibu }}</span>
            </div>
            <div class="border p-3 rounded-lg bg-slate-100 my-2">
                <h4 class="text-sm text-slate-500">Nomor tlp. Ibu:</h4>
                <span class="font-semibold">{{ $data->no_ibu }}</span>
            </div>
        </section>
    </div>


    <div>

        <section class="flex justify-between gap-3 items-center my-5">
            <h1 class="font-normal tracking-wide font-Poppins text-xl">Dokument Pendukung <ion-icon
                    name="pricetags-outline"></ion-icon></h1> <a href="/pspdb/dokumen-pendukung/{{ $data->id }}/edit"
                class="btn" @click="modal = true"><ion-icon name="cloud-upload"></ion-icon>
                Upload</a>
        </section>

        <section class="font-light">

            <div class="">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border rounded-lg shadow overflow-hidden dark:border-gray-700 dark:shadow-gray-900">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                                Name</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($data->fileuserinput()->get() as $document)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    <a href="#">{{ $document->original_name }}</a> <span
                                                        class="bg-sky-300 px-2 py- rounded-md text-blue-800">{{ $document->typeFile }}</span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    <form action="/pspdb/dokumen-pendukung/{{ $document->id }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="bg-red-300 text-red-900 p-2 inline-flex items-center rounded-md"><ion-icon
                                                                name="trash"></ion-icon></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

@push('headScript')
    <style>
        .btn {
            padding: 1.3em 3em;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            font-weight: 500;
            color: #000;
            background-color: #fff;
            border: none;
            border-radius: 45px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
        }

        .btn:hover {
            background-color: #7042cb;
            box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
            color: #fff;
            transform: translateY(-7px);
        }

        .btn:active {
            transform: translateY(-1px);
        }
    </style>
@endpush
