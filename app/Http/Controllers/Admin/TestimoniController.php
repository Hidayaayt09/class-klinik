<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $data_testimoni = Testimoni::get();

        return view('admin.content.testimoni', compact('data_testimoni'));
    }
}
