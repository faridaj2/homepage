<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>Home - Pondok Pesantren Darussalam Blokagung 2</title> --}}
    {!! seo($berital) ? seo($berita) : seo() !!}

    {{-- Css & Js --}}

    <x-head />

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
    @stack('scriptHead')


</head>

<body>
    {{-- Navbar --}}
    <x-layout.navbar />
    {{-- Main Content --}}
    <div id="main-content" class="max-w-7xl mx-auto">
        @yield('content')
    </div>
    <x-layout.footer />
    <script>
        const menus = document.querySelectorAll('.menu-parent')
        const childMenu = document.querySelectorAll('.child-menu')


        menus.forEach(menu => {
            menu.addEventListener('click', function(e) {
                menus.forEach(menu => menu.classList.remove('open'))
                menu.classList.add('open');
            })
        });
        childMenu.forEach(menu => {
            menu.addEventListener('click', function(e) {
                childMenu.forEach(menu => menu.classList.remove('open'))
                menu.classList.add('open');
            })
        });

        window.addEventListener('click', function(e) {
            const openMenu = document.querySelectorAll('.open')
            const isMenuClick = Array.from(menus).some(menu => menu.contains(e.target));
            const isOpenClick = Array.from(openMenu).some(menu => menu.contains(e.target));
            if (!isMenuClick) {
                menus.forEach(menu => menu.classList.remove('open'));
                childMenu.forEach(menu => menu.classList.remove('open'));
            }
            if (isOpenClick) {

            }
        })
    </script>
    @stack('scriptBody')
</body>

</html>
