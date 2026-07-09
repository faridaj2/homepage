@extends('layout.home')
@section('content')
    <section class="bg-[#f5f5f7] pt-24 md:pt-28">
        <div class="mx-auto max-w-7xl px-5 pb-8 pt-12 lg:px-8">
            <div class="reveal">
                <div class="mb-4 flex items-center gap-2 text-sm text-apple-text-secondary">
                    <a href="/" class="transition-colors duration-300 hover:text-emerald-600">Beranda</a>
                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                    </svg>
                    <span>Kebijakan Privasi</span>
                </div>
                <h1 class="font-serif text-3xl font-bold tracking-tight text-apple-text md:text-4xl">Kebijakan & Persyaratan Layanan</h1>
            </div>
        </div>
    </section>

    <section class="bg-white py-12 md:py-16">
        <div class="mx-auto max-w-3xl px-5 lg:px-8">
            <article class="reveal prose prose-lg max-w-none font-Inter
                prose-headings:font-serif prose-headings:text-apple-text prose-headings:tracking-tight
                prose-a:text-emerald-600 prose-a:no-underline hover:prose-a:text-emerald-700
                prose-strong:text-apple-text
                prose-li:marker:text-emerald-600
                prose-ol:ml-0 prose-ol:space-y-6
                prose-ul:ml-0">
                <h4>Kebijakan Layanan:</h4>
                <ol>
                    <li>
                        Penggunaan Layanan
                        <ul>
                            <li>Penggunaan layanan ini tunduk pada persetujuan dan pemahaman pengguna terhadap kebijakan layanan ini.</li>
                            <li>Penggunaan layanan ini hanya diperuntukkan bagi pengguna yang berusia 18 tahun ke atas.</li>
                            <li>Pengguna bertanggung jawab penuh atas segala aktivitas yang terjadi dalam akun mereka.</li>
                        </ul>
                    </li>
                    <li>
                        Konten Pengguna
                        <ul>
                            <li>Pengguna bertanggung jawab sepenuhnya atas konten yang mereka unggah atau bagikan melalui layanan ini.</li>
                            <li>Konten yang melanggar hukum, melanggar hak kekayaan intelektual, atau melanggar privasi orang lain tidak diizinkan.</li>
                            <li>Pondok berhak menghapus konten yang melanggar kebijakan ini tanpa pemberitahuan sebelumnya.</li>
                            <li>Pondok menghormati privasi pengguna dan akan melindungi informasi pribadi mereka sesuai dengan kebijakan privasi yang berlaku.</li>
                            <li>Informasi pribadi pengguna hanya akan digunakan untuk keperluan yang relevan dengan layanan ini.</li>
                        </ul>
                    </li>
                    <li>
                        Pembayaran
                        <ul>
                            <li>Jika ada layanan berbayar yang ditawarkan, pengguna harus membayar dengan metode pembayaran yang ditentukan.</li>
                            <li>Pondok tidak bertanggung jawab atas segala keterlambatan atau kegagalan pembayaran yang disebabkan oleh pihak ketiga.</li>
                        </ul>
                    </li>
                </ol>

                <h4>Persyaratan Layanan:</h4>
                <ol>
                    <li>
                        Perubahan Layanan
                        <ul>
                            <li>Pondok berhak untuk mengubah atau menghentikan layanan ini tanpa pemberitahuan sebelumnya.</li>
                            <li>Pondok tidak bertanggung jawab atas kerugian atau kerusakan yang disebabkan oleh perubahan atau penghentian layanan ini.</li>
                        </ul>
                    </li>
                    <li>
                        Keterbatasan Tanggung Jawab
                        <ul>
                            <li>Pondok tidak bertanggung jawab atas kerugian atau kerusakan yang disebabkan oleh penggunaan atau ketidakmampuan menggunakan layanan ini.</li>
                            <li>Pondok tidak memberikan jaminan atas keakuratan, keandalan, atau ketersediaan layanan ini.</li>
                        </ul>
                    </li>
                    <li>
                        Hak Cipta
                        <ul>
                            <li>Seluruh konten dalam layanan ini, termasuk teks, gambar, dan desain, merupakan milik Pondok atau pemilik hak cipta yang sah.</li>
                            <li>Pengguna tidak diperbolehkan untuk menggunakan, mendistribusikan, atau mengubah konten dalam layanan ini tanpa izin tertulis dari Pondok.</li>
                        </ul>
                    </li>
                </ol>
            </article>
        </div>
    </section>
@endsection
