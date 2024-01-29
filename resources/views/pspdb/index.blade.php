@extends('pspdb.layout')
@section('content')
    <div class=" my-3 flex justify-end">
        <a href="/pspdb/create" type="button"
            class="bg-blue-400 text-white focus:ring-4 flex items-center gap-2 hover:bg-blue-500 transition font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"><ion-icon
                name="document"></ion-icon> Buat
            Baru</a>
    </div>
    <div x-data="app">
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



        <section class="relative sm:rounded-lg overflow-x-auto scroll">
            <table class="w-full text-sm text-left text-gray-500 ">

                <tr class="text-xs text-gray-400 font-semibold text-left">
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
                <tbody class="">
                    @foreach ($data as $siswa)
                        <tr class="border-b last:border-none border-gray-100">
                            <th scope="" class="px-6 py-4 ">
                                <a href="/pspdb/{{ $siswa->id }}"
                                    class="hover:text-blue-500 font-medium uppercase whitespace-nowrap">
                                    {{ $siswa->nama }}
                                </a>
                            </th>
                            <td class="px-6 py-4 ">
                                @if ($siswa->status == 1)
                                    <span
                                        class="inline-block font-sans text-xs py-1.5 px-3 m-1 rounded-full bg-success-100 bg-sky-200 text-sky-700 font-semibold
                                      ">Diterima</span>
                                @else
                                    <span
                                        class="bg-red-200 font-sans py-1.5 px-3 m-1 text-red-700 rounded-full text-xs font-semibold">Pending</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 flex gap-2">

                                <a href="/pspdb/{{ $siswa->id }}/edit"
                                    class="font-medium hover:bg-gray-200 bg-gray-100 px-3 py-1 rounded-full">Edit</a>

                                <button type="submit"
                                    @click="() => openModal('{{ $siswa->id }}', '{{ $siswa->nama }}')"
                                    class="font-medium px-3 py-1 bg-gray-100 rounded-full hover:bg-gray-200">Hapus</button>
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
