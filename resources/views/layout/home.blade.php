<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>Home - Pondok Pesantren Darussalam Blokagung 2</title> --}}
    {!! seo($seo ?? null) !!}

    {{-- Css & Js --}}
    <meta name="description" content="Pondok Pesantren Darussalam Blokagung 2 adalah lembaga pendidikan Islam yang berfokus pada pengembangan ilmu agama dan keterampilan untuk mencetak generasi muda yang berakhlak mulia, berpengetahuan luas, dan siap berkontribusi dalam masyarakat. Dengan fasilitas yang lengkap dan pengajaran yang mengintegrasikan kurikulum agama dan umum, pondok pesantren ini bertujuan untuk menciptakan santri yang tangguh dalam menghadapi tantangan kehidupan di era modern.">
    <meta name="keywords" content="Pondok pesantren, darussalam, darussalam blokagung, blokagung, darussalam blokagung 2, pondok pesantren dibanyuwangi, pondok pesantren di jawa timur">
    
    <x-head />
    <meta name="google-site-verification" content="i_Ys03MP2YwO3Mbtvb0AL_5ARnPoHV_8xnVda22ep0k" />
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    {{-- Icon IonIcons --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    {{-- Alpine JS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    
    {{-- Axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js"
        integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @stack('scriptHead')
</head>

<body class="min-h-screen bg-white font-sans text-apple-text antialiased">
    {{-- Apple-style Navbar --}}
    <x-layout.apple-navbar />

    {{-- Main Content (full-bleed) --}}
    <main>
        @yield('content')
    </main>

    {{-- Apple-style Footer --}}
    <x-layout.apple-footer />

    {{-- Scroll Reveal Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const revealElements = document.querySelectorAll('.reveal');
            
            if (!revealElements.length) return;
            
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                });
                
                revealElements.forEach(el => observer.observe(el));
            } else {
                // Fallback
                revealElements.forEach(el => el.classList.add('visible'));
            }
        });
    </script>

    @stack('scriptBody')
</body>
</html>
