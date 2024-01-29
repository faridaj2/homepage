<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home - Pondok Pesantren Darussalam Blokagung 2</title>

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

    {{-- Font Google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Petrona:ital,wght@0,100;0,200;0,500;0,600;0,700;0,800;0,900;1,300&display=swap"
        rel="stylesheet">
    @stack('headScript')

</head>

<body class="bg-background">
    {{-- Navbar --}}
    <div class="flex" x-data="{ open: window.innerWidth >= 768 ? true : false }" x-init="() => {
        window.addEventListener('resize', () => {
            open = window.innerWidth >= 768 ? true : false;
        });
    }">
        <div x-show="open" class="min-h-screen w-full max-w-xs md:p-5 ">
            <x-dashboard.navbar />
        </div>
        <div class="w-full md:pr-5 " :class="open || 'md:pl-5'">
            <div
                class="bg-base min-w-full shrink md:my-5 flex items-center justify-between rounded-lg hover:shadow-costum1">
                <div class="p-3 font-bold">Admin Page</div>
                <ion-icon name="menu" class="z-0 text-3xl p-3 cursor-pointer text-black"
                    @click="open=!open"></ion-icon>
            </div>
            <div id="main-content">
                @yield('content')
            </div>
        </div>
    </div>
    {{-- Main Content --}}

</body>

</html>
