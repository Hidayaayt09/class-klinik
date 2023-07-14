<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\GejalaImport;
use App\Models\Gejala;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GejalaController extends Controller
{
    public function index()
    {
        $data_gejala   = Gejala::get();
        $data_kategori = Kategori::get();

        return view('admin.content.gejala', compact('data_gejala', 'data_kategori'));
    }

    public function create(Request $request){
        if ($request['kategori_id']==NULL || $request['nama_gejala']==NULL) {
            return redirect()->back()->with('gagal', 'Data gejala belum terisi semua!');
        }
        else {
            // Membuat gejala_id otomatis
            $gejala_id = Gejala::max('gejala_id');
            $urut_nomor = (int) substr($gejala_id, 1, 2);
            $urut_nomor++;
            $gej = "G";
            $gejala_id = $gej.sprintf("%02s", $urut_nomor);

            $gejala = new Gejala;
            $gejala->gejala_id   = $gejala_id;
            $gejala->kategori_id = $request['kategori_id'];
            $gejala->nama_gejala = $request['nama_gejala'];
            $gejala->save();

            return redirect()->back()->with('berhasil', 'Data gejala berhasil ditambah!');
        }
    }

    public function update(Request $request, $id){
        if ($request['kategori_id']==NULL || $request['nama_gejala']==NULL) {
            return redirect()->back()->with('gagal', 'Data gejala belum terisi semua!');
        }
        else {
            $gejala = Gejala::find($id);
            $gejala->kategori_id = $request['kategori_id'];
            $gejala->nama_gejala = $request['nama_gejala'];
            $gejala->save();

            return redirect()->back()->with('berhasil', 'Data gejala berhasil diupdate!');
        }
    }

    public function delete($id){
        Gejala::find($id)->delete();

        return redirect()->back()->with('berhasil', 'Data gejala berhasil dihapus!');
    }

    public function import()
    {
        Excel::import(new GejalaImport, request()->file('file'));

        return back()->with('berhasil', 'Data gejala berhasil diimport!');
    }

    public function cari(Request $request)
    {
    	$search = $request->search;

        if($search == ''){
            $autocomplate = Gejala::orderby('nama_gejala','asc')->select('gejala_id','nama_gejala')->limit(5)->get();
        }
        else{
            $autocomplate = Gejala::orderby('nama_gejala','asc')->select('gejala_id','nama_gejala')->where('nama_gejala', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();

        foreach($autocomplate as $autocomplate){
            $response[] = array("label"=>$autocomplate->nama_gejala,"gejala_id"=>$autocomplate->gejala_id);
        }

        echo json_encode($response);

        exit;
    }

    public function index2()
    {
        return view('autocomplate');
    }


    public function getAutocomplete(Request $request)
    {
        $search = $request->search;

        if($search == ''){
            $autocomplate = Gejala::orderby('nama_gejala','asc')->select('gejala_id','nama_gejala')->limit(5)->get();
        }
        else{
            $autocomplate = Gejala::orderby('nama_gejala','asc')->select('gejala_id','nama_gejala')->where('nama_gejala', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();

        foreach($autocomplate as $autocomplate){
            $response[] = array("value"=>$autocomplate->gejala_id,"label"=>$autocomplate->nama_gejala);
        }

        echo json_encode($response);

        exit;
    }
}
