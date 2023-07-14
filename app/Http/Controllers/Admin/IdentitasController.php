<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    public function index()
    {
        $data_identitas = Identitas::get();

        return view('admin.content.identitas', compact('data_identitas'));
    }

    public function create(Request $request){
        $identitas = new Identitas;
        $identitas->nama      = $request['nama'];
        $identitas->identitas = $request['identitas'];
        $identitas->save();

        return redirect()->back();
    }

    public function update(Request $request, $id){
        $identitas = Identitas::find($id);
        $identitas->nama      = $request['nama'];
        $identitas->identitas = $request['identitas'];
        $identitas->save();

        return redirect()->back();
    }

    public function delete($id){
        Identitas::find($id)->delete();

        return redirect()->back();
    }
}
