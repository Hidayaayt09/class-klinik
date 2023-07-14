<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Jadwal;
use App\Models\Konseling;
use App\Models\SesiOnline;
use FCM;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class SesiOnlineController extends Controller
{
    public function index()
    {
        try {
            $data_sesi = Konseling::with('jadwal')->where('status', 'konfirmasi')->groupBy('user_id')->get();
            $count_sesi = Konseling::with('jadwal')->count();
            $admin  = Auth::guard('admin')->user()->admin_id;
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view('admin.content.sesi', compact('data_sesi', 'count_sesi', 'admin'));
    }

    public function message($id)
    {
        $admin  = Auth::guard('admin')->user()->admin_id;
        // $data_sesi = SesiOnline::whereBetween('sender', [$admin, $id])->get();
        $data_sesi = SesiOnline::where('sender', $admin)->where('receiver', $id)->orWhere('sender', $id)->where('receiver', $admin)->get();

        $div = '<div class="msg_history">';
        foreach ($data_sesi as $sesi) {
            if ($sesi->sender==$id) {
                $div .= '<div class="incoming_msg">';
                $div .= '<div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div>';
                $div .= '<div class="received_msg">';
                $div .= '<div class="received_withd_msg">';
                $div .= '<p>'.$sesi->pesan.'</p>';
                $div .= '<span class="time_date">'.date('H:i', strtotime($sesi->created_at)).'</span>';
                $div .= '</div>';
                $div .= '</div>';
                $div .= '</div>';
            }
            if ($sesi->sender==$admin) {
                $div .= '<div class="outgoing_msg">';
                $div .= '<div class="sent_msg">';
                $div .= '<p>'.$sesi->pesan.'</p>';
                $div .= '<span class="time_date">'.date('H:i', strtotime($sesi->created_at)).'</span>';
                $div .= '</div>';
                $div .= '</div>';
            }
        }
        $div .= '</div>';

        return response()->json(['success'=> $div]);
    }

    public function text($id)
    {
        $sesi = Jadwal::where('konseling_id', $id)->first();
        $jml_sesi = SesiOnline::where('jadwal_id', $sesi->jadwal->jadwal_id)->count();
        $admin = Auth::guard('admin')->user()->admin_id;
        $last_chat = SesiOnline::where('sender', $admin)->where('receiver', $sesi->pasien->user_id)->
                                            orWhere('sender', $sesi->pasien->user_id)->where('receiver', $admin)->
                                            orderBy('sesi_id', 'desc')->first();

        if ($jml_sesi > 0) {
            $pesan = Str::limit($last_chat->pesan, 30, $end='...');
        }
        else {
            $pesan = "Belum ada pesan";
        }

        return response()->json(['success'=> $pesan]);
    }

    public function create(Request $request){
        $sesi = new SesiOnline;
        $sesi->jadwal_id = $request->jadwal_id;
        $sesi->receiver  = $request->receiver;
        $sesi->sender    = Auth::guard('admin')->user()->admin_id;
        $sesi->pesan     = $request->pesan;

        $this->broadcastMessage(Auth::guard('admin')->user()->nama, $request->pesan);

        $sesi->save();

        $pasien = $request->receiver;
        $admin  = Auth::guard('admin')->user()->admin_id;
        // $data_sesi = SesiOnline::whereBetween('sender', [$admin, $pasien])->get();
        $data_sesi = SesiOnline::where('sender', $admin)->where('receiver', $pasien)->orWhere('sender', $pasien)->where('receiver', $admin)->get();

        $div = '<div class="msg_history">';
        foreach ($data_sesi as $sesi) {
            if ($sesi->sender==$pasien) {
                $div .= '<div class="incoming_msg">';
                $div .= '<div class="incoming_msg_img"><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div>';
                $div .= '<div class="received_msg">';
                $div .= '<div class="received_withd_msg">';
                $div .= '<p>'.$sesi->pesan.'</p>';
                $div .= '<span class="time_date">'.date('H:i', strtotime($sesi->created_at)).'</span>';
                $div .= '</div>';
                $div .= '</div>';
                $div .= '</div>';
            }
            if ($sesi->sender==$admin) {
                $div .= '<div class="outgoing_msg">';
                $div .= '<div class="sent_msg">';
                $div .= '<p>'.$sesi->pesan.'</p>';
                $div .= '<span class="time_date">'.date('H:i', strtotime($sesi->created_at)).'</span>';
                $div .= '</div>';
                $div .= '</div>';
            }
        }
        $div .= '</div>';

        return response()->json(['success'=> $div]);
    }

    private function broadcastMessage($senderName, $pesan)
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('Pesan baru dari : '.$senderName);
        $notificationBuilder->setBody($pesan)
                            ->setSound('default')
                            ->setClickAction('http://localhost:8000/admin/sesi-online');
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData([
            'nama' => $senderName,
            'pesan' => $pesan
        ]);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $tokens = Admin::all()->pluck('fcm_token')->toArray();
        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

        return $downstreamResponse->numberSuccess();
    }
}
