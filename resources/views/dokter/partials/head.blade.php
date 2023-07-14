<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Klinik Laa Tachzan</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    @yield('meta')
	<link rel="icon" href="{{ asset('admin-tem/img/logo-new.ico') }}" type="image/x-icon"/>
	<script src="{{ asset('admin-tem/assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{ asset('admin-tem/assets/css/fonts.min.css') }}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link rel="stylesheet" href="{{ asset('admin-tem/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin-tem/assets/css/atlantis.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin-tem/assets/css/demo.css') }}">
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.9.1/firebase-messaging.js"></script>
    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyDcqYKSWgl5W78lkmRKfZE9bPgFJBkHsH4",
            authDomain: "laatachzan-259c8.firebaseapp.com",
            projectId: "laatachzan-259c8",
            storageBucket: "laatachzan-259c8.appspot.com",
            messagingSenderId: "272133582529",
            appId: "1:272133582529:web:6d89f7ea248245883c6e40"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
