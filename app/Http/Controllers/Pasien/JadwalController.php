<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $data_jadwal = Jadwal::get();

        return view('pasien.content.jadwal', compact('data_jadwal'));
    }

    public function create(Request $request){
        $identitas = new Jadwal;
        $identitas->nama      = $request['treatment_id'];
        $identitas->identitas = $request['tanggal_konseling'];
        $identitas->save();

        return redirect()->back();
    }

    public function update(Request $request, $id){
        $identitas = Jadwal::find($id);
        $identitas->nama      = $request['treatment_id'];
        $identitas->identitas = $request['tanggal_konseling'];
        $identitas->save();

        return redirect()->back();
    }

    public function delete($id){
        Jadwal::find($id)->delete();

        return redirect()->back();
    }
}
