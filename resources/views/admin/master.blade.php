<!DOCTYPE html>
<html lang="en">
    @include('admin.partials.head')
    <body>
        <div class="wrapper">
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
                                    <div id="jumlah1"></div>
                                </a>
                                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                    <li>
                                        <div id="jumlah2"></div>
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
                                        <img src="{{ asset('admin-tem/assets/img/admin.png') }}" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg"><img src="{{ asset('admin-tem/assets/img/profile.jpg') }}" alt="image profile" class="avatar-img rounded"></div>
                                                <div class="u-text">
                                                    <h4>{{ Auth::guard('admin')->user()->nama }}</h4>
                                                    <p class="text-muted">{{ Auth::guard('admin')->user()->email }}</p><a href="{{ route('admin.profil') }}" class="btn btn-xs btn-secondary btn-sm">Lihat Profil</a>
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

            @include('admin.partials.sidebar')

            <div class="main-panel">
                <div class="content">
                    @yield('admin.content')

                    @include('admin.partials.footer')
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $('document').ready(function () {
                notifikasi();
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function notifikasi() {
                setInterval(function () {
                    pesan();
                    jumlah();
                }, 1000);
            }

            function jumlah() {
                $.ajax({
                    url: '/admin/konseling/notifikasi-jumlah',
                    method: 'GET',
                    success:function(response){
                        $("#jumlah1").html('<span class="notification">'+ response +'</span>');
                        $("#jumlah2").html('<div class="dropdown-title">'+ response +' notifikasi baru</div>');
                    },
                    error:function(error){
                        console.log(error)
                    }
                });
            }

            function pesan() {
                $.ajax({
                    url: '/admin/konseling/notifikasi-pesan',
                    method: 'GET',
                    success:function(response){
                        // location.reload();
                        $("#notifikasi-notif").html(response.success);
                    },
                    error:function(error){
                        console.log(error)
                    }
                });
            }
        </script>
        @yield('scripts')
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
                    "pageLength": 10,
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

                    $('body').on('click', '.konfirmasi-konseling', function (e) {
                        e.preventDefault();
                        var id = $(this).attr('konseling-id');
                        swal({
                            title: 'Konfirmasi',
                            text: "Konfirmasi pengajuan konseling pasien?",
                            type: 'warning',
                            buttons:{
                                cancel: {
                                    visible: true,
                                    text : 'Cancel',
                                    className: 'btn btn-danger'
                                },
                                confirm: {
                                    text : 'Konfirmasi',
                                    className : 'btn btn-success'
                                }
                            }
                        }).then((willDelete) => {
                            if (willDelete) {
                                window.location = "/admin/konseling/konfirmasi/"+id;
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
