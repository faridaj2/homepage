@extends('pspdb.layout')

@section('content')
    <div>

        <section class="flex justify-between gap-3 items-center my-5">
            <h1 class="font-normal tracking-wide font-Poppins text-xl">Dokument Pendukung <ion-icon
                    name="pricetags-outline"></ion-icon></h1> <a href="/pspdb/dokumen-pendukung/create" class="btn"
                @click="modal = true"><ion-icon name="cloud-upload"></ion-icon>
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
                                        @for ($i = 0; $i < 10; $i++)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    John Bn <span class="bg-sky-300 px-2 py- rounded-md text-blue-800">Kartu
                                                        Keluarga</span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    <button
                                                        class="bg-red-300 text-red-900 p-2 inline-flex items-center rounded-md"><ion-icon
                                                            name="trash"></ion-icon></button>
                                                </td>
                                            </tr>
                                        @endfor


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
