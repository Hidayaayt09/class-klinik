<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\KategoriImport;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KategoriController extends Controller
{
    public function index()
    {
        $data_kategori = Kategori::get();

        return view('admin.content.kategori', compact('data_kategori'));
    }

    public function create(Request $request){
        // Membuat kategori_id otomatis
        $kategori_id = Kategori::max('kategori_id');
        $urut_nomor = (int) substr($kategori_id, 1, 2);
        $urut_nomor++;
        $kat = "K";
        $kategori_id = $kat.sprintf("%02s", $urut_nomor);

        $kategori = new Kategori;
        $kategori->kategori_id = $kategori_id;
        $kategori->nama        = $request['nama'];
        $kategori->deskripsi   = $request['deskripsi'];
        if($request->hasfile('foto')){
            $image = $request->file('foto');
            $extension = $image->getClientOriginalExtension();
            $nama_image = rand(111,99999).'.'.$extension;
            $image_path = 'admin-tem/img/kategori/';
            $image-> move($image_path,$nama_image);

            $kategori->foto = $nama_image;
        }
        $kategori->save();

        return redirect()->back()->with('berhasil', 'Data kategori berhasil ditambah!');
    }

    public function update(Request $request, $id){
        $kategori = Kategori::find($id);
        $kategori->nama      = $request['nama'];
        $kategori->deskripsi = $request['deskripsi'];
        if($request->hasFile('foto')){
            $image = $request->file('foto');
            $extension = $image->getClientOriginalExtension();
            $nama_image = rand(111,99999).'.'.$extension;
            $image_path = 'admin-tem/img/kategori/';
            $image-> move($image_path,$nama_image);
        }
        else {
            $nama_image = $request['current_foto'];
        }
        $kategori->foto = $nama_image;
        $kategori->save();

        return redirect()->back()->with('berhasil', 'Data kategori berhasil diupdate!');
    }

    public function delete($id){
        Kategori::find($id)->delete();

        return redirect()->back()->with('berhasil', 'Data kategori berhasil dihapus!');
    }

    public function konseling(){
        $kategori = Kategori::all();

        return $kategori;
    }

    public function import()
    {
        Excel::import(new KategoriImport, request()->file('file'));

        return back()->with('berhasil', 'Data kategori berhasil diimport!');
    }
}
