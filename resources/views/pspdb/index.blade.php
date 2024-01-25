@extends('pspdb.layout')
@section('content')
    <div class="border-b my-3 flex justify-end">
        <a href="/pspdb/create" type="button"
            class="text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300  font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Buat
            Baru</a>
    </div>
    <div x-data="app">
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



        <section class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Siswa
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $siswa)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="/pspdb/{{ $siswa->id }}" class="underline hover:text-blue-500">
                                    {{ $siswa->nama }}
                                </a>
                            </th>
                            <td class="px-6 py-4 ">
                                Pending
                            </td>
                            <td class="px-6 py-4">

                                <a href="/pspdb/{{ $siswa->id }}/edit"
                                    class="font-medium text-blue-600 hover:underline">Edit</a>

                                <button type="submit"
                                    @click="() => openModal('{{ $siswa->id }}', '{{ $siswa->nama }}')"
                                    class="font-medium text-red-600 hover:underline">Hapus</button>
                                <form action="/pspdb/{{ $siswa->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </section>
        <div x-show="modal"
            class="fixed top-0 left-0 w-full h-full bg-black/70 backdrop-blur-sm  flex items-center justify-center">
            <div class="shadow-lg p-3 bg-white rounded-lg text-center" @click.outside="modal = false">
                <h1 class="font-bold p-4">Apakah Yakin Akan menghapus</h1>
                <p class="py-2 font-bold text-2xl" x-html="dataOriginalName"></p>
                <hr>
                <div class="flex justify-around">
                    <form :action="`/pspdb/${dataToDelete}`" method="post" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="p-3 text-slate-500 w-full hover:bg-red-500 hover:text-white">Hapus</button>
                    </form>

                    <button class="p-3 text-slate-500 w-full hover:bg-sky-100" @click="modal=!modal">Batal</button>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        const app = {
            // Data
            modal: false,
            dataToDelete: null,
            dataOriginalName: null,

            // Method
            openModal(id, name) {
                this.modal = true
                this.dataToDelete = id,
                    this.dataOriginalName = name
            }
        }
    </script>
@endpush

@push('headScript')
    <style>
        .pulse {
            animation: pulse-animation 0.5s infinite;
        }

        @keyframes pulse-animation {
            0% {
                box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.2);
            }

            100% {
                box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
            }
        }
    </style>
@endpush
