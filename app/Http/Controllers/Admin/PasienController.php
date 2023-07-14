<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $data_pasien = User::get();

        return view('admin.content.data-pasien', compact('data_pasien'));
    }
}
