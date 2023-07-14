<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    public function index()
    {
        $pasien = Auth::user();
        $data_testimoni = Testimoni::where('user_id', $pasien->user_id)->get();

        return view('pasien.content.testimoni', compact('data_testimoni', 'pasien'));
    }

    public function create(Request $request){
        $testimoni = new Testimoni;
        $testimoni->user_id   = Auth::user()->user_id;
        $testimoni->deskripsi = $request['deskripsi'];
        $testimoni->save();

        return redirect()->back()->with('berhasil', 'Tambah data testimoni berhasil dilakukan!');
    }

    public function update(Request $request, $id){
        $testimoni = Testimoni::find($id);
        $testimoni->user_id   = Auth::user()->user_id;
        $testimoni->deskripsi = $request['deskripsi'];
        $testimoni->save();

        return redirect()->back()->with('berhasil', 'Update data testimoni berhasil dilakukan!');
    }

    public function delete($id){
        Testimoni::find($id)->delete();

        return redirect()->back()->with('berhasil', 'Hapus data testimoni berhasil dilakukan!');
    }
}
