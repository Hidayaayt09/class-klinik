@extends('dokter.master')
@section('sesi','active')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('admin-tem/assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <style>
        .container{max-width:1170px; margin:auto;}
        img{ max-width:100%;}
        .inbox_people {
            background: #f8f8f8 none repeat scroll 0 0;
            float: left;
            overflow: hidden;
            width: 40%; border-right:1px solid #c4c4c4;
        }
        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
        }
        .top_spac{ margin: 20px 0 0;}
        .recent_heading {float: left; width:40%;}
        .srch_bar {
            display: inline-block;
            text-align: right;
            width: 60%;
        }
        .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4; color: #05728f; font-size: 18px; margin: auto;}
        .recent_heading h4 {
            color: #05728f;
            font-size: 18px;
            margin: auto;
        }
        .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }
        .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

        .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
        .chat_ib h5 span{ font-size:13px; float:right;}
        .chat_ib p{ font-size:14px; color:#989898; margin:auto}
        .chat_img {
            float: left;
            width: 11%;
        }
        .chat_ib {
            float: left;
            padding: 0 0 0 15px;
            width: 88%;
        }
        .chat_people{ overflow:hidden; clear:both;}
        .chat_list {
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 18px 16px 10px;
        }
        .inbox_chat { height: 550px; overflow-y: scroll;}
        .active_chat{ background:#ebebeb;}
        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }
        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }
        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 3px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }
        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }
        .received_withd_msg { width: 57%;}
        .mesgs {
            float: left;
            padding: 30px 15px 0 25px;
            width: 60%;
        }
        .sent_msg p {
            background: #05728f none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0; color:#fff;
            padding: 5px 10px 5px 12px;
            width:100%;
        }
        .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
        .sent_msg {
            float: right;
            width: 46%;
        }
        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }
        .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;
        }
        .messaging { padding: 0 0 50px 0;}
        .msg_history {
            height: 516px;
            overflow-y: auto;
        }
    </style>
@endsection
@section('dokter.content')

<div class="page-inner">
    <h4 class="page-title">Sesi Konsultasi Online</h4>
    <div class="row">
        <div class="col-md-12">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="inbox_people">
                        <div class="headind_srch">
                            Daftar Pasien
                        </div>
                        <div class="inbox_chat">
                            @foreach ($data_sesi as $sesi)
                            <a href="javaScript:void(0);">
                                <div class="chat_list active_chat" user_id="{{ $sesi->pasien->user_id }}">
                                    <div class="chat_people">
                                        <div class="chat_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div>
                                        <div class="chat_ib">
                                            <h5>{{ $sesi->pasien->nama }}</h5>
                                            <p id="isi_pesan"></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <input type="hidden" name="jadwal_id" id="jadwal_id" value="{{ $sesi->jadwal->jadwal_id }}">
                            @endforeach
                        </div>
                    </div>
                    <div class="mesgs" id="mesgs">
                        <div class="isi-chat">
                            --Sesi Konsultasi Online--
                        </div>
                        <form class="kirim_pesan" style="display: none">
                            <div class="type_msg">
                                <div class="input_msg_write">
                                    <input type="text" class="write_msg" name="pesan" id="pesan" placeholder="Kirim pesan...">
                                    <input type="hidden" name="receiver" id="receiver">
                                    <input type="hidden" name="sender" id="sender" value="{{ Auth::guard('dokter')->user()->dokter_id }}">
                                    <button class="msg_send_btn" type="submit"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $('document').ready(function () {
            setInterval(function () {chatRealtime()}, 1000);
            // $('.mesgs').animate({
            //     scrollTop: $('.mesgs').get(0).scrollHeight
            // }, 1000);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".chat_list").click(function(e){
            e.preventDefault();
            var user_id  = $(this).attr('user_id');
            $("#receiver").val(user_id);

            chatRealtime();
        });

        $(".kirim_pesan").submit(function(e){
            e.preventDefault();
            var pesan     = $("#pesan").val();
            var sender    = $("#sender").val();
            var receiver  = $("#receiver").val();
            var jadwal_id = $("#jadwal_id").val();

            $.ajax({
                url: '/dokter/sesi-online/create',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    jadwal_id: jadwal_id,
                    pesan: pesan,
                    receiver: receiver,
                    sender: sender
                },
                success:function(response){
                    // location.reload();
                    $("#pesan").val("");
                    $(".isi-chat").html(response.success);
                    $(".kirim_pesan").css("display", "block");
                },
                error:function(error){
                    console.log(error)
                }
            });
        });

        function chatRealtime() {
            var id = $("#receiver").val();
            $.ajax({
                url: '/dokter/sesi-online/message/'+id,
                method: 'GET',
                success:function(response){
                    // location.reload();
                    $(".isi-chat").html(response.success);
                    $(".kirim_pesan").css("display", "block");
                },
                error:function(error){
                    console.log(error)
                }
            });
        }
    </script>
    <script>
        const messaging = firebase.messaging();

        function sendTokenToServer(fcm_token) {
            console.log(fcm_token);
            const dokter_id = "{{Auth::guard('dokter')->user()->dokter_id}}";
            axios.post('api/save-token-dokter', {
                fcm_token, dokter_id
            }).then(res => {
                console.log(res);
            });
        }

        function retrieveToken() {
            messaging.getToken({ vapidKey: 'BKo9KeSQjTLj6SLkhaBUc043jMH0tcn18c8VcwfF5AcMD87vH4FMznqGyf6vvBJGyhUuSdjIQyMejV0e73wUmuE' }).then((currentToken) => {
                if (currentToken) {
                    sendTokenToServer(currentToken);
                } else {
                    alert('Allow notification!');
                }
            }).catch((err) => {
                console.log('An error occurred while retrieving token. ', err);
            });
        }

        retrieveToken();

        messaging.onTokenRefresh(() => {
            retrieveToken();
        });

        messaging.onMessage((payload) => {
            console.log('Message received');
            console.log(payload);

            $(".isi-chat").html(response.success);
            $(".kirim_pesan").css("display", "block");
        });

    </script>
@endsection
