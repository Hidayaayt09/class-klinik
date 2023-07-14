@extends('pasien.master')
@section('sesi','active')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('admin-tem/assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <style>
        .bubbleWrapper {
            padding: 10px 10px;
            display: flex;
            justify-content: flex-end;
            flex-direction: column;
            align-self: flex-end;
            color: #fff;
        }
        .inlineContainer {
            display: inline-flex;
        }
        .inlineContainer.own {
            flex-direction: row-reverse;
        }
        .inlineIcon {
            width:20px;
            object-fit: contain;
        }
        .ownBubble {
            min-width: 60px;
            max-width: 700px;
            padding: 14px 18px;
            margin: 6px 8px;
            background-color: #1bdfc5;
            border-radius: 16px 16px 0 16px;
            border: 1px gradient #443f56;
        }
        .otherBubble {
            min-width: 60px;
            max-width: 700px;
            padding: 14px 18px;
            margin: 6px 8px;
            background-color:  #48ABF7;
            border-radius: 16px 16px 16px 0;
            border: 1px gradient #54788e;
        }
        .own {
            align-self: flex-end;
        }
        .other {
            align-self: flex-start;
        }
        span.own, span.other{
            font-size: 14px;
            color: grey;
        }
    </style>
@endsection
@section('pasien.content')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Sesi Konsultasi Online</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="chatlist">
                    @foreach ($data_sesi as $sesi)
                    @if ($sesi->sender==$dokter)
                    <div class="bubbleWrapper">
                        <div class="inlineContainer">
                            <img class="inlineIcon" src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png">
                            <div class="otherBubble other">
                                {{ $sesi->pesan }}
                            </div>
                        </div><span class="other">{{ date('H:i', strtotime($sesi->created_at)) }}</span>
                    </div>
                    @endif
                    @if ($sesi->sender==$pasien->user_id)
                    <div class="bubbleWrapper">
                        <div class="inlineContainer own">
                            <img class="inlineIcon" src="https://www.pinclipart.com/picdir/middle/205-2059398_blinkk-en-mac-app-store-ninja-icon-transparent.png">
                            <div class="ownBubble own">
                                {{ $sesi->pesan }}
                            </div>
                        </div><span class="own">{{ date('H:i', strtotime($sesi->created_at)) }}</span>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="card-header">
                <form id="kirim_pesan">
                    <div class="d-flex align-items-center">
                        <div class="col-md-11">
                            <input type="text" name="pesan" id="pesan" class="form-control" placeholder="Kirim Pesan...">
                            <input type="hidden" name="sender" id="sender" value="{{ $pasien->user_id }}">
                            <input type="hidden" name="jadwal_id" id="jadwal_id" value="{{ $jadwal_id }}">
                        </div>
                        <div class="col-md-1 text-right">
                            <button type="submit" class="btn btn-success btn-round ml-auto">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $('document').ready(function () {
            setInterval(function () {
                chatRealtime();
            }, 1000);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#kirim_pesan").submit(function(e){
            e.preventDefault();
            var pesan  = $("#pesan").val();
            var sender = $("#sender").val();
            var jadwal_id = $("#jadwal_id").val();
            $.ajax({
                url: '/pasien/sesi-online/create',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    jadwal_id: jadwal_id,
                    pesan: pesan,
                    sender: sender
                },
                success:function(response){
                    // location.reload();
                    $("#pesan").val("");
                    $(".chatlist").html(response.success);
                },
                error:function(error){
                    console.log(error)
                }
            });
        });

        function chatRealtime() {
            var id = '{{Auth::user()->user_id}}';
            $.ajax({
                url: '/pasien/sesi-online/message/'+id,
                method: 'GET',
                success:function(response){
                    // location.reload();
                    $(".chatlist").html(response.success);
                },
                error:function(error){
                    console.log(error)
                }
            });
        }

        function notifikasiChat() {
            $.ajax({
                url: '/pasien/sesi-online/notifikasi',
                method: 'GET',
                success:function(response){
                    var tmp = response.split(",");
                    console.log(tmp[0]);
                    // $.notify({
                    //     icon: 'flaticon-alarm-1',
                    //     title: response.sender,
                    //     message: response.pesan,
                    // },{
                    //     type: 'info',
                    //     placement: {
                    //         from: "bottom",
                    //         align: "right"
                    //     },
                    // });
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
            const user_id = '{{Auth::user()->user_id}}';
            axios.post('api/save-token', {
                fcm_token, user_id
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

            $(".chatlist").html(response.success);
        });

    </script>
@endsection
