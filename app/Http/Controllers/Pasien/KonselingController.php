<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\JadwalUlang;
use App\Models\Kategori;
use App\Models\Konseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonselingController extends Controller
{
    public function index()
    {
        $user_id        = Auth::user()->user_id;
        $data_konseling = Konseling::where('user_id', $user_id)->get();
        $data_kategori  = Kategori::get();
        $count_kategori  = Kategori::count();

        return view('pasien.content.konseling', compact('data_konseling', 'data_kategori', 'user_id', 'count_kategori'));
    }

    public function create(Request $request){
        if ($request['jenis_sesi']=="online") {
            $harga = 100000;
        }
        else {
            $harga = 200000;
        }

        $konseling = new Konseling;
        $konseling->user_id     = $request['user_id'];
        $konseling->kategori_id = $request['kategori_id'];
        $konseling->jenis_sesi  = $request['jenis_sesi'];
        $konseling->harga       = $harga;
        $konseling->status      = "belum";
        $konseling->status_sesi = "nonaktif";
        $konseling->save();

        return redirect()->back()->with('berhasil', 'Pengajuan konseling berhasil dilakukan!');
    }

    public function buktibayar(Request $request, $id)
    {
        $konseling = Konseling::find($id);
        if($request->hasfile('bukti_bayar')){
            $file        = $request->file('bukti_bayar');
            $extension   = $file->getClientOriginalExtension();
            $bukti_bayar = rand(111,99999).'.'.$extension;
            $file_path   = 'admin-tem/img/buktibayar/';
            $file->move($file_path,$bukti_bayar);

            $konseling->bukti_pembayaran = $bukti_bayar;
        }
        $konseling->status           = "menunggu";
        $konseling->save();

        return redirect()->back()->with('berhasil', 'Konfirmasi bayar berhasil diupload!');
    }

    public function jadwalulang(Request $request, $id)
    {
        $jadwal_ulang = new JadwalUlang;
        $jadwal_ulang->konseling_id = $id;
        $jadwal_ulang->jadwal_id    = $request['jadwal_id'];
        $jadwal_ulang->dari         = $request['dari'];
        $jadwal_ulang->sampai       = $request['sampai'];
        $jadwal_ulang->save();

        $konseling = Konseling::find($id);
        $konseling->status = "jadwal_ulang";
        $konseling->save();

        return redirect()->back()->with('berhasil', 'Berhasil mengajukan jadwal ulang!');
    }

    public function jadwalsetuju($id)
    {
        $jadwal_setuju = Konseling::find($id);
        $jadwal_setuju->status_sesi = "aktif";
        $jadwal_setuju->save();

        return redirect()->back()->with('berhasil', 'Anda telah menyetujui jadwal konseling!');
    }
}
