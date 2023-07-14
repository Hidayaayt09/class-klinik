<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Konseling;
use App\Models\SesiOnline;
use App\Models\User;
use FCM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class SesiOnlineController extends Controller
{
    public function index()
    {
        $pasien = Auth::user();
        $dokter = 'b8123eb1-07d3-45f4-a247-0caf1bee1376';
        $data_sesi = Konseling::with('jadwal')->where(['user_id'=>$pasien->user_id, 'jenis_sesi'=>'online'])->get();
        $count_sesi = Konseling::with('jadwal')->where(['user_id'=>$pasien->user_id, 'jenis_sesi'=>'online'])->count();

        return view('pasien.content.sesi_list', compact('data_sesi', 'pasien', 'dokter', 'count_sesi'));
    }

    public function sesi_online($id)
    {
        $pasien = Auth::user();
        $dokter = 'b8123eb1-07d3-45f4-a247-0caf1bee1376';
        $data_sesi = SesiOnline::where('sender', $dokter)->where('receiver', $pasien->user_id)->orWhere('sender', $pasien->user_id)->where('receiver', $dokter)->get();
        $jadwal_id = $id;

        return view('pasien.content.sesi', compact('data_sesi', 'pasien', 'dokter', 'jadwal_id'));
    }

    public function message($id)
    {
        $dokter = 'b8123eb1-07d3-45f4-a247-0caf1bee1376';
        $data_sesi = SesiOnline::where('sender', $dokter)->where('receiver', $id)->orWhere('sender', $id)->where('receiver', $dokter)->get();

        $div = '<div>';
        foreach ($data_sesi as $so) {
            if($so->sender==$dokter) {
                $div .= '<div class="bubbleWrapper">';
                $div .= '<div class="inlineContainer">';
                $div .= '<img class="inlineIcon" src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png">';
                $div .= '<div class="otherBubble other">'.$so->pesan.'</div>';
                $div .= '</div><span class="other">'.date('H:i', strtotime($so->created_at)).'</span></div>';
            }
            if ($so->sender==$id) {
                $div .= '<div class="bubbleWrapper">';
                $div .= '<div class="inlineContainer own">';
                $div .= '<img class="inlineIcon" src="https://www.pinclipart.com/picdir/middle/205-2059398_blinkk-en-mac-app-store-ninja-icon-transparent.png">';
                $div .= '<div class="ownBubble own">'.$so->pesan.'</div>';
                $div .= '</div><span class="own">'.date('H:i', strtotime($so->created_at)).'</span></div>';
            }
        }
        $div .= '</div>';

        return response()->json(['success'=> $div]);
    }

    public function create(Request $request){
        $dokter = Dokter::where('dokter_id', 'b8123eb1-07d3-45f4-a247-0caf1bee1376')->first();

        $sesi = new SesiOnline;
        $sesi->jadwal_id = $request->jadwal_id;
        $sesi->receiver  = 'b8123eb1-07d3-45f4-a247-0caf1bee1376';
        $sesi->sender    = $request->sender;
        $sesi->pesan     = $request->pesan;

        $this->broadcastMessage(auth()->user()->nama, $request->pesan);

        // $this->notifikasi($dokter->nama, $request->pesan);

        $sesi->save();

        $pasien = Auth::user();
        $dokter = 'b8123eb1-07d3-45f4-a247-0caf1bee1376';
        $data_sesi = SesiOnline::where('sender', $dokter)->where('receiver', $pasien->user_id)->orWhere('sender', $pasien->user_id)->where('receiver', $dokter)->get();

        $div = '<div>';
        foreach ($data_sesi as $so) {
            if($so->sender==$dokter) {
                $div .= '<div class="bubbleWrapper">';
                $div .= '<div class="inlineContainer">';
                $div .= '<img class="inlineIcon" src="https://cdn1.iconfinder.com/data/icons/ninja-things-1/1772/ninja-simple-512.png">';
                $div .= '<div class="otherBubble other">'.$so->pesan.'</div>';
                $div .= '</div><span class="other">'.date('H:i', strtotime($so->created_at)).'</span></div>';
            }
            if ($so->sender==$pasien->user_id) {
                $div .= '<div class="bubbleWrapper">';
                $div .= '<div class="inlineContainer own">';
                $div .= '<img class="inlineIcon" src="https://www.pinclipart.com/picdir/middle/205-2059398_blinkk-en-mac-app-store-ninja-icon-transparent.png">';
                $div .= '<div class="ownBubble own">'.$so->pesan.'</div>';
                $div .= '</div><span class="own">'.date('H:i', strtotime($so->created_at)).'</span></div>';
            }
        }
        $div .= '</div>';

        return response()->json(['success'=> $div]);
    }

    public function notifikasi($sender, $pesan)
    {
        $data = array($sender, $pesan);

        echo json_encode($data);
    }

    public function notifikasi2()
    {
        $user_id = Auth::user()->user_id;
        $dokter_id = 'b8123eb1-07d3-45f4-a247-0caf1bee1376';
        $dokter = Dokter::where('dokter_id', $dokter_id)->first();
        $sesi = SesiOnline::where('sender', $dokter_id)->where('receiver', $user_id)->orderBy('sesi_id', 'DESC')->first();

        $data = array($dokter->nama, $sesi->pesan);

        echo json_encode($data);
        // return response()->json(['success'=> $data]);
    }

    private function broadcastMessage($senderName, $pesan)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('Pesan baru dari : '.$senderName);
        $notificationBuilder->setBody($pesan)
                            ->setSound('default')
                            ->setClickAction('http://localhost:8000/pasien/sesi-online');
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData([
            'nama' => $senderName,
            'pesan' => $pesan
        ]);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $tokens = User::all()->pluck('fcm_token')->toArray();
        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

        return $downstreamResponse->numberSuccess();
    }

}
