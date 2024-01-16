@extends('layout.dashboard')
@section('content')
    <section class="bg-white ">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl">
                    Personalisasikan Tampilan Website</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">Mengatur
                    website adalah suatu kegiatan yang membutuhkan ketelitian dan keahlian dalam menyusun konten, merancang
                    tata letak, dan memastikan fungsionalitas yang optimal. Dengan mengatur website dengan baik, kita dapat
                    menciptakan pengalaman pengguna yang menyenangkan dan memudahkan pengunjung dalam menemukan informasi
                    yang mereka butuhkan. Selain itu, mengatur website juga melibatkan pemeliharaan rutin, pembaruan konten,
                    dan analisis data untuk terus meningkatkan performa dan efektivitas website. Dengan mengatur website
                    dengan baik, kita dapat memperkuat kehadiran online kita dan mencapai tujuan yang diinginkan.</p>
                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    <a href="https://www.instagram.com/g.art04"
                        class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 ">
                        <ion-icon name="logo-instagram" class="px-2"></ion-icon>
                        Website ini di buat oleh Farid @g.art04
                    </a>

                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="https://themewagon.github.io/landwind/images/hero.png" alt="hero image">
            </div>
        </div>
    </section>
    <section class="bg-gray-50 ">
        <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">
            <figure class="max-w-screen-md mx-auto">
                <svg class="h-12 mx-auto mb-3 text-gray-400 " viewBox="0 0 24 27" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                        fill="currentColor"></path>
                </svg>
                <blockquote>
                    <p class="text-xl font-medium text-gray-900 md:text-2xl ">"Kalau kamu bukan anak raja dan
                        engkau bukan anak ulama besar, maka jadilah penulis”. maka dari itu saya menulis disini dalam bentuk
                        kode kode yang diubah menjadi sebuah platform</p>
                </blockquote>
                <figcaption class="flex items-center justify-center mt-6 space-x-3">
                    <img class="w-6 h-6 rounded-full"
                        src="https://lh3.googleusercontent.com/a/ACg8ocKNHfAaDj947wIcmmotBAki_-XmK5XI5h9AnF60BTTCqA=s288-c-no"
                        alt="profile picture">
                    <div class="flex items-center divide-x-2 divide-gray-500 ">
                        <div class="pr-3 font-medium text-gray-900 ">Achmad Farid Anjali</div>
                        <div class="pl-3 text-sm font-light text-gray-500 ">Fullstack Developer</div>
                    </div>
                </figcaption>
            </figure>
        </div>
    </section>
    <!-- component -->
    <div class="flex items-center h-screen w-full justify-center">

        <div class="max-w-xs">
            <div class="bg-white shadow-xl rounded-lg py-3">
                <div class="photo-wrapper p-2">
                    <img class="w-32 h-32 rounded-full mx-auto"
                        src="https://lh3.googleusercontent.com/a/ACg8ocKNHfAaDj947wIcmmotBAki_-XmK5XI5h9AnF60BTTCqA=s288-c-no"
                        alt="Farid Anjali">
                </div>
                <div class="p-2">
                    <h3 class="text-center text-xl text-gray-900 font-medium leading-8">Achmad Farid Anjali</h3>
                    <div class="text-center text-gray-400 text-xs font-semibold">
                        <p>Web Developer | Fullstack</p>
                    </div>
                    <table class="text-xs my-3">
                        <tbody>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Alamat</td>
                                <td class="px-2 py-2">Waeleman, Maluku, Indonesia</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Tel</td>
                                <td class="px-2 py-2">+85156027913</td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                                <td class="px-2 py-2">ajfarid6@gmail.com</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center my-3">
                        <a class="text-xs text-indigo-500 italic hover:underline hover:text-indigo-600 font-medium"
                            href="https://www.instagram.com/g.art04">View Profile</a>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
