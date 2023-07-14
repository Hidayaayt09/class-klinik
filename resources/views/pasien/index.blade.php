<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klinik Laa Tachzan</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">  <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{ asset('pasien/font-awesome-4.7.0/css/font-awesome.min.css') }}">                <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('pasien/css/bootstrap.min.css') }}">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('pasien/slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('pasien/slick/slick-theme.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('pasien/css/datepicker.css') }}"/>
    <link rel="stylesheet" href="{{ asset('pasien/css/tooplate-style.css') }}">                                  <!-- Templatemo style -->

    <style>
        df-messenger {
            --df-messenger-button-titlebar-color: #E89928;
        }
    </style>


</head>
<body>
    <div class="tm-main-content" id="top">
        <div class="tm-top-bar-bg"></div>
        <div class="tm-top-bar" id="tm-top-bar">
            <!-- Top Navbar -->
            <div class="container">
                <div class="row">

                    <nav class="navbar navbar-expand-lg narbar-light">
                        <a class="navbar-brand mr-auto" href="#">
                            <img src="{{ url('pasien/img/logo.png') }}" alt="Site logo">
                            Laa Tachzan
                        </a>
                        <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                <a class="nav-link" href="#top">Home <span class="sr-only">(current)</span></a>
                                </li>
                                {{-- <li class="nav-item">
                                <a class="nav-link" href="#tm-section-4">Portfolio</a>
                                </li> --}}
                                <li class="nav-item">
                                <a class="nav-link" href="#tm-section-5">Klinik Konseling</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#tm-section-6">Kontak</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="tm-section tm-bg-img" id="tm-section-1">
            <div class="tm-bg-white ie-container-width-fix-2">
                <div class="container ie-h-align-center-fix">
                    <div class="row">
                        <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tm-section-2">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2 class="tm-section-title">Layanan Kesehatan Online</h2>
                        <p class="tm-color-white tm-section-subtitle">Klinik Laa Tachzan melayani jasa konsultasi.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="tm-section tm-position-relative">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" class="tm-section-down-arrow">
                <polygon fill="#FFBD42" points="0,0  100,0  50,60"></polygon>
            </svg>
            <div class="container tm-pt-5 tm-pb-4">
                <div class="row text-center">
                    <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                        <i class="fa tm-fa-6x fa-legal tm-color-primary tm-margin-b-20"></i>
                        <h3 class="tm-color-primary tm-article-title-1">pasien HTML Template by Tooplate website</h3>
                        <p>You are allowed to download, edit and use this template for your business or client websites.</p>
                        <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                    </article>
                    <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                        <i class="fa tm-fa-6x fa-plane tm-color-primary tm-margin-b-20"></i>
                        <h3 class="tm-color-primary tm-article-title-1">Original Website Template Producer</h3>
                        <p>You are NOT allowed to re-distribute the downloadable template ZIP file on any website.</p>
                        <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                    </article>
                    <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                        <i class="fa tm-fa-6x fa-life-saver tm-color-primary tm-margin-b-20"></i>
                        <h3 class="tm-color-primary tm-article-title-1">Contact us if you have any question</h3>
                        <p>If you see this template being distributed on any other site, that is an illegal copy.</p>
                        <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                    </article>
                </div>
            </div>
        </div>

        <div class="tm-bg-video">
            <div class="overlay">
                <i class="fa fa-5x fa-play-circle tm-btn-play"></i>
                <i class="fa fa-5x fa-pause-circle tm-btn-pause"></i>
            </div>
            <video controls="" loop="" class="tmVideo">
                <source src="{{ url('pasien/videos/video.mp4') }}" type="video/mp4">
                <source src="{{ url('pasien/videos/video.ogg') }}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            <div class="tm-section tm-section-pad tm-bg-img" id="tm-section-5">
                <div class="container ie-h-align-center-fix">
                    <div class="row tm-flex-align-center">
                        <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 tm-media-title-container">
                            <h2 class="text-uppercase tm-section-title-2">Klinik</h2>
                            <h3 class="tm-color-primary tm-font-semibold tm-section-subtitle-2">Konseling</h3>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-9 col-xl-9 mt-0 mt-sm-3">
                            <div class="ml-auto tm-bg-white-shadow tm-pad tm-media-container">
                                @foreach ($data_kategori as $kategori)
                                <article class="media tm-margin-b-20 tm-media-1">
                                    <img src="{{ url('admin-tem/img/konseling/'.$kategori->foto) }}" width="40%" alt="Image">
                                    <div class="media-body tm-media-body-1 tm-media-body-v-center">
                                        <h3 class="tm-font-semibold tm-article-title-3">{{ $kategori->nama }}</h3>
                                        <p>{{ $kategori->deskripsi }}</p>
                                        {{-- <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a> --}}
                                    </div>
                                </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tm-section tm-section-pad tm-bg-img tm-position-relative" id="tm-section-6">
            <div class="container ie-h-align-center-fix">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7">
                        {{-- <div id="google-map"></div> --}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.0191379001926!2d108.34657691470292!3d-6.519260595284423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ec3484f3c6a4b%3A0xca4e90a8d18c870f!2sKlinik%20Laa-Tachzan!5e0!3m2!1sen!2sid!4v1622654322704!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 mt-3 mt-md-0">
                        <div class="tm-bg-white tm-p-4">
                            {{-- <form action="index.html" method="post" class="contact-form">
                                <div class="form-group">
                                    <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Name"  required/>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email"  required/>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="contact_subject" name="contact_subject" class="form-control" placeholder="Subject"  required/>
                                </div>
                                <div class="form-group">
                                    <textarea id="contact_message" name="contact_message" class="form-control" rows="9" placeholder="Message" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary tm-btn-primary">Send Message Now</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="tm-bg-dark-blue">
            <div class="container">
                <div class="row">
                    <p class="col-sm-12 text-center tm-font-light tm-color-white p-4 tm-margin-b-0">
                    Copyright &copy; <span class="tm-current-year">2021</span> Klinik Laa Tachzan

                    - Design: <a rel="nofollow" href="https://www.tooplate.com" class="tm-color-primary tm-font-normal" target="_parent">Tooplate</a></p>
                </div>
            </div>
        </footer>
    </div>

    <!-- load JS files -->
    <script src="{{ asset('pasien/js/jquery-1.11.3.min.js') }}"></script>             <!-- jQuery (https://jquery.com/download/) -->
    <script src="{{ asset('pasien/js/popper.min.js') }}"></script>                    <!-- https://popper.js.org/ -->
    <script src="{{ asset('pasien/js/bootstrap.min.js') }}"></script>                 <!-- https://getbootstrap.com/ -->
    <script src="{{ asset('pasien/js/datepicker.min.js') }}"></script>                <!-- https://github.com/qodesmith/datepicker -->
    <script src="{{ asset('pasien/js/jquery.singlePageNav.min.js') }}"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
    <script src="{{ asset('pasien/slick/slick.min.js') }}"></script>                  <!-- http://kenwheeler.github.io/slick/ -->
    <script>

        /* Google map
        ------------------------------------------------*/
        var map = '';
        var center;

        function initialize() {
            var mapOptions = {
                zoom: 13,
                center: new google.maps.LatLng(-23.013104,-43.394365),
                // center: new google.maps.LatLng(-6.5190367465647245, 108.34879778370832),
                scrollwheel: false
            };

            map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

            google.maps.event.addDomListener(map, 'idle', function() {
                calculateCenter();
            });

            google.maps.event.addDomListener(window, 'resize', function() {
                map.setCenter(center);
            });
        }

        function calculateCenter() {
            center = map.getCenter();
        }

        function loadGoogleMap(){
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&' + 'callback=initialize';
            document.body.appendChild(script);
        }

        function setCarousel() {

            if ($('.tm-article-carousel').hasClass('slick-initialized')) {
                $('.tm-article-carousel').slick('destroy');
            }

            if($(window).width() < 438){
                // Slick carousel
                $('.tm-article-carousel').slick({
                    infinite: false,
                    dots: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            }
            else {
                $('.tm-article-carousel').slick({
                    infinite: false,
                    dots: true,
                    slidesToShow: 2,
                    slidesToScroll: 1
                });
            }
        }

        function setPageNav(){
            if($(window).width() > 991) {
                $('#tm-top-bar').singlePageNav({
                    currentClass:'active',
                    offset: 79
                });
            }
            else {
                $('#tm-top-bar').singlePageNav({
                    currentClass:'active',
                    offset: 65
                });
            }
        }

        function togglePlayPause() {
            vid = $('.tmVideo').get(0);

            if(vid.paused) {
                vid.play();
                $('.tm-btn-play').hide();
                $('.tm-btn-pause').show();
            }
            else {
                vid.pause();
                $('.tm-btn-play').show();
                $('.tm-btn-pause').hide();
            }
        }

        $(document).ready(function(){

            $(window).on("scroll", function() {
                if($(window).scrollTop() > 100) {
                    $(".tm-top-bar").addClass("active");
                } else {
                    //remove the background property so it comes transparent again (defined in your css)
                    $(".tm-top-bar").removeClass("active");
                }
            });

            // Google Map
            loadGoogleMap();

            // Date Picker
            const pickerCheckIn = datepicker('#inputCheckIn');
            const pickerCheckOut = datepicker('#inputCheckOut');

            // Slick carousel
            setCarousel();
            setPageNav();

            $(window).resize(function() {
                setCarousel();
                setPageNav();
            });

            // Close navbar after clicked
            $('.nav-link').click(function(){
                $('#mainNav').removeClass('show');
            });

            // Control video
            $('.tm-btn-play').click(function() {
                togglePlayPause();
            });

            $('.tm-btn-pause').click(function() {
                togglePlayPause();
            });

            // Update the current year in copyright
            $('.tm-current-year').text(new Date().getFullYear());
        });

    </script>
</body>

{{-- <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger
    intent="WELCOME"
    chat-title="Laa Tachzan"
    agent-id="8e776b09-416f-4fe8-a951-2ae5c8e84a66"
    language-code="id">
</df-messenger> --}}

<script>
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
</script>

<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

</html>
