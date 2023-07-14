<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Konseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user_id   = Auth::user()->user_id;
        $konseling = Konseling::with('jadwal')->where('user_id', $user_id)->first();
        $count = Konseling::with('jadwal')->where('user_id', $user_id)->count();
        if ($count > 0) {
            $date = date('Y-m-d', strtotime($konseling->jadwal->tanggal_konseling));
            $time = date('H:i:s', strtotime($konseling->jadwal->tanggal_konseling));
            $datetime = $date."T".$time;
        }
        else {
            $date = date('Y-m-d');
            $time = date('H:i:s');
            $datetime = $date."T".$time;
        }

        return view('pasien.content.dashboard', compact('konseling', 'date', 'time', 'datetime', 'count'));
    }

    public function jadwal(Request $request)
    {
        $user_id   = Auth::user()->user_id;
        $konseling = Konseling::where(['user_id'=>$user_id, 'status_sesi'=>'nonaktif'])->first();
        $jadwal    = Jadwal::where('konseling_id', $konseling->konseling_id)->first();
        $d = date('Y-m-d', strtotime($jadwal->tanggal_konseling));
        $t = date('H:i', strtotime($jadwal->tanggal_konseling));
        $dt = $d."T".$t;

        $events[] = array(
            "title" => 'Sesi Konseling '.$jadwal->konseling->kategori->nama,
            "start" => $dt,
            "display" => 'background',
            "color" => '#ff9f89'
        );
        echo json_encode($events);
    }

    public function index2(Request $request)
    {
        if($request->ajax()) {
            $data = Jadwal::whereDate('tanggal_konseling', '>=', $request->start)
                ->get();

            return response()->json($data);
        }

        return view('fullcalender');
    }

    public function ajax(Request $request)
    {
        switch ($request->type) {
            case 'add':
                $event = Jadwal::create([
                    'treatment_id'      => $request->title,
                    'tanggal_konseling' => $request->start,
                ]);
                return response()->json($event);
            break;

            case 'update':
                $event = Jadwal::find($request->id)->update([
                    'treatment_id'      => $request->title,
                    'tanggal_konseling' => $request->start,
                ]);
                return response()->json($event);

            break;

            case 'delete':
                $event = Jadwal::find($request->id)->delete();

                return response()->json($event);
            break;

            default:
            break;
        }
    }
}
