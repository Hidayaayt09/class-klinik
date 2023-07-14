<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Konseling;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    public function index()
    {
        $konseling = Konseling::with('jadwal')->get();
        $count = Konseling::with('jadwal')->count();

        return view('dokter.content.dashboard', compact('konseling', 'count'));
    }

    public function getkonseling()
    {
        $konseling = Konseling::with('jadwal')->get();

        $data = array();

        foreach($konseling as $row) {
            $data[] = array(
                'title' => $row->kategori->nama.'-'.$row->pasien->nama,
                'start' => $row->jadwal->tanggal_konseling,
                'overlap' => false,
                'display' => 'background',
                'color' => '#ff9f89'
            );
        }

        echo json_encode($data);
    }

    public function profil()
    {
        $dokter = Auth::guard('dokter')->user();

        return view('dokter.content.profil', compact('dokter'));
    }

    public function update(Request $request)
    {
        $dokter = Dokter::find(Auth::guard('dokter')->user()->dokter_id);
        $dokter->nama          = $request->nama;
        $dokter->no_wa         = $request->no_wa;
        $dokter->jenis_kelamin = $request->jenis_kelamin;
        $dokter->alamat        = $request->alamat;
        $dokter->save();

        return redirect()->back()->with('e-berhasil','Edit Profil Berhasil!');;
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'password_confirmation' => ['same:password'],
        ]);

        if($request->current_password==$request->password){
            return redirect()->back()->with('ep-gagal','Password baru anda sama dengan password lama anda!');
        }
        else{
            Dokter::find(Auth::guard('dokter')->user()->dokter_id)->update(['password'=> Hash::make($request->password)]);

            return redirect()->back()->with('ep-berhasil','Kata Sandi Anda berhasil diperbarui!');
        }
    }
}
