<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Konseling;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasienController extends Controller
{
    public function index()
    {
        $user_id   = Auth::user()->user_id;
        $konseling = Konseling::with('jadwal')->where('user_id', $user_id)->first();
        $count_konseling = Konseling::where('user_id', $user_id)->count();
        if ($count_konseling > 0) {
            $count_jadwal = Jadwal::where('konseling_id', $konseling->konseling_id)->count();
            if ($count_jadwal > 0) {
                $date = date('Y-m-d', strtotime($konseling->jadwal->tanggal_konseling));
            }
            else {
                $date = date('Y-m-d');
            }
        }
        else {
            $date = date('Y-m-d');
        }

        return view('pasien.content.dashboard', compact('konseling', 'date', 'count_konseling'));
    }

    public function profil()
    {
        $pasien = Auth::user();

        return view('pasien.content.profil', compact('pasien'));
    }

    public function update(Request $request)
    {
        $pasien = User::find(Auth::user()->user_id);
        $pasien->nama          = $request->nama;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->no_wa         = $request->no_wa;
        $pasien->pekerjaan     = $request->pekerjaan;
        $pasien->alamat        = $request->alamat;
        $pasien->save();

        return redirect()->back()->with('e-berhasil','Edit Profil Berhasil!');;
    }
}
