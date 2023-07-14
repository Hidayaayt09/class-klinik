<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Konseling;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.content.dashboard');
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
        $admin = Auth::guard('admin')->user();

        return view('admin.content.profil', compact('admin'));
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
            Admin::find(Auth::guard('admin')->user()->admin_id)->update(['password'=> Hash::make($request->password)]);

            return redirect()->back()->with('ep-berhasil','Kata Sandi Anda berhasil diperbarui!');
        }
    }
}
