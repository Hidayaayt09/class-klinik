@extends('dokter.master')
@section('dashboard','active')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('admin-tem/assets/js/plugin/fullcalendar/main.css') }}">
    <script src="{{ asset('admin-tem/assets/js/plugin/fullcalendar/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var SITEURL = "/dokter/jadwal-konseling";
            var calendarEl = document.getElementById('calendar');
            var tgl = $('#tgl').val();
            var judul = $('#title').val();
            var tgl_konseling = $('#start').val();

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                initialDate: tgl,
                locale: 'id',
                navLinks: true,
                businessHours: true,
                editable: true,
                selectable: true,
                events: [
                    {
                        title: judul,
                        start: tgl_konseling,
                        overlap: false,
                        display: 'background',
                        color: '#5eff63'
                    }
                ]
            });

            calendar.render();
        });
    </script>
    <style>
        body {
          margin: 40px 10px;
          padding: 0;
          font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
          font-size: 14px;
        }

        #calendar {
          max-width: 1100px;
          margin: 0 auto;
        }
    </style>
@endsection
@section('dokter.content')


<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Jadwal Konsultasi</h4>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" value="<?php echo date('Y-m-d'); ?>" id="tgl">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
