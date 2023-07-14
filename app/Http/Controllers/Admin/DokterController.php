<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $data_dokter = Dokter::get();

        return view('admin.content.data-dokter', compact('data_dokter'));
    }

    public function create(Request $request){
        $dokter = new Dokter;
        $dokter->nama          = $request['nama'];
        $dokter->jenis_kelamin = $request['jenis_kelamin'];
        $dokter->no_hp         = $request['no_hp'];
        $dokter->alamat        = $request['alamat'];
        if($request->hasfile('foto')){
            $image = $request->file('foto');
            $extension = $image->getClientOriginalExtension();
            $nama_image = rand(111,99999).'.'.$extension;
            $image_path = 'admin/img/dokter/';
            $image-> move($image_path,$nama_image);

            $dokter->foto = $nama_image;
        }
        $dokter->save();

        return redirect()->back();
    }

    public function update(Request $request, $id){
        $dokter = Dokter::find($id);
        $dokter->nama          = $request['nama'];
        $dokter->jenis_kelamin = $request['jenis_kelamin'];
        $dokter->no_hp         = $request['no_hp'];
        $dokter->alamat        = $request['alamat'];
        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $extension = $image->getClientOriginalExtension();
            $nama_image = rand(111,99999).'.'.$extension;
            $image_path = 'admin/img/dokter/';
            $image-> move($image_path,$nama_image);
        }
        else {
            $nama_image = $request['current_foto'];
        }
        $dokter->foto = $nama_image;
        $dokter->save();

        return redirect()->back();
    }

    public function delete($id){
        Dokter::find($id)->delete();

        return redirect()->back();
    }
}
