@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('admin-tem/assets/js/core/jquery.3.2.1.min.js') }}"></script>
@endsection
            
<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="green">

        <a href="{{ route('admin.dashboard') }}" class="logo">
            <img src="{{ asset('admin-tem/img/logonama.png') }}" width="100px" alt="navbar brand" class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="white">

        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link" href="javascript:void(0);" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="notification"></span>
                    </a>
                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                        <li>
                            <div class="dropdown-title">4 notifikasi baru</div>
                        </li>
                        <li>
                            <div class="notif-scroll scrollbar-outer">
                                <div id="notifikasi-notif"></div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="{{ asset('admin-tem/assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg"><img src="{{ asset('admin-tem/assets/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded"></div>
                                    <div class="u-text">
                                        <h4>{{ Auth::guard('admin')->user()->nama }}</h4>
                                        <p class="text-muted">{{ Auth::guard('admin')->user()->email }}</p><a href="{{ route('admin.profil') }}" class="btn btn-xs btn-success btn-sm">Lihat Profil</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>


@section('scripts')
    <script type="text/javascript">
        $('document').ready(function () {
            setInterval(function () {notifikasi()}, 1000);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#notifDropdown").click(function(e){
            e.preventDefault();
            alert('Cek');
            $.ajax({
                url: '/admin/konseling/notifikasi',
                method: 'GET',
                success:function(response){
                    // location.reload();
                    $("#notifikasi-notif").html(response.success);
                },
                error:function(error){
                    console.log(error)
                }
            });
        });

        function notifikasi() {
            $(".notification").html('<span class="notification">4</span>');
            // $.ajax({
            //     url: '/admin/konseling/notifikasi',
            //     method: 'GET',
            //     success:function(response){
            //         // location.reload();
            //         $("#notifikasi-notif").html(response.success);
            //     },
            //     error:function(error){
            //         console.log(error)
            //     }
            // });
        }
    </script>
@endsection
