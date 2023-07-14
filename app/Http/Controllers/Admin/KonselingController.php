<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Konseling;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class KonselingController extends Controller
{
    public function index()
    {
        // $time = CarbonInterval::createFromFormat('Y-m-d H:i:s', '2021-08-22 10:20:00');
        // $waktu = CarbonInterval::parse($time)->subDays(0)->diffForHumans();
        // dd($waktu);
        $data_konseling = Konseling::get();

        return view('admin.content.konseling', compact('data_konseling'));
    }

    public function konfirmasi($id){
        $pasien = Konseling::where('konseling_id', $id)->first();

        $konseling = Konseling::find($id);
        $konseling->status = "konfirmasi";
        $konseling->save();

        return redirect()->back()->with('berhasil', 'Pengajuan konseling pasien '.$pasien->pasien->nama.' telah dikonfirmasi!');
    }

    public function notifikasi()
    {
        $data_konseling = Konseling::where('status', 'menunggu')->orWhere('status', 'jadwal_ulang')->get();
        $count_konseling = Konseling::where('status', 'menunggu')->orWhere('status', 'jadwal_ulang')->count();

        $div = '<div class="notif-center">';
        if ($count_konseling > 0) {
            foreach ($data_konseling as $konseling) {
                if ($konseling->status=='menunggu') {
                    $div .= '<a href="/admin/konseling">';
                    $div .= '<div class="notif-icon notif-warning"> <i class="fas fa-stethoscope"></i> </div>';
                    $div .= '<div class="notif-content">';
                    $div .= '<span class="block">Pasien '.$konseling->pasien->nama.' mengajukan konseling</span>';
                    // $div .= '<span class="time">5 minutes ago</span>';
                    $div .= '</div>';
                    $div .= '</a>';
                }
                elseif ($konseling->status=='jadwal_ulang') {
                    $div .= '<a href="/admin/jadwal">';
                    $div .= '<div class="notif-icon notif-danger"> <i class="fas fa-clipboard-list"></i> </div>';
                    $div .= '<div class="notif-content">';
                    $div .= '<span class="block">Pasien '.$konseling->pasien->nama.' mengajukan jadwal ulang</span>';
                    // $div .= '<span class="time">17 minutes ago</span>';
                    $div .= '</div>';
                    $div .= '</a>';
                }
            }
        }
        else {
            $div .= '<a href="javascript:void(0);">';
            $div .= '<div class="notif-icon notif-primary"> <i class="fas fa-circle"></i> </div>';
            $div .= '<div class="notif-content">';
            $div .= '<h5>Tidak ada notifikasi</h5>';
            $div .= '</div>';
            $div .= '</a>';
        }
        $div .= '</div>';

        return response()->json(['success'=> $div]);
    }

    public function jumlahnotif()
    {
        $count = Konseling::where('status', 'menunggu')->orWhere('status', 'jadwal_ulang')->count();

        echo json_encode($count);
    }
}
