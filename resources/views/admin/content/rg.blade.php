<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Klinik Laa Tachzan</title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        @yield('meta')
        <link rel="icon" href="{{ asset('admin-tem/assets/img/icon.ico') }}" type="image/x-icon"/>
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
        <link rel="stylesheet" href="{{ asset('admin-tem/assets/js/plugin/jquery-ui-1.12.1/jquery-ui.css') }}">
        <script src="{{ asset('admin-tem/assets/js/plugin/jquery-ui-1.12.1/jquery-1.12.4.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/plugin/jquery-ui-1.12.1/jquery-ui.js') }}"></script>
    </head>
    <body>
        <div class="wrapper">
            <div class="main-header">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="blue">

                    <a href="{{ route('admin.dashboard') }}" class="logo">
                        <img src="{{ asset('admin-tem/assets/img/logo.svg') }}" alt="navbar brand" class="navbar-brand">
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
                <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

                    <div class="container-fluid">
                        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                            <li class="nav-item dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="notification">4</span>
                                </a>
                                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                    <li>
                                        <div class="dropdown-title">You have 4 new notification</div>
                                    </li>
                                    <li>
                                        <div class="notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                <a href="#">
                                                    <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            New user registered
                                                        </span>
                                                        <span class="time">5 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            Rahmad commented on Admin
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="{{ asset('admin-tem/assets/img/profile2.jpg') }}" alt="Img Profile">
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            Reza send messages to you
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            Farrah liked Admin
                                                        </span>
                                                        <span class="time">17 minutes ago</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
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
                                                    <h4>Hizrian</h4>
                                                    <p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">My Profile</a>
                                            <a class="dropdown-item" href="#">My Balance</a>
                                            <a class="dropdown-item" href="#">Inbox</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Account Setting</a>
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

            <!-- Sidebar -->
            <div class="sidebar sidebar-style-2">
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <div class="user">
                            <div class="avatar-sm float-left mr-2">
                                <img src="{{ asset('admin-tem/assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                            </div>
                            <div class="info">
                                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                    <span>
                                        Laa Tachzan
                                        <span class="user-level">Administrator</span>
                                        <span class="caret"></span>
                                    </span>
                                </a>
                                <div class="clearfix"></div>

                                <div class="collapse in" id="collapseExample">
                                    <ul class="nav">
                                        <li>
                                            <a href="#profile">
                                                <span class="link-collapse">My Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#edit">
                                                <span class="link-collapse">Edit Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#settings">
                                                <span class="link-collapse">Settings</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-primary">
                            <li class="nav-item @yield('dashboard')">
                                <a href="{{ route('admin.dashboard') }}" class="collapsed" aria-expanded="false">
                                    <i class="fas fa-home"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-section">
                                <span class="sidebar-mini-icon">
                                    <i class="fa fa-ellipsis-h"></i>
                                </span>
                                <h4 class="text-section">Menu</h4>
                            </li>
                            <li class="nav-item @yield('data-master')">
                                <a data-toggle="collapse" href="#datamaster">
                                    <i class="fas fa-book"></i>
                                    <p>Data Master</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse @yield('collapse')" id="datamaster">
                                    <ul class="nav nav-collapse">
                                        <li class="@yield('data-dokter')">
                                            <a href="{{ route('admin.dokter') }}">
                                                <span class="sub-item">Data Dokter</span>
                                            </a>
                                        </li>
                                        <li class="@yield('data-pasien')">
                                            <a href="{{ route('admin.pasien') }}">
                                                <span class="sub-item">Data Pasien</span>
                                            </a>
                                        </li>
                                        <li class="@yield('konseling')">
                                            <a href="{{ route('admin.konseling') }}">
                                                <span class="sub-item">Data Kategori</span>
                                            </a>
                                        </li>
                                        <li class="@yield('gejala')">
                                            <a href="{{ route('admin.gejala') }}">
                                                <span class="sub-item">Data Gejala</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item active">
                                <a href="{{ route('admin.rule') }}">
                                    <i class="fas fa-clipboard-list"></i>
                                    <p>Nilai Kategori Gejala</p>
                                </a>
                            </li>
                            <li class="nav-item @yield('treatment')">
                                <a href="{{ route('admin.treatment') }}">
                                    <i class="fas fa-clipboard-list"></i>
                                    <p>Konseling</p>
                                </a>
                            </li>
                            <li class="nav-item @yield('jadwal')">
                                <a href="{{ route('admin.jadwal') }}">
                                    <i class="fas fa-table"></i>
                                    <p>Jadwal Konseling</p>
                                </a>
                            </li>
                            <li class="nav-item @yield('testimoni')">
                                <a href="{{ route('admin.testimoni') }}">
                                    <i class="far fa-comments"></i>
                                    <p>Testimoni</p>
                                </a>
                            </li>
                            <li class="nav-item @yield('identitas')">
                                <a href="{{ route('admin.identitas') }}">
                                    <i class="fas fa-folder"></i>
                                    <p>Konten</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->


            <div class="main-panel">
                <div class="content">
                    <div class="page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title">Nilai Kategori Gejala</h4>
                                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah-rule">
                                                <i class="fa fa-plus"></i>
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#import-rule">
                                                <i class="fa fa-plus"></i>
                                                Import Excel
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Modal -->
                                        <div class="modal fade" id="tambah-rule" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.rule.create') }}" enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        <div class="modal-header no-bd">
                                                            <h5 class="modal-title">
                                                                <span class="fw-mediumbold">
                                                                Tambah</span>
                                                                <span class="fw-light">
                                                                    Nilai Kategori Gejala
                                                                </span>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Nama Kategori</label>
                                                                        <select class="form-control" name="kategori_id">
                                                                            <option value="" disabled selected>--Pilih Kategori--</option>
                                                                            @foreach ($data_kategori as $kategori)
                                                                                <option value="{{ $kategori->kategori_id }}">{{ $kategori->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Nama Gejala</label>
                                                                        {{-- <select class="form-control" name="gejala_id">
                                                                            <option value="" disabled selected>--Pilih Gejala--</option>
                                                                            @foreach ($data_gejala as $gejala)
                                                                                <option value="{{ $gejala->gejala_id }}">{{ $gejala->nama_gejala }}</option>
                                                                            @endforeach
                                                                        </select> --}}
                                                                        <input type="text" name="nama_gejala" id="nama_gejala" class="form-control" placeholder="Nama Gejala..">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>Gejala ID</label>
                                                                        <input type="text" name="gejala_id" id="gejala_id" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer no-bd">
                                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="import-rule" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('admin.rule.import') }}" enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        <div class="modal-header no-bd">
                                                            <h5 class="modal-title">
                                                                <span class="fw-mediumbold">
                                                                Import</span>
                                                                <span class="fw-light">
                                                                    Nilai Kategori Gejala
                                                                </span>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group form-group-default">
                                                                        <label>File Excel</label>
                                                                        <input type="file" name="file" class="form-control-file">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer no-bd">
                                                            <button type="submit" class="btn btn-primary">Import</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="add-row display table table-striped table-hover text-center">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Kategori Konseling</th>
                                                        <th>Nama Gejala</th>
                                                        <th>Nilai</th>
                                                        <th style="width: 10%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 0; ?>
                                                    @foreach ($data_rule as $rule)
                                                    <?php $no++; ?>
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $rule->kategori->nama }}</td>
                                                        <td>{{ $rule->gejala->nama_gejala }}</td>
                                                        <td>{{ $rule->nilai }}</td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <button type="button" data-toggle="modal" data-target="#edit-rule{{ $rule->rule_id }}" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Nilai Kategori Gejala">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                                <button type="button" rule-id="{{ $rule->rule_id }}" class="hapus-rule btn btn-link btn-danger" data-original-title="Hapus Nilai Kategori Gejala">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" id="edit-rule{{ $rule->rule_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form action="{{ route('admin.rule.update', $rule->rule_id) }}" enctype="multipart/form-data" method="POST">
                                                                    @csrf
                                                                    <div class="modal-header no-bd">
                                                                        <h5 class="modal-title">
                                                                            <span class="fw-mediumbold">
                                                                            Edit</span>
                                                                            <span class="fw-light">
                                                                                Nilai Kategori Gejala
                                                                            </span>
                                                                        </h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Nama Kategori</label>
                                                                                    <select class="form-control" name="kategori_id">
                                                                                        <option value="" disabled>--Pilih Kategori--</option>
                                                                                        @foreach ($data_kategori as $kategori)
                                                                                            <option value="{{ $kategori->kategori_id }}" @if($kategori->kategori_id==$rule->kategori_id) selected @endif>{{ $kategori->nama }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group form-group-default">
                                                                                    <label>Nama Gejala</label>
                                                                                    <select class="form-control" name="gejala_id">
                                                                                        <option value="" disabled>--Pilih Gejala--</option>
                                                                                        @foreach ($data_gejala as $gejala)
                                                                                            <option value="{{ $gejala->gejala_id }}" @if($gejala->gejala_id==$rule->gejala_id) selected @endif>{{ $gejala->nama_gejala }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer no-bd">
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="copyright ml-auto">
                                2021, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
                            </div>
                        </div>
                    </footer>

                </div>
            </div>
        </div>

        <script type="text/javascript">
            // CSRF Token
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $(document).ready(function(){
                $( "#nama_gejala" ).autocomplete({
                    source: function( request, response ) {
                        // Fetch data
                        $.ajax({
                            url:"/admin/gejala/cari",
                            type: 'post',
                            dataType: "json",
                            data: {
                                _token: CSRF_TOKEN,
                                search: request.term
                            },
                            success: function( data ) {
                                response( data );
                            }
                        });
                    },
                    select: function (event, ui) {
                        $('#nama_gejala').val(ui.item.label);
                        $('#gejala_id').val(ui.item.gejala_id);
                        return false;
                    }
                });
            });
        </script>

        <script src="{{ asset('admin-tem/assets/js/core/jquery.3.2.1.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/plugin/chart.js/chart.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/plugin/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/atlantis.min.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/setting-demo.js') }}"></script>
        <script src="{{ asset('admin-tem/assets/js/demo.js') }}"></script>
        <script>
            Circles.create({
                id:'circles-1',
                radius:45,
                value:60,
                maxValue:100,
                width:7,
                text: 5,
                colors:['#f1f1f1', '#FF9E27'],
                duration:400,
                wrpClass:'circles-wrp',
                textClass:'circles-text',
                styleWrapper:true,
                styleText:true
            })

            Circles.create({
                id:'circles-2',
                radius:45,
                value:70,
                maxValue:100,
                width:7,
                text: 36,
                colors:['#f1f1f1', '#2BB930'],
                duration:400,
                wrpClass:'circles-wrp',
                textClass:'circles-text',
                styleWrapper:true,
                styleText:true
            })

            Circles.create({
                id:'circles-3',
                radius:45,
                value:40,
                maxValue:100,
                width:7,
                text: 12,
                colors:['#f1f1f1', '#F25961'],
                duration:400,
                wrpClass:'circles-wrp',
                textClass:'circles-text',
                styleWrapper:true,
                styleText:true
            })

            var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

            var mytotalIncomeChart = new Chart(totalIncomeChart, {
                type: 'bar',
                data: {
                    labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
                    datasets : [{
                        label: "Total Income",
                        backgroundColor: '#ff9e27',
                        borderColor: 'rgb(23, 125, 255)',
                        data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                display: false //this will remove only the label
                            },
                            gridLines : {
                                drawBorder: false,
                                display : false
                            }
                        }],
                        xAxes : [ {
                            gridLines : {
                                drawBorder: false,
                                display : false
                            }
                        }]
                    },
                }
            });

            $('#lineChart').sparkline([105,103,123,100,95,105,115], {
                type: 'line',
                height: '70',
                width: '100%',
                lineWidth: '2',
                lineColor: '#ffa534',
                fillColor: 'rgba(255, 165, 52, .14)'
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#basic-datatables').DataTable({
                });

                $('#multi-filter-select').DataTable( {
                    "pageLength": 5,
                    initComplete: function () {
                        this.api().columns().every( function () {
                            var column = this;
                            var select = $('<select class="form-control"><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                    );

                                column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                            } );

                            column.data().unique().sort().each( function ( d, j ) {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            } );
                        } );
                    }
                });

                // Add Row
                $('.add-row').DataTable({
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.10.25/i18n/Indonesian.json"
                    },
                    "pageLength": 5,
                });

                var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

                $('.addRowButton').click(function() {
                    $('.add-row').dataTable().fnAddData([
                        $(".addName").val(),
                        $(".addPosition").val(),
                        $(".addOffice").val(),
                        action
                        ]);
                    $('.addRowModal').modal('hide');

                });
            });
        </script>
        <script>
            var SweetAlert2Demo = function() {
                var initDemos = function() {
                    $('body').on('click', '.hapus-kategori', function (e) {
                        e.preventDefault();
                        var id = $(this).attr('kategori-id');
                        swal({
                            title: 'Hapus',
                            text: "Hapus kategori konseling?",
                            type: 'warning',
                            buttons:{
                                cancel: {
                                    visible: true,
                                    text : 'Cancel',
                                    className: 'btn btn-danger'
                                },
                                confirm: {
                                    text : 'Hapus',
                                    className : 'btn btn-success'
                                }
                            }
                        }).then((willDelete) => {
                            if (willDelete) {
                                window.location = "/admin/konseling/delete/"+id;
                            }
                        });
                    });

                    $('body').on('click', '.hapus-pasien', function (e) {
                        e.preventDefault();
                        var id = $(this).attr('pasien-id');
                        swal({
                            title: 'Hapus',
                            text: "Hapus data pasien?",
                            type: 'warning',
                            buttons:{
                                cancel: {
                                    visible: true,
                                    text : 'Cancel',
                                    className: 'btn btn-danger'
                                },
                                confirm: {
                                    text : 'Hapus',
                                    className : 'btn btn-success'
                                }
                            }
                        }).then((willDelete) => {
                            if (willDelete) {
                                window.location = "/admin/data-pasien/delete/"+id;
                            }
                        });
                    });

                    $('body').on('click', '.hapus-dokter', function (e) {
                        e.preventDefault();
                        var id = $(this).attr('dokter-id');
                        swal({
                            title: 'Hapus',
                            text: "Hapus data dokter?",
                            type: 'warning',
                            buttons:{
                                cancel: {
                                    visible: true,
                                    text : 'Cancel',
                                    className: 'btn btn-danger'
                                },
                                confirm: {
                                    text : 'Hapus',
                                    className : 'btn btn-success'
                                }
                            }
                        }).then((willDelete) => {
                            if (willDelete) {
                                window.location = "/admin/data-dokter/delete/"+id;
                            }
                        });
                    });

                    $('body').on('click', '.hapus-identitas', function (e) {
                        e.preventDefault();
                        var id = $(this).attr('identitas-id');
                        swal({
                            title: 'Hapus',
                            text: "Hapus data identitas?",
                            type: 'warning',
                            buttons:{
                                cancel: {
                                    visible: true,
                                    text : 'Cancel',
                                    className: 'btn btn-danger'
                                },
                                confirm: {
                                    text : 'Hapus',
                                    className : 'btn btn-success'
                                }
                            }
                        }).then((willDelete) => {
                            if (willDelete) {
                                window.location = "/admin/identitas/delete/"+id;
                            }
                        });
                    });

                    $('body').on('click', '.hapus-gejala', function (e) {
                        e.preventDefault();
                        var id = $(this).attr('gejala-id');
                        swal({
                            title: 'Hapus',
                            text: "Hapus data gejala?",
                            type: 'warning',
                            buttons:{
                                cancel: {
                                    visible: true,
                                    text : 'Cancel',
                                    className: 'btn btn-danger'
                                },
                                confirm: {
                                    text : 'Hapus',
                                    className : 'btn btn-success'
                                }
                            }
                        }).then((willDelete) => {
                            if (willDelete) {
                                window.location = "/admin/gejala/delete/"+id;
                            }
                        });
                    });

                    $('body').on('click', '.hapus-rule', function (e) {
                        e.preventDefault();
                        var id = $(this).attr('rule-id');
                        swal({
                            title: 'Hapus',
                            text: "Hapus data nilai kategori gejala?",
                            type: 'warning',
                            buttons:{
                                cancel: {
                                    visible: true,
                                    text : 'Cancel',
                                    className: 'btn btn-danger'
                                },
                                confirm: {
                                    text : 'Hapus',
                                    className : 'btn btn-success'
                                }
                            }
                        }).then((willDelete) => {
                            if (willDelete) {
                                window.location = "/admin/nilai/delete/"+id;
                            }
                        });
                    });
                };
                return {
                    init: function() {
                        initDemos();
                    },
                };
            }();
            jQuery(document).ready(function() {
                SweetAlert2Demo.init();
            });
        </script>
    </body>
</html>
