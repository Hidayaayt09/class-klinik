<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laa Tachzan</title>
    <link rel="icon" href="/assets/images/icons/logo-new." type="image/x-icon"/>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- slick -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <!-- normalize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- main styles -->
    <link rel="stylesheet" href="assets/styles/style.css">  
</head>
<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
  intent="WELCOME"
  chat-title="Laa Tachzan Chatbot"
  agent-id="dc79d548-dc80-4eb0-8f07-b4f30a62260c"
  language-code="id"
></df-messenger>
<body>
<div class="page">
    <header class="page-header">
        <div class="page-header__container container">
            <a class="page-header__logo2">
            <img class="services__icon" src="./assets/images/icons/logo-new.ico">
            </a>
            <a class="page-header__logo" href="#top">
                Laa Tachzan
            </a>
            <nav class="page-header__navigation navbar" id="navigation">
                <ul class="navbar__list">
                    <li class="navbar__item">
                        <a class="navbar__link" href="#home">Home</a>
                    </li> 
                    <li class="navbar__item">
                        <a class="navbar__link" href="#services">Layanan</a>
                    </li>
                    <li class="navbar__item">
                        <a class="navbar__link" href="#kategori">Kategori Gejala</a>
                    </li>
                    <li class="navbar__item">
                        <a class="navbar__link" href="#contact">Maps</a>
                    </li>
                    <li class="navbar__item">
                        <a class="navbar__link" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
                </nav>
                <button class="page-header__toggle-btn btn-reset" id="toggleMenu">
                    <span class="page-header__toggle--element"></span>
                </button>
        </div>
    </header>
    <section class="hero" id="home">
        <div class="hero__container container" >
           <strong h2 class="hero__title">
                Klinik <br>
                Laa Tachzan<br>
            </strong h2>
            <strong class="hero__subtitle">
                Klinik Laa Tachzan melayani jasa <br>
                konsultasi kebutuhan khusus.
            </strong>
                <a class="hero__btn btn--get-started" href="{{ route('register') }}">Daftar</a>
        </div>
    </section>
    
        <section class="services" id="services">
            <h2 class="hero__title2">
               Layanan
            </h2>
            <div class="services__container container">
                <ul class="services__list">
                    <li class="services__item">
                        <img class="services__icon" src="./assets/images/icons/phone_icon.png" alt="Pills icon">
                        <h3 class="services__subtitle">
                            Konsultasi Online
                        </h3>
                        <p class="services__text">
                            Melayani Konsultasi online dengan
                            dokter yang profesional 
                        </p>
                    </li>
                    <li class="services__item">
                        <img class="services__icon" src="./assets/images/icons/briefcase_icon.png" alt="Doctor icon">
                        <h3 class="services__subtitle">
                            Layanan Kesehatan
                        </h3>
                        <p class="services__text">
                            Menangani layanan kesehatan
                            tentang Kebutuhan Khusus
                        </p>
                    </li>
                    <li class="services__item">
                        <img class="services__icon" src="./assets/images/icons/heart_icon.png" alt="Heart icon">
                        <h3 class="services__subtitle">
                            Chatbot
                        </h3>
                        <p class="services__text">
                            Untuk memberikan pengetahuan 
                            gejala penyakit dari pasien 
                        </p>
                    </li>
                    
                </ul>
            </div>
        </section>
        <section class="kategori" id="kategori">
            <h2 class="hero__title2">
                Kategori Gejala
            </h2>
            <div class="services__container container">
                <div class="service__list">
                    @foreach ($data_kategori as $kategori)
                    <article class="services__text">
                        <img src="{{ url('admin-tem/img/kategori/'.$kategori->foto) }}" width="40%" alt="Image">
                        <div class="media-body tm-media-body-1 tm-media-body-v-center">
                            <h3 class="tm-font-semibold tm-article-title-3">{{ $kategori->nama }}</h3>
                            <p>{{ $kategori->deskripsi }}</p>
                            {{-- <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a> --}}
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
       </section>
        <section class="contact-us" id="contact">
            <div class="contact-us__container container">
                <h3 class="hero__title2">
                    Maps
                </h3>
                <div class="tm-section tm-section-pad tm-bg-img tm-position-relative" id="tm-section-6">
                    <div class="container ie-h-align-center-fix">
                        <div class="row">
                            <div class="hero__title2">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.0191379001926!2d108.34657691470292!3d-6.519260595284423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ec3484f3c6a4b%3A0xca4e90a8d18c870f!2sKlinik%20Laa-Tachzan!5e0!3m2!1sen!2sid!4v1622654322704!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <h5 class="hero__title3">
            Copyright © 2022 Klinik Laa Tachzan
        </h5>
    </footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>

<script>
$(document).ready(function () {
    // toggle menu ------
    const $toggleBtn = $('#toggleMenu');
    const $navbar = $('#navigation');
    const $navbarOpen = 'navbar--open';
    const $navbarItem = $('.navbar__item');

    $toggleBtn.on('click', function (e) {
        $navbar.toggleClass($navbarOpen);
        e.preventDefault();
    });
    $($navbarItem).on('click', () => $navbar.removeClass($navbarOpen));
    // end toggle menu ------

    // slick slider ------
    const $slickWrapper = $('.testimonials__list');
    $($slickWrapper).slick({
        dots: true
    });
    // end slick slider ------
});

</script>

{{-- <style>
    df-messenger {
     --df-messenger-button-titlebar-color: white;
    }
</style> --}}

{{-- <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
    intent="WELCOME"
    chat-title="Laa Tachzan"
    agent-id="8e776b09-416f-4fe8-a951-2ae5c8e84a66"
    language-code="id"
    chat-icon="{{ asset('admin-tem/img/logo-new.ico') }}">
</df-messenger> --}}

{{-- <script>
    var botmanWidget = {
        title: 'Laa Tachzan',
        aboutText: 'Tulis kata apapun',
        displayMessageTime: 'true',
        mainColor: '#E89928',
        bubbleBackground: '#E89928',
        placeholderText: "Kirim pesan...",
        frameEndpoint: '/botman/chat',
        // Logo chatbot
        // bubbleAvatarUrl: "{{ url('pasien/img/white.jpg') }}",
        // headerTextColor: '#fff',
        introMessage: "✋ Halo, Selamat Datang di Klinik Laa Tachzan!"
    };
</script> --}}

{{-- <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> --}}

</html>
