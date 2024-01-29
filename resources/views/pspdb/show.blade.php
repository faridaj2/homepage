@extends('pspdb.layout')
@section('content')
    @if (session('status'))
        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50" role="alert">
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
    <div class="flex items-center justify-between px-4">
        <h1 class="font-bold py-6 text-xl">Informasi Peserta Didik</h1>
        <a href="/pspdb/{{ $data->id }}/edit"
            class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full flex items-center gap-2 hover:bg-blue-200 tracking-wide"><ion-icon
                name="pencil"></ion-icon>
            Edit</a>
    </div>
    <div class="flex flex-col md:flex-row gap-3 font-Poppins">
        <section class="p-3 rounded-md w-full">
            <h3 class="text-xl text-blue-900 font-semibold bg-sky-100 px-5 py-2 rounded-full">Informasi Siswa</h3>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">Nama:</h4>
                <span class="py-2 text-gray-900 font-sans">{{ $data->nama }}</span>
            </div>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">Gender:</h4>
                <span
                    class="py-2 text-gray-900 font-sans">{{ $data->kelamin == 'P' ? 'Santri Putri' : 'Santri Putra' }}</span>
            </div>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">Tempat Lahir:</h4>
                <span class="py-2 text-gray-900 font-sans">{{ $data->tpt_lahir }}</span>
            </div>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">Tanggal Lahir:</h4>
                <span class="py-2 text-gray-900 font-sans">{{ $data->tgl_lahir }}</span>
            </div>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">NIK:</h4>
                <span class="py-2 text-gray-900 font-sans">{{ $data->nik }}</span>
            </div>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">NISN:</h4>
                <span class="py-2 text-gray-900 font-sans">{{ $data->nisn }}</span>
            </div>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">Asal Sekolah:</h4>
                <span class="py-2 text-gray-900 font-sans">{{ $data->asal_sekolah }}</span>
            </div>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">Kelas Formal:</h4>
                <span class="py-2 text-gray-900 font-sans">{{ $data->formal }}</span>
            </div>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">Kelas non Formal:</h4>
                <span class="py-2 text-gray-900 font-sans">{{ $data->diniyah }}</span>
            </div>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">Status:</h4>
                @if ($data->status == 1)
                    <span class="bg-green-200 font-sans px-2 text-red-700 rounded-full text-xs">Diterima</span>
                @else
                    <span class="bg-red-200 font-sans px-2 text-red-700 rounded-full text-xs">Pending</span>
                @endif
            </div>
        </section>
        <section class="p-3 rounded-md w-full">
            <h3 class="text-xl text-blue-900 font-semibold bg-sky-100 px-5 py-2 rounded-full">Alamat</h3>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">Alamat:</h4>
                <span class="py-2 text-gray-900 font-sans">{{ $data->alamat }}</span>
            </div>
        </section>
        <section class="p-3 rounded-md w-full">
            <h3 class="text-xl text-blue-900 font-semibold bg-sky-100 px-5 py-2 rounded-full">Identitas Orang Tua</h3>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">Nama Ayah:</h4>
                <span class="py-2 text-gray-900 font-sans">{{ $data->ayah }}</span>
            </div>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">Nomor tlp. Ayah:</h4>
                <span class="py-2 text-gray-900 font-sans">{{ $data->no_ayah }}</span>
            </div>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">Nama Ibu:</h4>
                <span class="py-2 text-gray-900 font-sans">{{ $data->ibu }}</span>
            </div>
            <div class="p-3 rounded-lg my-2">
                <h4 class="text-xs text-gray-500">Nomor tlp. Ibu:</h4>
                <span class="py-2 text-gray-900 font-sans">{{ $data->no_ibu }}</span>
            </div>
        </section>
    </div>


    <div>

        <section class="flex justify-between gap-3 items-center my-5 px-4">
            <h1 class="font-bold py-6 text-xl">Dokument Pendukung </h1> <a
                href="/pspdb/dokumen-pendukung/{{ $data->id }}/edit"
                class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full flex items-center gap-2 hover:bg-blue-200 tracking-wide"
                @click="modal = true"><ion-icon name="cloud-upload"></ion-icon>
                Upload</a>
        </section>

        <section class="font-light px-4">

            <div class="">
                <div class="flex flex-col">
                    <div class=" overflow-x-auto scroll">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="rounded-lg overflow-hidden">
                                <table class="min-w-full ">
                                    <thead class="">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Nama Dokumen</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($data->fileuserinput()->get() as $document)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">
                                                    <span href="">{{ $document->original_name }}</span> <span
                                                        class="bg-sky-100 px-3 py-2 rounded-full hover:bg-sky-200 text-gray-600 font-normal items-center gap-2">{{ $document->typeFile }}</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">
                                                    <form action="/pspdb/dokumen-pendukung/{{ $document->id }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="bg-gray-100 px-3 py-2 rounded-full hover:bg-gray-200 flex text-gray-600 font-normal items-center gap-2"><ion-icon
                                                                name="trash"></ion-icon> Hapus</button>
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
