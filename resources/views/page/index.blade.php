@extends('layout.home')

@section('content')
    <div class="container mx-auto mt-5 px-2 -z-10">
        {{-- Berita --}}
        <div class="w-full px-4 lg:px-6 bg-white pb-0">
            <div class="w-full max-w-7xl mx-auto">
                <div class="relative grid md:grid-cols-3 gap-2 pt-4">
                    @foreach ($berita as $item)
                        <div class="relative overflow-hidden last:ptablet:hidden">
                            <div class="relative">
                                <img alt="How ux transformed the face of the web from 2015 to 2022 featured image"
                                    class="block w-full h-[420px] object-cover" width="1200" height="800"
                                    src="{{ $item->image_url }}">
                            </div>
                            <div class="absolute bottom-0 left-0 w-full h-2/3 z-10 bg-gradient-to-t from-muted-1000"></div>
                            <div class="absolute top-0 left-0 w-full h-full z-20 flex flex-col justify-end">
                                <div class="p-6 bg-gradient-to-b from-white/5 to-slate-900 ">
                                    <div class="flex items-center gap-2 mb-1 mt-4 text-white">
                                        <svg viewBox="0 0 256 256" class="w-4 h-4" astro-icon="ph:calendar-blank-duotone">
                                            <path fill="currentColor" d="M40 88h176V48a8 8 0 0 0-8-8H48a8 8 0 0 0-8 8z"
                                                opacity=".2"></path>
                                            <path fill="currentColor"
                                                d="M208 32h-24v-8a8 8 0 0 0-16 0v8H88v-8a8 8 0 0 0-16 0v8H48a16 16 0 0 0-16 16v160a16 16 0 0 0 16 16h160a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM72 48v8a8 8 0 0 0 16 0v-8h80v8a8 8 0 0 0 16 0v-8h24v32H48V48zm136 160H48V96h160v112z">
                                            </path>
                                        </svg>
                                        <p class="font-sans text-xs">
                                            2023-01-10
                                        </p>
                                    </div>
                                    <h3 class="font-sans font-semibold text-2xl ptablet:text-xl mb-2">
                                        <a href="/warta/{{ $item->id }}"
                                            class="text-white hover:text-primary-300 transition-colors duration-300">
                                            {{ $item->title }}
                                        </a>
                                    </h3>
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <span class="flex items-center gap-2">
                                                <div
                                                    class="h-9 w-9 flex items-center justify-center shrink-0 rounded-full bg-white ">
                                                    <img src="https://i.pinimg.com/236x/8e/0c/fa/8e0cfaf58709f7e626973f0b00d033d0.jpg"
                                                        alt="Clark Smith"
                                                        class="h-9 w-9 rounded-full object-cover scale-90">
                                                </div>
                                                <div>
                                                    <h4 class="font-sans text-sm">
                                                        <div
                                                            class="text-white hover:text-primary-300 transition-colors duration-300">
                                                            Admin
                                                        </div>
                                                    </h4>
                                                </div>
                                            </span>
                                        </div>
                                        <div class="font-sans text-sm text-white">
                                            <span class="pr-2">—</span>
                                            <span>Berita</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>



        {{-- End Of Berita --}}
        {{-- Visi & Misi --}}
        <div class="px-6 my-16">
            <div class="my-20">
                <h1 class="text-center text-4xl font-semibold md:text-5xl">Visi & Misi Yayasan</h1>
                <p class="text-center text-base text-gray-500 my-7">Visi dan misi adalah dua elemen penting dalam
                    perencanaan
                    strategis organisasi,
                    termasuk yayasan atau
                    pesantren.</p>
            </div>
            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <h3 class="font-sans font-semibold text-4xl text-gray-600 mb-4 tracking-wide max-sm:text-center">
                        Visi
                    </h3>
                    <p class="text-sm leading-relaxed text-gray-500 text-justify">
                        Visi adalah gambaran jangka panjang tentang tujuan utama yang ingin dicapai oleh organisasi. Visi
                        memberikan arah dan inspirasi bagi organisasi, serta menjadi panduan dalam pengambilan keputusan dan
                        perencanaan strategis.
                    </p>
                </div>
                <hr class="md:hidden">
                <div class="p-3 ">
                    <p class="font-semibold text-xl max-sm:text-center text-gray-600 mb-5">
                        Terwujudnya santri yang bertaqwa, Kuat & Mandiri.
                    </p>
                    <ul class="list-decimal p-3 ml-3 text-justify text-sm text-gray-500">
                        <li>
                            <h4 class="font-semibold text-blue-700 mb-2 bg-blue-100 p-2 md:inline-block rounded">Bertaqwa:
                            </h4>
                            <p>
                                Visi ini menunjukkan bahwa yayasan atau pesantren memiliki tujuan untuk membentuk
                                santri yang memiliki keberagamaan yang kuat. Santri diharapkan memiliki pemahaman yang baik
                                tentang ajaran agama dan mampu mengamalkannya dalam kehidupan sehari-hari. Mereka diharapkan
                                menjadi individu yang memiliki kesadaran spiritual yang tinggi dan berkomitmen untuk
                                menjalankan
                                ajaran agama dengan baik.
                            </p>
                        </li>
                        <li>
                            <h4 class="font-semibold text-blue-700 my-2 bg-blue-100 p-2 md:inline-block rounded">Kuat:</h4>
                            <p>
                                Visi ini menggambarkan bahwa yayasan atau pesantren ingin melahirkan santri yang kuat,
                                baik secara fisik maupun mental. Santri diharapkan memiliki kesehatan fisik yang baik dan
                                mampu
                                menjaga kebugaran tubuh. Selain itu, mereka juga diharapkan memiliki kekuatan mental yang
                                tangguh, mampu menghadapi tantangan, dan tidak mudah putus asa dalam menghadapi
                                permasalahan.
                            </p>
                        </li>
                        <li>
                            <h4 class="font-semibold text-blue-700 my-2 bg-blue-100 p-2 md:inline-block rounded">Mandiri:
                            </h4>
                            <p>
                                Visi ini menunjukkan bahwa yayasan atau pesantren ingin menghasilkan santri yang
                                mandiri. Santri diharapkan memiliki kemampuan untuk mengambil keputusan secara bijaksana,
                                mengelola waktu dengan baik, dan memiliki kemandirian dalam menjalankan kegiatan
                                sehari-hari.
                                Mereka diharapkan dapat mengembangkan potensi diri, memiliki keterampilan yang relevan, dan
                                siap
                                untuk menghadapi tantangan kehidupan di masa depan.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="grid gap-5 md:grid-cols-2 mt-7">
                <div>
                    <h3 class="font-sans font-semibold text-4xl text-gray-600 mb-4 tracking-wide">
                        Misi
                    </h3>
                    <p class="text-sm leading-relaxed text-gray-500 text-justify">
                        Misi adalah pernyataan yang menjelaskan tujuan inti organisasi, alasan eksistensinya, dan cara
                        organisasi mencapai visinya. Misi menggambarkan apa yang ingin dicapai organisasi dalam jangka
                        pendek dan bagaimana organisasi akan mencapainya melalui berbagai kegiatan dan program.
                    </p>
                </div>
                <hr class="md:hidden">
                <div class="p-3 ">
                    <p class="font-semibold text-xl max-sm:text-center text-gray-600 mb-5">
                        Misi YPP Darussalam Blokagung 2
                    </p>
                    <ul class="list-decimal p-3 ml-3 text-justify text-sm text-gray-500">
                        <li>
                            <h4 class="font-semibold text-blue-700 mb-2 bg-blue-100 p-2 md:inline-block rounded">Memberikan
                                bekal <strong>Agama</strong> kuat.</h4>
                        </li>
                        <li>
                            <h4 class="font-semibold text-blue-700 mb-2 bg-blue-100 p-2 md:inline-block rounded">
                                Meningkatkan
                                Kualitas sumber daya menusia seutuhnya.</h4>
                        </li>
                        <li>
                            <h4 class="font-semibold text-blue-700 mb-2 bg-blue-100 p-2 md:inline-block rounded">Mencetak
                                generasi muda yang berkualitas dalam agama dan pengetahuan umum.</h4>
                        </li>
                        <li>
                            <h4 class="font-semibold text-blue-700 mb-2 bg-blue-100 p-2 md:inline-block rounded">Memberi
                                bekal
                                dengan keterampilan, keagamaan, sosial, dan teknologi.</h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        {{-- end Visi & Misi --}}

        {{-- Contact --}}

        <div class="max-w-7xl px-6 my-16 mx-auto relative flex flex-col md:flex-row items-center justify-between gap-y-4">
            <div class="max-w-lg text-accentDark md:max-w-xl space-y-2">
                <h2 class="font-sans font-medium text-3xl text-gray-700 ">
                    Hubungi Kami
                </h2>
                <p class="font-sans text-gray-500">
                    Dapatkan informasi mengenail Pendaftaran, serta kontak dan alamat kami
                </p>
            </div>
            <div class="w-full md:w-auto flex justify-start md:justify-end gap-4">
                <a href="/pendaftaran"
                    class="h-10 flex items-center justify-center font-sans text-sm px-6 text-gray-600 hover:text-primary-500 rounded-full border border-gray-200 hover:border-primary-500 bg-white transition-colors duration-300">
                    Pendaftaran</a>
                <a href="/kontak"
                    class="h-10 flex items-center justify-center font-sans text-sm px-6 text-gray-600 hover:text-primary-500 rounded-full border border-gray-200 hover:border-primary-500 bg-white transition-colors duration-300">
                    Kontak
                </a>

            </div>
        </div>
        {{-- End Contact --}}








    </div>
@endsection
