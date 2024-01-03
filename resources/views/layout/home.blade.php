<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home - Pondok Pesantren Darussalam Blokagung 2</title>

    {{-- Css & Js --}}
    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="/build/assets/app-3d0cb7e8.css"> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    {{-- Icon IonIcons --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    {{-- Alpine JS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    {{-- Axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Font Google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Petrona:ital,wght@0,100;0,200;0,500;0,600;0,700;0,800;0,900;1,300&display=swap"
        rel="stylesheet">

</head>

<body>
    {{-- Navbar --}}
    <x-layout.navbar />
    {{-- Main Content --}}
    <div id="main-content">
        @yield('content')
    </div>
    <x-layout.footer />
    <script>
        const csrfToken = document.cookie.match(/XSRF-TOKEN=([^;]+)/)[1];
        const navbar = {
            open: false,
            search: false,
            input: '',
            news: [],
            notFound: false,
            loadingSearchMobile: false,
            searchDesktop: false,
            url: '',
            handleSubmit() {
                this.news = []
                this.notFound = false
                if (this.input == '') return
                this.loadingSearchMobile = true
                let search = encodeURIComponent(this.input)
                this.url = search
                axios.get(`/api/v1/search?q=${search}&mode=json`, {
                        search
                    }, {
                        'X-CSRF-TOKEN': csrfToken
                    })
                    .then((r) => {
                        this.loadingSearchMobile = false
                        this.news = r.data.data
                        if (this.news.length == 0) {
                            this.notFound = true
                        }
                    })
            }
        }
    </script>
</body>

</html>
