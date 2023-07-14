<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $data_kategori = Kategori::get();

        return view('index', compact('data_kategori'));
    }
}
