@extends('pspdb.layout')
@section('content')
    <form class="mt-5" action="/pspdb/{{ $data->id }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="">
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nama" id="Nama" value="{{ $data->nama }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " required />
            <label for="Nama"
                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="number"" name="nik" id="nik" value="{{ $data->nik }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="nik"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NIK</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="nisn" id="nisn" value="{{ $data->nisn }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="nisn"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NISN</label>
            </div>
        </div>

        <div class="relative z-0 w-full mb-5 group ">
            <input type="text"" name="tpt_lahir" id="tpt_lahir" value="{{ $data->tpt_lahir }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="tpt_lahir"
                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tempat
                Lahir</label>
        </div>
        <div class="relative z-0 w-full mb-5 group max-w-md">
            <label for="small-input" class="block mb-2 text-sm font-normal text-gray-500 ">Tanggal
                Lahir</label>
            <input type="date" name="tgl_lahir" id="small-input" value="{{ $data->tgl_lahir }}"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="relative z-0 w-full mb-5 group max-w-md">


            <select id="jenis_kelamin" name="kelamin"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled selected value="L">Pilih Jenis Kelamin</option>
                <option value="L" {{ $data->kelamin == 'L' ? 'selected' : '' }}>Santri Putra</option>
                <option value="P" {{ $data->kelamin == 'P' ? 'selected' : '' }}>Santri Putri</option>
            </select>

        </div>
        <div class="grid md:grid-cols-2 md:gap-6 gap-3 py-4">
            <select id="tingkat_formal" name="formal"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled selected value="smp">Pilih Tingkatan Formal</option>
                <option value="1 smp" {{ $data->formal == '1 smp' ? 'selected' : '' }}>1 SMP</option>
                <option value="2 smp" {{ $data->formal == '2 smp' ? 'selected' : '' }}>2 SMP</option>
                <option value="3 smp" {{ $data->formal == '3 smp' ? 'selected' : '' }}>3 SMP</option>
                <option value="1 smk" {{ $data->formal == '1 smk' ? 'selected' : '' }}>1 SMK</option>
                <option value="2 smk" {{ $data->formal == '2 smk' ? 'selected' : '' }}>2 SMK</option>
                <option value="3 smk" {{ $data->formal == '3 smk' ? 'selected' : '' }}>3 SMK</option>
            </select>
            <select id="tingkat_diniyah" name="diniyah"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled selected value="L">Pilih Tingkatan Diniyah</option>
                <option value="1 ula" {{ $data->diniyah == '1 ula' ? 'selected' : '' }}>1 ULA</option>
                <option value="2 ula" {{ $data->diniyah == '2 ula' ? 'selected' : '' }}>2 ULA</option>
                <option value="3 ula" {{ $data->diniyah == '3 ula' ? 'selected' : '' }}>3 ULA</option>
                <option value="4 ula" {{ $data->diniyah == '4 ula' ? 'selected' : '' }}>4 ULA</option>
                <option value="1 wustho" {{ $data->diniyah == '1 wustho' ? 'selected' : '' }}>1 WUSTHO</option>
                <option value="2 wustho" {{ $data->diniyah == '2 wustho' ? 'selected' : '' }}>2 WUSTHO</option>
                <option value="1 ulya" {{ $data->diniyah == '1 ulya' ? 'selected' : '' }}>1 ULYA</option>
                <option value="2 ulya" {{ $data->diniyah == '2 ulya' ? 'selected' : '' }}>2 ULYA</option>
            </select>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email" value="{{ $data->email }}"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="email"
                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email*</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label for="alamat" class="block mb-2 text-sm font-normal text-gray-500">Alamat</label>
            <textarea id="alamat" rows="4" name="alamat"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Isi Alamat">{{ $data->alamat }}</textarea>

        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="nama_ayah" id="nama_ayah" value="{{ $data->ayah }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="nama_ayah"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                    Ayah</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="tlp_ayah" id="tlp_ayah" value="{{ $data->no_ayah }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="tlp_ayah"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No.
                    Telp Ayah</label>
            </div>
        </div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="nama_ibu" id="nama_ibu" value="{{ $data->ibu }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="nama_ibu"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                    Ibu</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="tlp_ibu" id="tlp_ibu" value="{{ $data->no_ibu }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="tlp_ibu"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">No.
                    Telp Ibu</label>
            </div>
        </div>




        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
    <div class="text-xs text-gray-500 mt-10">
        <ul>
            <li>*opsional</li>
        </ul>

    </div>
@endsection
